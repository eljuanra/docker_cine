<?php
    $servername = "db";
    $username = "usuario1";
    $password = "contrasenyaUsuario1";
    $dbname = "cine";
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cine";*/

// Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
// Consulta SQL para seleccionar todo el contenido de la tabla peliculas
    $sql = "SELECT * FROM peliculas";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Películas</title>
    </head>
<body>
    <h1>Listado de Películas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Título</th><th>Director</th><th>Nota</th><th>Año</th><th>Ppto</th><th>Img</th><th>Trailer</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["director"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nota"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["anyo"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["presupuesto"]) . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," . htmlspecialchars($row["img_base64"]) . "'
                        alt='Imagen' width='100' height='100'></td>";
                        echo "<td><a href='" . htmlspecialchars($row["url_trailer"]) . "' target='_blank'>Ver
                        Trailer</a></td>";
                        echo "</tr>";
                    }
                } else { echo "<tr><td colspan='8'>No hay registros</td></tr>";}
            ?>
        </tbody>
    </table>

    <h2>Añadir registro</h2>
    <form target="_self" method="get" action="./insertar.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo">
        <label for="director">Director:</label>
        <input type="text" id="director" name="director">
        <label for="nota">Nota:</label>
        <input type="text" id="nota" name="nota">
        <br>
        <label for="anyo">Año:</label>
        <input type="text" id="anyo" name="anyo">
        <label for="presupuesto">Presupuesto:</label>
        <input type="text" id="presupuesto" name="presupuesto">
        <label for="portada">Portada:</label>
        <input type="text" id="portada" name="portada">
        <br>
        <label for="url_trailer">Trailer:</label>
        <input type="text" id="url_trailer" name="url_trailer">
        <br>
        <input type="submit" value="Guardar">
    </form>
    <h2>Borrar registro</h2>
    <form target="_self" method="get" action="./borrar.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Borrar" >
    </form>
</body>
</html> 
<?php
    //$conn->close();
?>