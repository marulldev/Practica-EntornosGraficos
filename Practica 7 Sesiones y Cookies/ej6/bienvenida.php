<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 6 - Bienvenida</title>
</head>
<body>
    <?php if (isset($_SESSION['nombre'])) { // ¿está definida la variable de sesión? ?>
        <h1>¡Bienvenido alumno <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>
    <?php } else { ?>
        <h1>No puede visitar esta página</h1>
        <p>Primero debe identificarse ingresando el mail de un alumno.</p>
        <p><a href="formulario.php">Ir al formulario</a></p>
    <?php } ?>
</body>
</html>
