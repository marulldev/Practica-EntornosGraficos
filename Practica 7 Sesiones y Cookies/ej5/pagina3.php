<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 5 - Página 3</title>
</head>
<body>
    <h1>Valores recuperados de la sesión</h1>
    <?php if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) { ?>
        <p>Usuario: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>
        <p>Clave: <strong><?php echo htmlspecialchars($_SESSION['clave']); ?></strong></p>
    <?php } else { ?>
        <p>No hay datos en la sesión. <a href="pagina1.php">Cargar datos</a></p>
    <?php } ?>
</body>
</html>
