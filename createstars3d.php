<!--
/*
 * 3dhtml Example :: MouseCube3D
 * http://3dhtml.netzministerium.de
 * Version 1.0, 20/11/2001
 * 
 * Copyright (c) 2001 by Netzministerium.de
 * Written by Till Nagel and René Sander.
 * Distributed under the terms of the GNU Lesser General Public.
 * (See http://3dhtml.netzministerium.de/licence.txt for details)
 */
-->
<html>
<head>

<title>3dhtml Example :: MouseCube3D</title>
<!-- helper libs -->
<script language="JavaScript" src="../js/LyrObj.js"></script>
<script language="JavaScript" src="../js/ColorUtil.js"></script>
<!-- core 3dhtml lib -->
<script language="JavaScript" src="../js/3dhtml.js"></script>
<!-- modulators -->
<script language="JavaScript" src="../js/MouseModulator.js"></script>
<!-- materials -->
<script language="JavaScript" src="../js/materials.js"></script>

<script language="javascript">
<!-- // (c) 2001 Till Nagel, till@netzministerium.de & Rene Sander, rene@netzministerium.de

// ---------------------------------------------------------------------------

// creates cube model with ColorRectMaterial blending from white to black
var cubeModel;
cubeModel = new Model("cube", createColorRectMaterial(new Color("000000"), new Color("999999"), "images/space.gif"));
// Wow - Netscape really sucks. Remove this comment line and it won't recognize the first point!

// defines model points.
// The model's points have to be defined before the respective code is written into the document.
cubeModel.setPoints(createCubeModelPoints());


// ---------------------------------------------------------------------------

// modulator to rotate the model dependent on mouse interactions
var myMouseModulator = new MouseModulator("myMouseModulator", 0);


// ---------------------------------------------------------------------------

function initOnLoad() {
	fixNetscape();

	cubeModel.assignLayers();
	
	// creates and inits matrix to initialize the model
	var initMatrix = new Matrix();
	initMatrix.scale(50, 50, 50);
	
	// >> begin to work with the model etc.

	// initializes model
	cubeModel.transform(initMatrix);
	
	// >> first draw of the model (recommended)
	 cubeModel.draw();
	
	// starts animation
	animate();
}

/*
 * The main animate method. Calls itself repeatedly.
 */
function animate() {
	var delay = 10;
	
	// animates cube model ----------------------------------------

	// animates the modulator to spin the cube
	myMouseModulator.animate();
	// transforms the cube depending on mouse movements.
	cubeModel.transform(myMouseModulator.getMatrix());
	
	// updates display
	cubeModel.draw();
	
	// calls itself with an delay to decouple client computer speed from the animation speed.
	// result: the animation is as fast as possible.
	setTimeout("animate()", delay);
}


// event handling
document.onmousemove = mouseMoveHandler;
document.onmousedown = mouseDownHandler;
document.onmouseup = mouseUpHandler;
if (ns || ns6) document.captureEvents(Event.MOUSEMOVE | Event.MOUSEDOWN | Event.MOUSEUP);

/*
 * The mouse handlers in this document must call the modulator's handlers.
 * To be able to use a mouse modulator and to do your own stuff.
 */
function mouseMoveHandler(e) {
	// calls move handler of the mouse modulator
	myMouseModulator.move(e);

	/*
	// other stuff, e.g.
	if (ns || ie) {
		mouseX = (ns) ? e.pageX : event.x;
		mouseY = (ns) ? e.pageY : event.y;
	}
	*/

	return !ie;
}

function mouseDownHandler(e) {
	// calls down handler of the mouse modulator
	myMouseModulator.down(e);
}

function mouseUpHandler(e) {
	// calls up handler of the mouse modulator
	myMouseModulator.up(e);
}



// ---------------------------------------------------------------------------

