<?php
// EJERCICIO 2: recibe los datos del formulario de contacto y los envía al webmaster
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Contacto</title></head>
<body>
<?php

function limpiar($t) {
    return trim(str_replace(["\r", "\n"], " ", $t));
}

$nombre = limpiar($_POST["nombre"] ?? "");
$email  = limpiar($_POST["email"]  ?? "");
$texto  = trim($_POST["texto"]     ?? "");

$fecha = date("d-m-Y");
$hora  = date("H:i:s");

$destino = "juancruzmarull@gmail.com";      
$asunto  = "Comentario";
$desde   = "From: " . $email;            

$comentario = "
\n
Nombre: $nombre\n
Email: $email\n
Consulta: $texto\n
Enviado: $fecha a las $hora\n
\n
";

mail($destino, $asunto, $comentario, $desde)

?>
</body>
</html>