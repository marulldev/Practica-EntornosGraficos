<?php include "cabecera.php"; ?>
 <?php
$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<h2>Baja de ciudad</h2>
<?php
if (isset($_POST['confirmar'])) {
    // Paso 3: eliminar
    $id = (int) $_POST['id'];
    mysqli_query($link, "DELETE FROM ciudades WHERE id = $id")
        or die("Error al eliminar: " . mysqli_error($link));
    if (mysqli_affected_rows($link) > 0) echo '<p class="ok">Ciudad eliminada correctamente.</p>';
    else echo '<p class="error">No existe una ciudad con ese id.</p>';

} elseif (isset($_GET['id'])) {
    // Paso 2: pedir confirmación
    $id = (int) $_GET['id'];
    $vResultado = mysqli_query($link, "SELECT * FROM ciudades WHERE id = $id")
        or die("Error en la consulta: " . mysqli_error($link));

    if (mysqli_num_rows($vResultado) == 0) {
        echo '<p class="error">No existe una ciudad con ese id.</p>';
    } else {
        echo '<p>¿Seguro que querés eliminar esta ciudad?</p>';
        tablaCiudades($vResultado);
        echo '<form method="post" action="baja.php">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" name="confirmar" value="Sí, eliminar">
                <a href="baja.php">Cancelar</a>
              </form>';
    }
    mysqli_free_result($vResultado);
}

// Paso 1: listado con enlace "Eliminar" (también se muestra actualizado después de borrar)
if (!isset($_GET['id'])) {
    $vResultado = mysqli_query($link, "SELECT * FROM ciudades ORDER BY id")
        or die("Error en la consulta: " . mysqli_error($link));
    tablaCiudades($vResultado, "baja.php", "Eliminar");
    mysqli_free_result($vResultado);
}
include "pie.php";
?>
