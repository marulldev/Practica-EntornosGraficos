<?php

$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "base2")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<?php
session_start();


$encontrado = false;
$mensaje = "No se recibió ningún mail.";

if (isset($_POST['mail'])) {
    $mail = mysqli_real_escape_string($link, trim($_POST['mail']));

    $vResultado = mysqli_query($link, "SELECT nombre FROM alumnos WHERE mail = '$mail'")
        or die("Error en la consulta: " . mysqli_error($link));

    if ($fila = mysqli_fetch_array($vResultado)) {
        // El mail existe: se guarda el nombre en una variable de sesión
        $_SESSION['nombre'] = $fila['nombre'];
        $encontrado = true;
        $mensaje = "Alumno encontrado. Su nombre se guardó en la sesión.";
    } else {
        unset($_SESSION['nombre']); // por si había un alumno anterior
        $mensaje = "El mail ingresado no existe en la tabla alumnos.";
    }
    mysqli_free_result($vResultado);
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 6 - Resultado</title>
</head>
<body>
    <h1>Resultado de la búsqueda</h1>
    <p><?php echo $mensaje; ?></p>

    <?php if ($encontrado) { ?>
        <p><a href="bienvenida.php">Ir a la página de bienvenida</a></p>
    <?php } else { ?>
        <p><a href="formulario.php">Volver al formulario</a></p>
    <?php } ?>
</body>
</html>
