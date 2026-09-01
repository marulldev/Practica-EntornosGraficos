<?php
$a = array( 'color' => 'rojo',
 'sabor' => 'dulce',
 'forma' => 'redonda',
 'nombre' => 'manzana',
 4
 );
?>

<?php
$b['color'] = 'rojo';
$b['sabor'] = 'dulce';
$b['forma'] = 'redonda';
$b['nombre'] = 'manzana';
$b[] = 4;
?> 

echo "<pre>";
print_r($a);
print_r($b);