<?php
$fun = getdate();
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds]
segundos, del $fun[mday]/$fun[mon]/$fun[year]";
?>

/*devuelve: Has entrado en esta pagina a las "hora actual" horas, con "minuto actual" minutos y "segundo actual" segundos, del "fecha actual" */

<?php
function sumar($sumando1,$sumando2){
 $suma=$sumando1+$sumando2;
 echo $sumando1."+".$sumando2."=".$suma;
}
sumar(5,6);
?>

/*devuelve: 5+6=11 */
