<?php
require 'mapa1.php';
$tipo = $_POST['categoria'];
$especie = $_POST['especie'];
$stmt = $conn->query("SELECT idmapa, latitude, longitude, tipo FROM mapa INNER JOIN animal ON mapa.idanimal = animal.idanimal WHERE tipo = '$tipo' AND especie = '$especie';");
require 'mapa2.php';
?>