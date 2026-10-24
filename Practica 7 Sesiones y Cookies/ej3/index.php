<?php
$mensaje = "";

$ultimo = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : "";

if (isset($_POST['guardar'])) {
    $nombre = trim($_POST['usuario']);
    if ($nombre == "") {
        $mensaje = "Ingresá un nombre de usuario.";
    } else {
        setcookie('usuario', $nombre, time() + 60 * 60 * 24 * 30); // antes de la salida HTML
        $ultimo = $nombre;
        $mensaje = "Cookie creada correctamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 3 - Cookie de usuario</title>
</head>
<body>
    <h1>Ingreso de usuario</h1>

    <?php if ($mensaje != "") echo '<p><strong>' . $mensaje . '</strong></p>'; ?>

    <?php if ($ultimo != "") { ?>
        <p>Último nombre de usuario ingresado: <strong><?php echo htmlspecialchars($ultimo); ?></strong></p>
    <?php } else { ?>
        <p>Todavía no se ingresó ningún usuario.</p>
    <?php } ?>

    <form method="post" action="index.php">
        <label>Nombre de usuario: <input type="text" name="usuario" required></label>
        <input type="submit" name="guardar" value="Crear cookie">
    </form>
</body>
</html>
