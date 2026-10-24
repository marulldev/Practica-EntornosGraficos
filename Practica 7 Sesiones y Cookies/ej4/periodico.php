<?php
$titulares = array(
    'politica'  => array('Noticia política',  'El Congreso debate una nueva reforma del sistema electoral'),
    'economica' => array('Noticia económica', 'El dólar y la inflación marcan la agenda de la semana'),
    'deportiva' => array('Noticia deportiva', 'La selección prepara su próximo partido con el plantel completo')
);


if (isset($_COOKIE['titular']) && isset($titulares[$_COOKIE['titular']])) {
    $mostrar = array($_COOKIE['titular']);
} else {
    $mostrar = array_keys($titulares);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>El Diario Digital</title>
</head>
<body>
    <h1>El Diario Digital</h1>

    <?php foreach ($mostrar as $clave) { ?>
        <h2><?php echo $titulares[$clave][0]; ?></h2>
        <p><?php echo $titulares[$clave][1]; ?></p>
    <?php } ?>

    <hr>
    <p>
        <a href="configurar.php">Elegir qué titular ver</a> |
        <a href="borrar.php">Borrar mi preferencia (cookie)</a>
    </p>
</body>
</html>
