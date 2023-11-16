<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir a la página de inicio de sesión si no está autenticado
    header("Location: login.html");
    exit();
}

// Manejar el cambio de contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar a la base de datos
    $db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

    // Obtener datos del formulario
    $usuario_id = $_SESSION['usuario_id'];
    $contrasena_actual = $_POST['contrasena_actual'];
    $nueva_contrasena = $_POST['nueva_contrasena'];
    $confirmar_nueva_contrasena = $_POST['confirmar_nueva_contrasena'];

    // Verificar si la contraseña actual es correcta
    $query = "SELECT contraseña FROM tUsuarios WHERE id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $usuario_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $contrasena_bd);
    mysqli_stmt_fetch($stmt);

    if (password_verify($contrasena_actual, $contrasena_bd)) {
        // La contraseña actual es correcta, verificar las nuevas contraseñas
        if ($nueva_contrasena === $confirmar_nueva_contrasena) {
            // Cifrar la nueva contraseña
            $hashed_nueva_contrasena = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $update_query = "UPDATE tUsuarios SET contraseña = ? WHERE id = ?";
            $update_stmt = mysqli_prepare($db, $update_query);
            mysqli_stmt_bind_param($update_stmt, "si", $hashed_nueva_contrasena, $usuario_id);
            mysqli_stmt_execute($update_stmt);

            echo "Contraseña cambiada con éxito.";
            echo "<a href=/main.php>Volver</a>";
        } else {
            echo "Las nuevas contraseñas no coinciden.";
        }
    } else {
        echo "La contraseña actual es incorrecta.";
    }

    // Cerrar la conexión y la consulta preparada
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
?>
