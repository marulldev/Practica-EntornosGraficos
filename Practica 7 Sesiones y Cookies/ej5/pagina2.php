<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
   
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave']   = $_POST['clave'];
    $ok = true;
} else {
    $ok = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 5 - Página 2</title>
</head>
<body>
    <h1>Variables de sesión</h1>
    <?php if ($ok) { ?>
        <p>Se crearon las variables de sesión <strong>usuario</strong> y <strong>clave</strong>.</p>
        <p><a href="pagina3.php">Ir a la página 3</a></p>
    <?php } else { ?>
        <p>No se recibieron datos. <a href="pagina1.php">Volver al formulario</a></p>
    <?php } ?>
</body>
</html>
