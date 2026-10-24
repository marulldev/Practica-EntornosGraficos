<?php
// Dibuja la tabla de ciudades. Si se pasa $accion (archivo) agrega una columna con un enlace por fila.
function tablaCiudades($vResultado, $accion = "", $textoAccion = "")
{
    echo '<table>';
    echo '<tr><th>id</th><th>ciudad</th><th>país</th><th>habitantes</th><th>superficie</th><th>tieneMetro</th>';
    if ($accion != "") echo '<th>acción</th>';
    echo '</tr>';

    while ($fila = mysqli_fetch_array($vResultado)) {
        echo '<tr>';
        echo '<td>' . $fila['id'] . '</td>';
        echo '<td>' . htmlspecialchars($fila['ciudad']) . '</td>';
        echo '<td>' . htmlspecialchars($fila['pais']) . '</td>';
        echo '<td>' . $fila['habitantes'] . '</td>';
        echo '<td>' . $fila['superficie'] . '</td>';
        echo '<td>' . $fila['tieneMetro'] . '</td>';
        if ($accion != "") {
            echo '<td><a href="' . $accion . '?id=' . $fila['id'] . '">' . $textoAccion . '</a></td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

// Lee y valida los datos del formulario de alta/modificación. Devuelve array o null si hay error.
function datosFormulario($link)
{
    $ciudad = mysqli_real_escape_string($link, trim($_POST['ciudad']));
    $pais   = mysqli_real_escape_string($link, trim($_POST['pais']));
    if ($ciudad == "" || $pais == "") return null;

    return array(
        'ciudad'     => $ciudad,
        'pais'       => $pais,
        'habitantes' => (int) $_POST['habitantes'],
        'superficie' => (float) $_POST['superficie'],
        'tieneMetro' => ((int) $_POST['tieneMetro']) ? 1 : 0
    );
}
?>
