<?php

$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM tUsuarios WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if (password_verify($contrasena, $row['contraseña'])) {
            // Iniciar sesión si las credenciales son correctas
            session_start();
            $_SESSION['usuario_id'] = $row['id'];
            header("Location: main.php");
            exit();
        } else {
            echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "El correo electrónico no está registrado. Por favor, regístrate.";
    }
}

mysqli_close($db);
?>
