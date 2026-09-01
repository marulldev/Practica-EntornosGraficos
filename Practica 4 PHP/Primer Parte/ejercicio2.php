EJERCICIO 2 - EQUIVALENCIA DE CODIGOS

<?php

//A)
//CODIGO 1:
$i = 1;
while ($i <= 10) {
  print $i++;
}
//devuelve 1,2,3,4,5,6,7,8,9,10 pero i queda en 11 al finalizar el bucle

//CODIGO 2:
$i = 1;
while ($i <= 10):
  print $i;
  $i++;
endwhile;
//devuelve 1,2,3,4,5,6,7,8,9,10 pero i queda en 11 al finalizar el bucle

//CODIGO 3:
$i = 0;
do {
  print ++$i;
} while ($i<10);
//devuelve 1,2,3,4,5,6,7,8,9,10 pero i queda en 10 al finalizar el bucle

//Rta : Todos los codigos devuelven 1,2,3,4,5,6,7,8,9,10 pero el valor final de i es diferente en cada caso. 
// En el primer y segundo codigo i queda en 11 y en el tercer codigo i queda en 10.


//B)

//CODIGO 1:
for ($i = 1; $i <= 10; $i++) {
  print $i;
}
//devuelve 1,2,3,4,5,6,7,8,9,10

//CODIGO 2:
for ($i = 1; ;$i++) {
  if ($i > 10) {
    break;
  }
  print $i;
}
//devuelve 1,2,3,4,5,6,7,8,9,10

//CODIGO 3:
$i = 1;
for (;;) {
  if ($i > 10) {
    break;
  }
  print $i;
  $i++;
}
//devuelve 1,2,3,4,5,6,7,8,9,10

//CODIGO 4:
for ($i = 1; $i <= 10; print $i, $i++) ;
//devuelve 1,2,3,4,5,6,7,8,9,10

//Rta : Todos los codigos devuelven 1,2,3,4,5,6,7,8,9,10 y el valor final de i es 11 en todos los casos.

//C)

//CODIGO 1 (if / elseif / elseif):
if ($i == 0) {
  print "i equals 0";
} elseif ($i == 1) {
  print "i equals 1";
} elseif ($i == 2) {
  print "i equals 2";
}
//Devuelve "i equals 1" si i es igual a 1, "i equals 0" si i es igual a 0 y "i equals 2" si i es igual a 2
//CODIGO 2 (switch):
switch ($i) {
  case 0:
    print "i equals 0";
    break;
  case 1:
    print "i equals 1";
    break;
  case 2:
    print "i equals 2";
    break;
}
?>
//Devuelve "i equals 1" si i es igual a 1, "i equals 0" si i es igual a 0 y "i equals 2" si i es igual a 2

//Rta : Ambos codigos devuelven lo mismo