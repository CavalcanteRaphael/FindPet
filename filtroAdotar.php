<?php
require 'mapa1.php';
$id = $_GET['idanimal'];
$stmt = $conn->query("SELECT idmapa, latitude, longitude, tipo FROM mapa INNER JOIN animal ON mapa.idanimal = animal.idanimal WHERE mapa.idanimal = '$id';");
require 'mapa2.php';
?>