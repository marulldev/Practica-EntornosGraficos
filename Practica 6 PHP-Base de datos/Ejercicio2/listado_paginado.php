<?php include "cabecera.php"; ?>
<?php
$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<h2>Listado de ciudades (con paginación)</h2>
<?php
$porPagina = 4; // registros por página

// Total de registros y de páginas
$vTotal = mysqli_query($link, "SELECT COUNT(*) FROM ciudades")
    or die("Error en la consulta: " . mysqli_error($link));
$fila = mysqli_fetch_array($vTotal);
$total = $fila[0];
mysqli_free_result($vTotal);

$totalPaginas = max(1, ceil($total / $porPagina));

// Página actual (validada)
$pag = isset($_GET['pag']) ? (int) $_GET['pag'] : 1;
if ($pag < 1) $pag = 1;
if ($pag > $totalPaginas) $pag = $totalPaginas;

$inicio = ($pag - 1) * $porPagina;

$vResultado = mysqli_query($link, "SELECT * FROM ciudades ORDER BY id LIMIT $inicio, $porPagina")
    or die("Error en la consulta: " . mysqli_error($link));

tablaCiudades($vResultado);
mysqli_free_result($vResultado);

// Navegación entre páginas
echo '<p class="paginas">';
if ($pag > 1) echo '<a href="?pag=' . ($pag - 1) . '">&laquo; Anterior</a>';
for ($i = 1; $i <= $totalPaginas; $i++) {
    if ($i == $pag) echo '<span><strong>' . $i . '</strong></span>';
    else echo '<a href="?pag=' . $i . '">' . $i . '</a>';
}
if ($pag < $totalPaginas) echo '<a href="?pag=' . ($pag + 1) . '">Siguiente &raquo;</a>';
echo '</p>';
echo '<p>Página ' . $pag . ' de ' . $totalPaginas . ' (' . $total . ' ciudades)</p>';

include "pie.php";
?>
