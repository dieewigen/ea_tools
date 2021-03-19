<?php
//include "inccon.php";

mt_srand((double)microtime()*10000);
//ALTER TABLE tbl_name AUTO_INCREMENT = 1

//einteilung des zu generierenden gebiets
//segment: block von 15x15 feldern
$sx=15;
$sy=15;
//cluster: block von 100x100 segmenten
$cx=300;
//$cxa=-50;
//$cxe=50;

$cy=300;
//$cya=-50;
//$cye=50;

//sterne pro segment (höchste dichte)
//$sdmax=50;

//abnahme der sternendichte pro segment von der höchsten dichte
//$sdmalus=0.7;

//header ("Content-type: image/png");
$im = @imagecreatetruecolor($sx*$cx, $sy*$cy) or die("Cannot Initialize new GD image stream");
//echo $sx*$cx;
//schwarzer hintergrund:
imagecolorallocate($im, 255, 255, 255);
$x=1;$y=1;
//eine farbe für die sterne definieren
$farbe=imagecolorallocate($im, 255, 255, 255);

//neuer ansatz über kreisfuntion

//das zentrum definieren
$absx=2250;
$absy=2250;


//hauptgebiet
for($i=0;$i<500;$i++)
{
  $maxx=150;//mt_rand (0, 750);
  $maxy=150;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  //$absx=7500;
  //$absy=7500;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);
  }
  $starcounter++;
}


imagepng($im, "stars_angus_bar.png");
imagedestroy($im);
echo $starcounter;

//eine schleife die die sonnensysteme setzt

/*
for($czx=$cxa;$czx<=$cxe;$czx++)//für die cluster auf x-ebene
{
  for($czy=$cya;$czy<=$cye;$czy++)//für die cluster auf y-ebene
  {
    //hier werden dann $anz sonnensysteme gesetzt
    //schauen wie weit man vom zentrum entfernt ist
    if ($czx<0)$malx=$czx*(-1);else $malx=$czx;
    if ($czy<0)$maly=$czy*(-1);else $maly=$czy;
    $malx=$malx*$sdmalus;
    $maly=$maly*$sdmalus;
    $malus=$malx+$maly;
    if($maly!=0)
    if($malx/$maly<1 AND $malx/$maly>-1)$malus=$malus/1.05;
    
    $anz=$sdmax-$malus;


    $toset=0;
    $absx=$czx*$sx+750;
    $absy=$czy*$sy+750;
    while($toset<$anz)
    {
      $rx=mt_rand (0, $sx-1);
      $ry=mt_rand (0, $sy-1);
      imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);
      $toset++;
      $starcounter++;
    }
  }
}
*/

?>
