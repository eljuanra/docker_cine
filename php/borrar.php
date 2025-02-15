<?php
    require_once './index.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM peliculas WHERE id='$id'";
    $result = $conn->query($sql);
    echo "<h1>Registro eliminado</h1>";
    echo "<h2>Recargue la página</h2>";
    $conn->close();
?>