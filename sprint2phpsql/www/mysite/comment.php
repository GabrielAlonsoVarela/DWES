<?php
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
<body>
<?php
//Introducimos la id del juego que vamos a comentar y el nuevo comentario en variables
$juego_id = $_POST['juego_id'];
$comentario = $_POST['new_comment'];
//Realizamos la insercion en la tabla de comentarios
$query = "INSERT INTO tComentarios (comentario, usuario_id, juego_id, fecha_comentario) VALUES ('".$comentario."', NULL, ".$juego_id.", now())";

mysqli_query($db,$query) or die('Error');

echo "<p>Nuevo comentario ";
echo mysqli_insert_id($db);
echo " añadido</p>";

echo "<a href='/detail.php?id=".$juego_id."'>Volver</a>";
mysqli_close($db);
?>
</body>
</html>
