<?php

$link = mysqli_connect("localhost", "root", "")
    or die("No se pudo conectar: " . mysqli_connect_error());

mysqli_select_db($link, "Compras")
    or die("No se pudo seleccionar la base: " . mysqli_error($link));

mysqli_set_charset($link, "utf8mb4");
?>
<?php
session_start();


if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = array();


if (isset($_POST['quitar'])) {
    unset($_SESSION['carrito'][(int) $_POST['id']]);
}
if (isset($_POST['vaciar'])) {
    $_SESSION['carrito'] = array();
}

$carrito = $_SESSION['carrito'];
$total = 0;
$vResultado = null;

if (count($carrito) > 0) {
    
    $ids = implode(",", array_map('intval', array_keys($carrito)));
    $vResultado = mysqli_query($link, "SELECT id, producto, precio FROM catalogo WHERE id IN ($ids) ORDER BY id")
        or die("Error en la consulta: " . mysqli_error($link));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ejercicio 7 - Carrito</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #aaa; padding: 8px 14px; text-align: center; }
        th { background: #ddd; }
    </style>
</head>
<body>
    <h1>Mi carrito</h1>
    <p><a href="index.php">&laquo; Seguir comprando</a></p>

    <?php if ($vResultado == null || mysqli_num_rows($vResultado) == 0) { ?>
        <p>El carrito está vacío.</p>
    <?php } else { ?>
        <table>
            <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th></th></tr>
            <?php while ($fila = mysqli_fetch_array($vResultado)) {
                $cantidad = $carrito[$fila['id']];
                $subtotal = $fila['precio'] * $cantidad;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['producto']); ?></td>
                    <td>$ <?php echo number_format($fila['precio'], 2, ',', '.'); ?></td>
                    <td><?php echo $cantidad; ?></td>
                    <td>$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    <td>
                        <form method="post" action="carrito.php">
                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                            <input type="submit" name="quitar" value="Quitar">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong>$ <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
            </tr>
        </table>

        <form method="post" action="carrito.php">
            <br>
            <input type="submit" name="vaciar" value="Vaciar carrito">
        </form>
    <?php } ?>
</body>
</html>
<?php
if ($vResultado != null) mysqli_free_result($vResultado);
mysqli_close($link);
?>
