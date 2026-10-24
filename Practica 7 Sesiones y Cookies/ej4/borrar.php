<?php

setcookie('titular', '', time() - 3600);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cookie borrada</title>
</head>
<body>
    <h1>Preferencia eliminada</h1>
    <p>La cookie fue borrada. La próxima vez que visites el periódico verás los tres titulares.</p>
    <p><a href="periodico.php">Ir al periódico</a></p>
</body>
</html>
