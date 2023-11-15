<?php
// Conectar a la base de datos
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

// Recibir datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

// Verificar si el correo existe en la base de datos
$sql = "SELECT * FROM tUsuarios WHERE email = '".$email."'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Verificar la contraseña utilizando password_verify
    if (password_verify($contrasena, $row['contraseña'])) {
        // Contraseña correcta, redirigir a la página principal
        header("Location: main.php");
        exit();
    } else {
        echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "El correo electrónico no está registrado. Por favor, regístrate.";
}

// Cerrar la conexión a la base de datos
mysqli_close($db);
?>
