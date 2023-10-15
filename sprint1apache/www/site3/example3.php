<html>
<body>
<h1>Jubilacion</h1>
<?php
function edad_en_10_años($edad){
return $edad+10;
}

if (edad_en_10_años($_GET["edad"]) > 65){
echo "En 10 años tendras edad de jubilacion";
}else{
echo "¡Disfruta de tu tiempo!";
}
?>
</body>
</html>
