<?php


$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "prueba")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");



$busqueda = "";
$mensaje = "";
$vResultado = null;

if (isset($_POST['buscar'])) {
    $busqueda = trim($_POST['cancion']);

    if ($busqueda == "") {
        $mensaje = "Escribí el nombre (o parte del nombre) de una canción.";
    } else {
        
        $patron = mysqli_real_escape_string($link, addcslashes($busqueda, '%_'));

        $vResultado = mysqli_query($link,
            "SELECT canciones FROM buscador WHERE canciones LIKE '%$patron%' ORDER BY canciones")
            or die("Error en la consulta: " . mysqli_error($link));

        if (mysqli_num_rows($vResultado) == 0) {
            $mensaje = "No se encontraron canciones que contengan \"" . htmlspecialchars($busqueda) . "\".";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 8 - Buscador de canciones</title>
</head>
<body>
    <h1>Buscador de canciones</h1>

    <form method="post" action="buscador.php">
        <label>Canción: <input type="text" name="cancion" value="<?php echo htmlspecialchars($busqueda); ?>"></label>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php if ($mensaje != "") echo '<p>' . $mensaje . '</p>'; ?>

    <?php if ($vResultado != null && mysqli_num_rows($vResultado) > 0) { ?>
        <h2>Resultados (<?php echo mysqli_num_rows($vResultado); ?>)</h2>
        <ul>
            <?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
                <li><?php echo htmlspecialchars($fila['canciones']); ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>
<?php
if ($vResultado != null) mysqli_free_result($vResultado);
mysqli_close($link);
?>
