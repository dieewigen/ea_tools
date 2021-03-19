<?php
//include "inccon.php";

mt_srand((double)microtime()*10000);
//ALTER TABLE tbl_name AUTO_INCREMENT = 1

//einteilung des zu generierenden gebiets
//segment: block von 15x15 feldern
$sx=15;
$sy=15;
//cluster: block von 100x100 segmenten
$cx=100;
$cxa=-50;
$cxe=50;

$cy=100;
$cya=-50;
$cye=50;

//sterne pro segment (höchste dichte)
$sdmax=50;

//abnahme der sternendichte pro segment von der höchsten dichte
$sdmalus=0.7;

header ("Content-type: image/png");
$im = @imagecreatetruecolor($sx*$cx, $sy*$cy) or die("Cannot Initialize new GD image stream");
//echo $sx*$cx;
//schwarzer hintergrund:
imagecolorallocate($im, 255, 255, 255);
$x=1;$y=1;
//eine farbe für die sterne definieren

$farbe=imagecolorallocate($im, 255, 255, 255);

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




//neuer ansatz über kreisfuntion

//hauptgebiet
for($i=0;$i<200000;$i++)
{
  $maxx=750;//mt_rand (0, 750);
  $maxy=750;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= (750*750/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / (750*750) * 100;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);
  }
  $starcounter++;
}

//verstärktes zentrum
for($i=0;$i<80000;$i++)
{
  $maxx=350;//mt_rand (0, 350);
  $maxy=350;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= (350*350/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / (350*350) * 100;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 1
for($i=0;$i<15000;$i++)
{
  $maxx=150;//mt_rand (0, 350);
  $maxy=150;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx+250;
    $ry=$ry+250;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 2
for($i=0;$i<5000;$i++)
{
  $maxx=100;//mt_rand (0, 350);
  $maxy=100;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx-0;
    $ry=$ry-0;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 3
for($i=0;$i<5000;$i++)
{
  $maxx=100;//mt_rand (0, 350);
  $maxy=100;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx-250;
    $ry=$ry+150;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 4
for($i=0;$i<5000;$i++)
{
  $maxx=130;//mt_rand (0, 350);
  $maxy=130;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx+50;
    $ry=$ry-250;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 5
for($i=0;$i<5000;$i++)
{
  $maxx=130;//mt_rand (0, 350);
  $maxy=130;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx-450;
    $ry=$ry-50;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 6
for($i=0;$i<3000;$i++)
{
  $maxx=100;//mt_rand (0, 350);
  $maxy=100;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx+500;
    $ry=$ry-400;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}

//ballung 7
for($i=0;$i<4000;$i++)
{
  $maxx=150;//mt_rand (0, 350);
  $maxy=150;//$maxx;
  $rx=mt_rand (0, $maxx);
  $fl=mt_rand (1,2);
  if($fl==1)$rx=$rx*(-1);
  $ry=mt_rand (0, $maxy);
  $fl=mt_rand (1,2);
  if($fl==1)$ry=$ry*(-1);

  $absx=750;
  $absy=750;
  if ($rx*$rx+$ry*$ry <= ($maxx*$maxy/100*mt_rand(20, 100)))
  {
    $w=($rx*$rx+$ry*$ry) / ($maxx*$maxy) * 100;
    $rx=$rx-250;
    $ry=$ry-550;
    //$w+=10;
    if(mt_rand(1, 100)>$w)
    imagesetpixel($im, $absx+$rx, $absy+$ry, $farbe);

  }
  $starcounter++;
}


imagepng($im, "stars.png");
imagedestroy($im);
echo $starcounter;

?>
