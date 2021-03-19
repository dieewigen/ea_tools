diee<?php
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

$db_daten=mysql_query("SELECT id FROM sou_map WHERE pic=0",$soudb);
$anz = mysql_num_rows($db_daten);
while($row = mysql_fetch_array($db_daten))
{
  $id=$row["id"];
  $pic=rand(1,12);
  mysql_query("UPDATE sou_map SET pic='$pic' WHERE id='$id';",$soudb);
}

echo $anz;

?>
