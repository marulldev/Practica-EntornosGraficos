<?php
function comprobar_nombre_usuario($nombre_usuario){
  //compruebo que el tamaño del string sea válido.
  if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
    echo $nombre_usuario . " no es válido<br>";
    return false;
  }

  //compruebo que los caracteres sean los permitidos
  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
  for ($i=0; $i<strlen($nombre_usuario); $i++){
    if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
      echo $nombre_usuario . " no es válido<br>";
      return false;
    }
  }
  echo $nombre_usuario . " es válido<br>";
  return true;
}

// ---------------------------------------------------
// SCRIPT DE PRUEBA
// ---------------------------------------------------

echo "<h3>Casos de prueba - comprobar_nombre_usuario()</h3>";

// Caso 1: nombre demasiado corto (menos de 3 caracteres)
comprobar_nombre_usuario("ab");

// Caso 2: nombre demasiado largo (más de 20 caracteres)
comprobar_nombre_usuario("nombreDeUsuarioMuyMuyLargo");

// Caso 3: nombre con longitud válida, todos caracteres permitidos
comprobar_nombre_usuario("felipe_2024");

// Caso 4: nombre con un caracter no permitido (espacio)
comprobar_nombre_usuario("felipe torres");

// Caso 5: nombre con un caracter no permitido (símbolo @)
comprobar_nombre_usuario("usuario@utn");

// Caso 6: nombre en el límite inferior (exactamente 3 caracteres)
comprobar_nombre_usuario("abc");

// Caso 7: nombre en el límite superior (exactamente 20 caracteres)
comprobar_nombre_usuario("abcdefghij0123456789");

// Caso 8: nombre con guion y guion bajo (permitidos)
comprobar_nombre_usuario("juan-perez_01");

// Caso 9: cadena vacía
comprobar_nombre_usuario("");
?>