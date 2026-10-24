<?php
// Ajustar usuario y contraseña según tu servidor MySQL (XAMPP: root sin contraseña)
$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Capitales")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<?php mysqli_close($link); ?>
</body>
</html>
