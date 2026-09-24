<?php
session_start();

$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $p = session_get_cookie_params();
    setcookie(session_name(), "", time() - 42000,
              $p["path"], $p["domain"], $p["secure"], $p["httponly"]);
}

session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Sesión cerrada</title></head>
<body>
  <p>La sesión fue destruida. El contador volverá a comenzar.</p>
  <a href="Ejercicio4_Cuenta.php">Volver a empezar</a>
</body>
</html>