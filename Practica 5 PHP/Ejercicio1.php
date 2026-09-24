<?php

$destinatario = "juancruzmarull@gmail.com";
$asunto = "Prueba";

$cuerpo = '
<html>
<head>
  <title>Envio de mail EG 2026</title>
</head>
<body>
  <h1>EG 2026</h1>
  <p>
    <b>Esto es una prueba</b> de envío de correo con formato HTML
    a través del servidor php.
  </p>
</body>
</html>
';

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: NN <nn@nn.com>\r\n";
$headers .= "Reply-To: ss@ss.com\r\n";
$headers .= "Cc: yy@yy.com\r\n";
$headers .= "Bcc: zz@zz.com, pp@pp.com\r\n";

$cuerpo = mb_convert_encoding($cuerpo, "ISO-8859-1", "UTF-8");

@mail($destinatario, $asunto, $cuerpo, $headers)

?>
