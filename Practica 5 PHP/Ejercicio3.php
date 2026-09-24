<?php
// EJERCICIO 3: un visitante recomienda el sitio a un amigo
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Recomendar</title></head>
<body>
<?php
function limpiar($t) {
    return trim(str_replace(["\r", "\n"], " ", $t));
}
function h($t) { return htmlspecialchars($t, ENT_QUOTES, "UTF-8"); }

$nombre      = limpiar($_POST["nombre"]      ?? "");
$email       = limpiar($_POST["email"]       ?? "");
$email_amigo = limpiar($_POST["email_amigo"] ?? "");
$texto       = trim($_POST["texto"]          ?? "");

if ($nombre === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)
                   || !filter_var($email_amigo, FILTER_VALIDATE_EMAIL)) {
    echo "Datos incompletos o e-mails inválidos. <a href='ej3_recomendar.html'>Volver</a>";
    exit;
}

$urlSitio = "http://www.ejemplo.com";    // <-- URL de tu sitio
$asunto   = "$nombre te recomienda visitar nuestro sitio";

$cuerpo  = "<html><head><title>Recomendación</title></head><body>";
$cuerpo .= "<h1>Hola!</h1>";
$cuerpo .= "<p>Tu amigo/a <b>" . h($nombre) . "</b> te recomienda visitar este sitio: ";
$cuerpo .= "<a href=\"$urlSitio\">$urlSitio</a></p>";
if ($texto !== "") {
    $cuerpo .= "<p>Mensaje: <i>" . nl2br(h($texto)) . "</i></p>";
}
$cuerpo .= "</body></html>";
$cuerpo  = mb_convert_encoding($cuerpo, "ISO-8859-1", "UTF-8");

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $nombre <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

mail($email_amigo, $asunto, $cuerpo, $headers)
?>
</body>
</html>