function createCubeModelPoints() {
	// the cube model
	return new Array(
		new Point3D( 1,  1,  1, 0)
		//new Point3D( 1,  1, -1, 0),
		//new Point3D( 1, -1,  1, 0),
		//new Point3D( 1, -1, -1, 0),
		//new Point3D(-1,  1,  1, 0),
		//new Point3D(-1,  1, -1, 0),
		//new Point3D(-1, -1,  1, 0),
		//new Point3D(-1, -1, -1, 0)



<?php
//include "inccon.php";

mt_srand((double)microtime()*10000);
//ALTER TABLE tbl_name AUTO_INCREMENT = 1



//////////////////////////////////////////////////////////////////////////////
//// kugelsternhaufen
//////////////////////////////////////////////////////////////////////////////
$starcounter=0;

//neuer ansatz über kreisfuntion

//hauptgebiet
//anzahl der sterne, wobei durch die ausdünnung nicht alle entstehen werden
$anzstars=200;
for($i=0;$i<$anzstars;$i++)
{
  //maxwerte in lichtjahrenzehneln (100 = 10 LJ)
  $radius=5000;
  $maxx=$radius;//mt_rand (0, 750);
  $maxy=$radius;//$maxx;
  $maxz=$radius;//ma
  //der zufallswert entscheidet ob die achse negativ oder positiv ist
  //x-koordinate bestimen
  $rx=mt_rand(0, $maxx);
  if(mt_rand (1,2)==1)$rx=$rx*(-1);
  //y-koordinate bestimmen
  $ry=mt_rand (0, $maxy);
  if(mt_rand(1,2)==1)$ry=$ry*(-1);
  //z-koordinate bestimmen
  $rz=mt_rand (0, $maxz);
  if(mt_rand(1,2)==1)$rz=$rz*(-1);

  //schauen ob die koordinaten innerhalb des definierten bereichs liegen
  //damit es keine saubere kugel wird den radius per zufall schwanken lassen
  $pr=sqrt($rx*$rx+$ry*$ry+$rz*$rz); //entfernung zum zentrum
  if ($pr <= $radius*mt_rand(80, 100)/100)
  {
    //damit die sterndichte abnimmt, zum rand hin weniger sterne anzeigen
    //die entfernung zum zentrum in prozent zur maximalen ausdehnung herausfinden
    $entfproz=$pr*100/$radius;
  	$w=$entfproz/4;
    if($entfproz<10) $zentrum1++;
    if(mt_rand(1, 100)>$w)
    {
      //sternensystem in der datenbank ablegen
      if($entfproz<10) $zentrum2++;
      //echo "X: $rx Y: $ry Z: $rz E: $entfproz<br>";
      echo ', new Point3D('.($rx/5000).', '.($ry/5000).', '.($rz/5000).', 0)';
      $starcounter++;
    }
  }
}
//echo $zentrum1.'<br>'.$zentrum2.'<br>';
/*
//verstärktes zentrum
$anzstars=80000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=15000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=5000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=5000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=5000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=5000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=3000;
for($i=0;$i<$anzstars;$i++)
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
$anzstars=7000;
for($i=0;$i<$anzstars;$i++)
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

*/
//imagepng($im, "stars.png");
//imagedestroy($im);
//echo $starcounter;

?>
	);
}

// -->
</script>
</head>

<body onload="initOnLoad()" bottommargin="0" leftmargin="0" marginheight="0" marginwidth="0" rightmargin="0" topmargin="0" style="height:100%">

	<!-- layer to bugfix netscape -->
	<div id="fixnetscape" style="position:absolute;visibility:hidden"></div>
	
	<script language="JavaScript" type="text/javascript">
	<!-- // (c) 2001 Till Nagel, till@netzministerium.de & Rene Sander, rene@netzministerium.de
	
	/* MANDATORY: INSERTION OF HTML PART INTO PAGE
	   creates the HTML code representing the model's points
	   NB: This is written directly into the page from within the method */
	
	cubeModel.createPointCode();
	// -->
	</script>

</body>
</html>
