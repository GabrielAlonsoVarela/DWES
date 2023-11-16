<?php
session_start();
var_dump($_SESSION);
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

// Introducimos la id del juego que vamos a comentar y el nuevo comentario en variables
$juego_id = $_POST['juego_id'];
$comentario = $_POST['new_comment'];

// Verificamos si el usuario está logueado
if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
} else {
    $usuario_id = NULL;
}

// Utilizamos una consulta preparada para evitar inyecciones SQL
$query = "INSERT INTO tComentarios (comentario, usuario_id, juego_id) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($db, $query);

// Vinculamos los parámetros y ejecutamos la consulta
mysqli_stmt_bind_param($stmt, "sii", $comentario, $usuario_id, $juego_id);
mysqli_stmt_execute($stmt);

// Verificamos si la inserción fue exitosa
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<p>Nuevo comentario añadido</p>";
} else {
    echo "Error al agregar el comentario";
}

echo "<a href='/detail.php?id=" . $juego_id . "'>Volver</a>";

// Cerramos la consulta preparada
mysqli_stmt_close($stmt);

// Cerramos la conexión a la base de datos
mysqli_close($db);
?>


