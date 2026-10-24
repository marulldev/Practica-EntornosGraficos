<?php
$tipos = array(
    'politica'  => 'Noticia política',
    'economica' => 'Noticia económica',
    'deportiva' => 'Noticia deportiva'
);

if (isset($_POST['guardar']) && isset($_POST['titular']) && isset($tipos[$_POST['titular']])) {
    
    setcookie('titular', $_POST['titular'], time() + 60 * 60 * 24 * 30);
    header('Location: periodico.php');
    exit;
}

$actual = isset($_COOKIE['titular']) ? $_COOKIE['titular'] : "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 4 - Configurar periódico</title>
</head>
<body>
    <h1>Configurar el periódico</h1>
    <p>¿Qué titular querés ver al visitar el sitio?</p>

    <form method="post" action="configurar.php">
        <?php foreach ($tipos as $clave => $nombre) { ?>
            <label>
                <input type="radio" name="titular" value="<?php echo $clave; ?>"
                    <?php if ($clave == $actual) echo 'checked'; ?> required>
                <?php echo $nombre; ?>
            </label><br>
        <?php } ?>
        <br>
        <input type="submit" name="guardar" value="Guardar preferencia">
    </form>

    <p><a href="periodico.php">Volver al periódico</a></p>
</body>
</html>
