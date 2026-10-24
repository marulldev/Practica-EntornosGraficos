<?php include "cabecera.php"; ?>
<?php

$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<h2>Modificación de ciudad</h2>
<?php
$mostrarFormulario = false;

if (isset($_POST['actualizar'])) {
    // Paso 3: guardar cambios
    $id = (int) $_POST['id'];
    $d = datosFormulario($link);
    if ($d == null) {
        echo '<p class="error">Ciudad y país son obligatorios.</p>';
        $mostrarFormulario = true;
    } else {
        $sql = "UPDATE ciudades SET ciudad = '" . $d['ciudad'] . "', pais = '" . $d['pais']
             . "', habitantes = " . $d['habitantes'] . ", superficie = " . $d['superficie']
             . ", tieneMetro = " . $d['tieneMetro'] . " WHERE id = $id";
        mysqli_query($link, $sql) or die("Error al actualizar: " . mysqli_error($link));
        echo '<p class="ok">Ciudad modificada correctamente.</p>';
    }
} elseif (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $mostrarFormulario = true;
}

if ($mostrarFormulario) {
    // Paso 2: formulario con los datos actuales
    $vResultado = mysqli_query($link, "SELECT * FROM ciudades WHERE id = $id")
        or die("Error en la consulta: " . mysqli_error($link));
    $fila = mysqli_fetch_array($vResultado);
    mysqli_free_result($vResultado);

    if (!$fila) {
        echo '<p class="error">No existe una ciudad con ese id.</p>';
    } else {
?>
<form method="post" action="modificacion.php">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <label>Ciudad: <input type="text" name="ciudad" maxlength="50" required value="<?php echo htmlspecialchars($fila['ciudad']); ?>"></label>
    <label>País: <input type="text" name="pais" maxlength="50" required value="<?php echo htmlspecialchars($fila['pais']); ?>"></label>
    <label>Habitantes: <input type="number" name="habitantes" min="0" required value="<?php echo $fila['habitantes']; ?>"></label>
    <label>Superficie: <input type="number" name="superficie" step="0.01" min="0" required value="<?php echo $fila['superficie']; ?>"></label>
    <label>Tiene metro:
        <select name="tieneMetro">
            <option value="1" <?php if ($fila['tieneMetro'] == 1) echo 'selected'; ?>>Sí</option>
            <option value="0" <?php if ($fila['tieneMetro'] == 0) echo 'selected'; ?>>No</option>
        </select>
    </label>
    <br>
    <input type="submit" name="actualizar" value="Guardar cambios">
    <a href="modificacion.php">Cancelar</a>
</form>
<?php
    }
} else {
    // Paso 1: listado con enlace "Modificar"
    $vResultado = mysqli_query($link, "SELECT * FROM ciudades ORDER BY id")
        or die("Error en la consulta: " . mysqli_error($link));
    tablaCiudades($vResultado, "modificacion.php", "Modificar");
    mysqli_free_result($vResultado);
}
include "pie.php";
?>
