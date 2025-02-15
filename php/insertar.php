<?php
    require_once './index.php';
        $titulo = $_GET['titulo'];
        $director = $_GET['director'];
        $nota = $_GET['nota'];
        $anyo = $_GET['anyo'];
        $presupuesto = $_GET['presupuesto'];
        $portada = $_GET['portada'];
        $url = $_GET['url_trailer'];

        $sql = "INSERT INTO peliculas(titulo,director,nota,anyo,presupuesto,img_base64,url_trailer) 
                VALUES ('$titulo','$director','$nota','$anyo','$presupuesto','$portada','$url')";
        $result = $conn->query($sql);
        echo "<h1>Datos actualizados</h1>";
        echo "<h2>Recargue la página</h2>";
        $conn->close();
?>