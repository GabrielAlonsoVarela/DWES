<html>
<head>
<style>
img{
width: 150px;
height: 150px;
}
</style>
<?php
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
</head>
<body>
<?php
if (!isset($_GET['id'])){
 die('No se ha especificado un juego');
}
$id_juego= $_GET['id'];
$query = 'select * from tJuegos where id ='.$id_juego;
$result = mysqli_query($db,$query) or die('query error');
$only_row = mysqli_fetch_array($result);
echo '<h1>'.$only_row[1].'</h1>';
echo '<img src='.$only_row[2].'></img>';
?>
<h3>Comentarios:</h3>
<ul>
<?php
$query2 = 'select * from tComentarios where juego_id ='.$id_juego;
$result2 = mysqli_query($db,$query2) or die('query error');
while ($row = mysqli_fetch_array($result2)){
echo '<li>'.$row[1].'</li>';
}
mysqli_close($db);
?>
<p>Deja un nuevo comentario:</p>
<form action="/comment.php" method="post">
<textarea rows="4" cols="50" name="new_comment"></textarea><br>
<input type="hidden" name="juego_id" value="<?php echo $juego_id; ?>">
<input type="submit" value="Comentar">
</form>
</ul>
</body>
</html>
