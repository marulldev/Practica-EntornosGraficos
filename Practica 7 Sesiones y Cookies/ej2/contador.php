<?php

$unAnio = time() + 60 * 60 * 24 * 365;

if (isset($_COOKIE['contador'])) {
    $visitas = (int) $_COOKIE['contador'] + 1;
    $mensaje = "Has visitado esta página $visitas veces.";
} else {
    $visitas = 1;
    $mensaje = "¡Bienvenido! Es la primera vez que accedés a esta página.";
}
// Se actualiza la cookie (antes de cualquier salida HTML)
setcookie('contador', $visitas, $unAnio);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 2 - Contador de visitas</title>
</head>
<body>
    <h1>Contador de visitas</h1>
    <p><?php echo $mensaje; ?></p>
    <p><a href="contador.php">Volver a cargar la página</a></p>
</body>
</html>
