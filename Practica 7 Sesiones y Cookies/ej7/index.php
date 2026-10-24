<?php

$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Compras")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<?php
session_start();


// Agregar un producto al carrito (el carrito vive en la sesión: id => cantidad)
if (isset($_POST['agregar'])) {
    $id = (int) $_POST['id'];
    $cantidad = max(1, (int) $_POST['cantidad']);

    // Se verifica que el producto exista en el catálogo
    $vExiste = mysqli_query($link, "SELECT id FROM catalogo WHERE id = $id")
        or die("Error en la consulta: " . mysqli_error($link));
    if (mysqli_num_rows($vExiste) > 0) {
        if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = array();
        if (isset($_SESSION['carrito'][$id])) $_SESSION['carrito'][$id] += $cantidad;
        else $_SESSION['carrito'][$id] = $cantidad;
    }
    mysqli_free_result($vExiste);

    header("Location: index.php?agregado=1"); // evita reenviar el formulario al recargar
    exit;
}

$items = isset($_SESSION['carrito']) ? array_sum($_SESSION['carrito']) : 0;

$vResultado = mysqli_query($link, "SELECT id, producto, precio FROM catalogo ORDER BY id")
    or die("Error en la consulta: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 7 - Catálogo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #aaa; padding: 8px 14px; text-align: center; }
        th { background: #ddd; }
        .ok { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Catálogo de productos</h1>
    <p><a href="carrito.php">Ver carrito (<?php echo $items; ?> productos)</a></p>

    <?php if (isset($_GET['agregado'])) echo '<p class="ok">Producto agregado al carrito.</p>'; ?>

    <table>
        <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th></th></tr>
        <?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($fila['producto']); ?></td>
                <td>$ <?php echo number_format($fila['precio'], 2, ',', '.'); ?></td>
                <form method="post" action="index.php">
                    <td><input type="number" name="cantidad" value="1" min="1" style="width:60px"></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                        <input type="submit" name="agregar" value="Agregar al carrito">
                    </td>
                </form>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
mysqli_free_result($vResultado);
mysqli_close($link);
?>
