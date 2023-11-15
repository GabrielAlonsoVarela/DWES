<?php
// Conectar a la base de datos
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['email'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['conf_contrasena'];

// Verificar si el correo ya existe en la base de datos
$sql = "SELECT * FROM tUsuarios WHERE email = '".$correo."'";
$result = mysqli_query($db, $sql);
$row_cnt = mysqli_num_rows($result);

if ($row_cnt > 0) {
    echo "El correo ya está registrado. Por favor, elige otro correo.";
} elseif ($contrasena !== $confirmar_contrasena) {
    echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
} else {
    // Cifrar la contraseña usando password_hash
    $hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $consulta2 = $db->prepare("INSERT INTO tUsuarios (nombre, apellidos, email, contraseña) VALUES (?,?,?,?)");
    $consulta2->bind_param("ssss", $nombre, $apellidos, $correo, $hashed_contrasena);
    $consulta2->execute();

    if ($consulta2->affected_rows > 0) {
        // Redirigir al usuario a la página principal o a donde desees
        header("Location: login.php");
        exit();
    } else {
        echo "Error en el registro: " . $consulta2->error;
    }

    // Cerrar la conexión a la base de datos
    $consulta2->close();
}

// Cerrar la conexión a la base de datos
mysqli_close($db);
?>

