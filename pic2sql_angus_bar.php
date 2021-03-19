<?php

$fp=fopen("stars_angus_bar.sql", "w");

$im = imagecreatefrompng("stars_angus_bar.png");
//$im2 = imagecreatetruecolor(15000, 15000);
//imagecolorallocate($im2, 255, 255, 255);
//$farbe=imagecolorallocate($im2, 255, 255, 255);

$ry=2250;
for ($y=0;$y<4500;$y++)
{
  for ($x=0;$x<4500;$x++)
  {
    if(imagecolorat($im, $x, $y)>0)
    {
      $rx=$x-2250;
      
      $rx=$rx-1000000;

      //$datenstring="mysql_query(\"INSERT INTO sou_map SET x='$rx', y='$ry', z=1;\");\n";
      $datenstring="INSERT INTO sou_map SET x='$rx', y='$ry', z=1;\n";
      fputs($fp,$datenstring);
      $starcounter++;

      //imagesetpixel($im2, $x, $y, $farbe);
    }
  }
  $ry--;
}
//imagepng($im);
imagedestroy($im);

/*


*/
fclose($fp);
//imagepng($im2, "starsnew2.png");
echo $starcounter;
?>
