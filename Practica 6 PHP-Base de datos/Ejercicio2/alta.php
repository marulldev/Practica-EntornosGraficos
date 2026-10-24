<?php include "cabecera.php"; ?>
<?php
$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<h2>Alta de ciudad</h2>
<?php
if (isset($_POST['guardar'])) {
    $d = datosFormulario($link);
    if ($d == null) {
        echo '<p class="error">Ciudad y país son obligatorios.</p>';
    } else {
        $sql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('"
             . $d['ciudad'] . "', '" . $d['pais'] . "', " . $d['habitantes'] . ", "
             . $d['superficie'] . ", " . $d['tieneMetro'] . ")";
        mysqli_query($link, $sql) or die("Error al insertar: " . mysqli_error($link));
        echo '<p class="ok">Ciudad agregada correctamente (id ' . mysqli_insert_id($link) . ').</p>';
    }
}
?>
<form method="post" action="alta.php">
    <label>Ciudad: <input type="text" name="ciudad" maxlength="50" required></label>
    <label>País: <input type="text" name="pais" maxlength="50" required></label>
    <label>Habitantes: <input type="number" name="habitantes" min="0" required></label>
    <label>Superficie: <input type="number" name="superficie" step="0.01" min="0" required></label>
    <label>Tiene metro:
        <select name="tieneMetro">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </label>
    <br>
    <input type="submit" name="guardar" value="Guardar">
</form>
<?php include "pie.php"; ?>
