<?php
require 'mapa1.php';
$stmt = $conn->query("SELECT idmapa, latitude, longitude, tipo FROM mapa INNER JOIN animal ON mapa.idanimal = animal.idanimal;");
require 'mapa2.php';
?>