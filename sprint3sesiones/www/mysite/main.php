<?php
session_start();
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die ('Fail');
?>
<html>
<head>
    <style>
        img {
            width: 150px;
            height: 150px;
        }

        /* Estilos básicos para la lista */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .fade-in {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-in:hover {
            opacity: 1;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Agregar la clase fade-in a los elementos de la lista
            $('li').addClass('fade-in');
        });
    </script>
</head>
<body>
<?php
    if (isset($_SESSION['usuario_id'])) {
        $usuario_id = $_SESSION['usuario_id'];

        // Obtener el nombre del usuario desde la base de datos
        $query_usuario = "SELECT nombre FROM tUsuarios WHERE id = $usuario_id";
        $result_usuario = mysqli_query($db, $query_usuario);
        $row_usuario = mysqli_fetch_assoc($result_usuario);
        $nombre_usuario = $row_usuario['nombre'];

        // Mostrar el nombre del usuario
        echo 'Hola, ' . $nombre_usuario . '! ';
        echo '<br>';
        echo '<a href="/logout.php">Cerrar sesión</a>';
        echo ' &nbsp; ';
        echo '<a href="/changepassword.html">Cambiar Contraseña</a>';
    }

    $query = 'SELECT * FROM tJuegos';
    $result = mysqli_query($db, $query) or die('Query error');

    while ($row = mysqli_fetch_array($result)) {
        echo '<h1><a href="/detail.php?id=' . $row[0] . '">' . $row[0] . '.' . $row[1] . '</a></h1>';
        echo '<img src=' . $row[2] . '></img>';
        echo '<ul>';
        echo '<li class="fade-in">Precio: ' . $row[3] . '</li>';
        echo '<li class="fade-in">Plataforma: ' . $row[4] . '</li>';
        echo '</ul>';
        echo '<hr/>';
    }

    mysqli_close($db);
    ?>
</body>
</html>
