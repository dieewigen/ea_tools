<?php

//koordinaten der omega-brücke
$winkel = 2*pi()/6;
//echo $winkel;
echo '<hr>Omega-Brücke<br><br>';
for($i=0;$i<=5;$i++)
{

  //zielkoodinaten winkel * entfernung
  $target_x=round(cos($i*$winkel)*2250);
  $target_y=round(sin($i*$winkel)*2250);
  
  //echo '<br>X:Y '.$target_y.':'.$target_x;
  //x/y vertauschen
  echo "INSERT INTO sou_map_base (x, y, pic, special, fraction) VALUES ('$target_y', '$target_x', '2', '1', '999');<br>";
}

/*
for($i=0;$i<=100;$i++)
{
  echo '<br><br><br>';
  $winkel=mt_rand(1,360);
  //die entfernung berechnet sich aus queststufe * gewünschter multiplikator
  $target_x=round(cos($winkel)*$i);
  $target_y=round(sin($winkel)*$i);
  
  echo '<br>X:Y '.$target_x.':'.$target_y;
}
*/

?>