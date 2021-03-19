<?php
//include "inccon.php";
include "soudata/lib/sou_dbconnect.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Title</title>
</head>
<body bgcolor="#000000" text="#FFFFFF">
<?php
mt_srand((double)microtime()*10000);

//zuerst alle vorhanden namen in einen array packen
$db_daten=mysql_query("SELECT id, sysname FROM sou_map WHERE sysname<>''",$soudb);
while($row = mysql_fetch_array($db_daten))
{
  $vergeben[]=$row["sysname"];
}

//$db_daten=mysql_query("SELECT id FROM db_systems",$db);
$db_daten=mysql_query("SELECT id FROM sou_map WHERE sysname=''",$soudb);
$anz = mysql_num_rows($db_daten);
while($row = mysql_fetch_array($db_daten))
{
  $id=$row["id"];
  
  $sysname=generierename();
  
  //schauen ob es schon in der liste drin ist
  if (in_array($sysname, $vergeben))
  {
  	
  }
  else 
  {
  	mysql_query("UPDATE sou_map SET sysname='$sysname' WHERE id='$id'",$soudb);
  	$vergeben[]=$sysname;
  }
}

echo $anz;

function generierename()
{
  //namen zusammenbauen
  //struktur: 1-4 silben bindestrich 1-5 silben
  $buchstaben='ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  $silben=array('ar','xa','xo','na','an','ra','ox','ax','yn','ny','za','az',
  'zy','yz','ka','ak','as','sa','co','oc','ac','ca','te','et','tz','zt','it','ti',
  'tx','xt','lo','ol','yl','ly','ay','ya','ry','yr','no','na','ne','ni','nu',
  'so','si','se','sa','su','mo','mi','me','mu','ma','ka','ke','ko','ki','ku',
  'ta','te','ti','tu','to','la','le','lu','li','lo','pa','pe','po','pi','pe','pu',
  'ja','jo','je','ji','ju','da','de','du','di','di','ra','re','ro','ri','ru');
  
  $zusatz=array('End', 'Proxima', 'Prime', 'Gate', 'Doom', 'Eta', 'North', 'East', 'South', 'West',
  'Ash','Cat', 'Tor', 'Pre', 'Sun', 'Star','Hell', 'Ether', 'Door', 'Eternal', 'Final',
  'Heaven', 'Ocean', 'Pelar', 'Katez', 'Figar', 'Alron', 'Melis', 'Hope', 'Pain', 'New', 
  'Klash', 'Fall', 'War', 'Peace',
  "Alpha","Beta","Gamma","Delta","Epsilon","Zeta","Eta","Theta","Iota","Kappa","Lambda",
  "My","Ny","Xi","Omikron","Pi","Rho","Sigma","Tau","Ypsilon","Phi","Chi","Psi","Omega");

  $anzsilben=count($silben);
  $anzzusatz=count($zusatz);

  $name='';
  
  $art=mt_rand(1,8);
  
  switch($art){
  case 1:
  //silben-silben
  $csilben=mt_rand(1,4);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $csilben=mt_rand(1,5);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  break;
  case 2:
  //silben zusatz
  $csilben=mt_rand(3,6);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  if(mt_rand(1,100)<=10)
  {
   if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
   $name=$name.$zusatz[mt_rand(0,$anzzusatz-1)];
  }
  break;
  case 3:
  //silben zahl
  $csilben=mt_rand(2,3);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $name=$name.mt_rand(1,1000);
  break;

  case 4:
  //zahl silbe
  $name=$name.mt_rand(1,100);
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $csilben=mt_rand(2,3);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  break;

  case 5:
  //silbe zahl silbe
  $csilben=mt_rand(1,3);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $name=$name.mt_rand(1,500);
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $csilben=mt_rand(1,3);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  break;

  case 6:
  //zahl silbe zahl
  $name=$name.mt_rand(1,400);
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $csilben=mt_rand(1,3);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  $name=$name.mt_rand(1,200);
  break;

  case 7:
  //silben buchstabe
  $csilben=mt_rand(3,6);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  if(mt_rand(1,100)<=10)
  {
   if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
   $name=$name.$buchstaben[mt_rand(0,25)];
  }
  break;

  case 8:
  //buchstabe silben
  if(mt_rand(1,100)<=10)
  {
   $name=$name.$buchstaben[mt_rand(0,25)];
   if (mt_rand(1,2)==1)$name.='-';else $name.=' ';
  }
  $csilben=mt_rand(3,6);
  for ($i=1; $i<=$csilben; $i++)
  {
    $suchsilbe=$silben[mt_rand(0,$anzsilben-1)];
    if ($i==1)$suchsilbe = ucfirst ($suchsilbe);
    $name.=$suchsilbe;
  }
  break;


  }//switch ende

  
  
  //ergebnis zurückliefern
  return $name;
}
?>
