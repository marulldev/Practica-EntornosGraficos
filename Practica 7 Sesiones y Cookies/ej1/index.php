<?php

$estilos = array('claro' => 'Claro', 'oscuro' => 'Oscuro', 'azul' => 'Azul');
$estilo = 'claro';

if (isset($_POST['estilo']) && isset($estilos[$_POST['estilo']])) {
    
    $estilo = $_POST['estilo'];
    setcookie('estilo', $estilo, time() + 60 * 60 * 24 * 30);
} elseif (isset($_COOKIE['estilo']) && isset($estilos[$_COOKIE['estilo']])) {
    
    $estilo = $_COOKIE['estilo'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 1 - Estilos con cookies</title>
    <link rel="stylesheet" href="<?php echo $estilo; ?>.css">
</head>
<body>
    <h1>Mi página configurable</h1>
    <p>Elegí el aspecto que querés ver. La página lo recordará en tus próximas visitas.</p>

    <form method="post" action="index.php">
        <label for="estilo">Estilo:</label>
        <select name="estilo" id="estilo">
            <?php foreach ($estilos as $clave => $nombre) { ?>
                <option value="<?php echo $clave; ?>" <?php if ($clave == $estilo) echo 'selected'; ?>>
                    <?php echo $nombre; ?>
                </option>
            <?php } ?>
        </select>
        <input type="submit" value="Aplicar">
    </form>

    <h2>Contenido de ejemplo</h2>
    <p>Este texto cambia de colores y tipografía según el estilo elegido.</p>
    <p>Estilo actual: <strong><?php echo $estilos[$estilo]; ?></strong></p>
</body>
</html>
