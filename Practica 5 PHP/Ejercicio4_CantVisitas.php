<?php
session_start();

if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 1;
} else {
    $_SESSION["contador"]++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Página 2</title></head>
<body>
  <h1>Página 2</h1>
  <?php echo "Has visitado " . $_SESSION["contador"] . " páginas"; ?>
  <br><br>
  <a href="Ejercicio4_Cuenta.php">Otra página</a> |
  <a href="Ejercicio4_Eliminar.php">Cerrar sesión</a>
</body>
</html>