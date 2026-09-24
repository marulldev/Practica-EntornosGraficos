<?php
/*Variables de sesión
La función session_start() inicia una sesión para el usuario o continúa la sesión abierta en otras
páginas.
La sesión se tiene que inicializar antes de escribir cualquier texto en la página.
Una vez inicializada, se pueden utilizar variables de sesión a través del array asociativo
$_SESSION["nombre _variable"], es decir, almacenar datos para ese usuario que se conserven
durante toda su visita o recuperar datos almacenados en páginas que haya visitado. */

session_start();

if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 1;
} else {
    $_SESSION["contador"]++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Página 1</title></head>
<body>
  <h1>Página 1</h1>
  <?php echo "Has visitado " . $_SESSION["contador"] . " páginas"; ?>
  <br><br>
  <a href="Ejercicio4_CantVisitas.php">Otra página</a> |
  <a href="Ejercicio4_Eliminar.php">Cerrar sesión</a>
</body>
</html>