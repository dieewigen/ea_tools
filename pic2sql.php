<?php

$fp=fopen("stars.sql", "w");

$im = imagecreatefrompng("stars.png");
$im2 = imagecreatetruecolor(1500, 1500);
imagecolorallocate($im2, 255, 255, 255);
$farbe=imagecolorallocate($im2, 255, 255, 255);

$ry=750;
for ($y=0;$y<1500;$y++)
{
  for ($x=0;$x<1500;$x++)
  {
    if(imagecolorat($im, $x, $y)>0)
    {
      $rx=$x-750;

      $datenstring="INSERT INTO db_systems SET x='$rx', y='$ry';\n";
      fputs($fp,$datenstring);
      $starcounter++;

      imagesetpixel($im2, $x, $y, $farbe);
    }
  }
  $ry--;
}
//imagepng($im);
imagedestroy($im);

/*


*/
fclose($fp);
imagepng($im2, "stars2.png");
echo $starcounter;
?>
