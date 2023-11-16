<?php
session_start();
?>
<html>
<head>
<style>
img {
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
// Comprueba la id especificada
if (!isset($_GET['id'])) {
    die('No se ha especificado un juego');
}
// Guardamos la id en una variable
$id_juego = $_GET['id'];
// Seleccionamos la info de nuestra base de datos
$query = 'SELECT * FROM tJuegos WHERE id =' . $id_juego;
$result = mysqli_query($db, $query) or die('query error');
$only_row = mysqli_fetch_array($result);
// La mostramos en pantalla
echo '<h1>' . $only_row['nombre'] . '</h1>';
echo '<img src=' . $only_row['2'] . '></img>';
?>
<h3>Comentarios:</h3>
<ul>
    <?php
    // Guardamos la info de los comentarios
    $query2 = 'SELECT * FROM tComentarios WHERE juego_id =' . $id_juego;
    $result2 = mysqli_query($db, $query2) or die('query error');
    // usamos while para que si hay más de un comentario lo muestre
    while ($row = mysqli_fetch_array($result2)) {
        echo '<li>' . $row['comentario'] . '</li>';
    }
    mysqli_close($db);
    ?>
</ul>
<p>Deja un nuevo comentario:</p>
<!-- Formulario nuevo para introducir un comentario -->
<form action="/comment.php" method="post">
    <textarea rows="4" cols="50" name="new_comment"></textarea><br>
    <input type="hidden" name="juego_id" value="<?php echo $id_juego; ?>">
    <input type="submit" value="Comentar">
</form>
<?php
if (isset($_SESSION['usuario_id'])) {
    echo '<a href="/logout.php">Cerrar sesión</a>';
}
?>
</body>
</html>
