<?php include "cabecera.php"; ?>
<?php

$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<h2>Listado de ciudades (sin paginación)</h2>
<?php
$vResultado = mysqli_query($link, "SELECT * FROM ciudades ORDER BY id")
    or die("Error en la consulta: " . mysqli_error($link));

tablaCiudades($vResultado);

mysqli_free_result($vResultado);
include "pie.php";
?>
