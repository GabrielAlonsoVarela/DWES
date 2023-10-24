<html>
<head>
<style>
img{
width: 150px;
height:150px;
}
</style>
<?php
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die ('Fail');
?>
</head>
<body>
<h1>Conexión establecida</h1>
<?php
//lanzar una query
$query = 'SELECT * FROM tJuegos';
$result = mysqli_query($db, $query) or die('Query error');
// Pintamos los datos con un while para que nos muestre todas las filas
while ($row = mysqli_fetch_array($result)){
echo '<h1><a href="/detail.php?id='.$row[0].'">'.$row[0].'.'.$row[1].'</a></h1>';
echo '<img src='.$row[2].'></img>';
echo '<ul>';
echo '<li>Precio: '.$row[3].'</li>';
echo '<li>Plataforma: '.$row[4].'</li>';
echo '</ul>';
echo '<hr/>';
}

mysqli_close($db);
?>
</body>
</html>
