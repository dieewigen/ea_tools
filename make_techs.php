<?php
//forschungskosten definieren aus der tabcalc-datei
$fkosten = array (65000,194400,306802,359255,417052,600925,688646,785306,1070179,1211014,1366201,1793402,2013231,2577670,2882713,3621196,4037873,4996676,
5558812,6796051,7546840,9135420,10974045,12161167,14505352,17204583,19037192,22460312,26385887,30880233,36017965,41882995,48569662,56183973,64845010,74686495,
85858527,98529544,117069547,133759663,157718804,179566008,210410382,245680212,278430892,323593544,375070444,433678404,500335139,588328184,675555314);

//frachtmodulgröße definieren aus der tabcalc-datei
$fm_groesse= array(36,43,50,58,67,77,87,99,112,127,142,160,179,200,224,249,278,309,343,381,423,469,520,576,637,705,780,862,953,1053,1163,1285,1419,1566,
1729,1908,2105,2323,2562,2827,3117,3438,3791,4181,4610,5082,5603,6177,6809,7506,8274);

//rohstoffverhätnisse festlegen
$reswert= array ( 1, 2, 5, 10, 15, 20, 25, 30, 35, 40);

//maximaler forschungslevel
$max_tech_level=50;
/*
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// lagermodule
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0]=array(80, 15, 5, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);


//start-id der technologie
$tech_id=101;
$need_tech=0;

//kostenmodifikator 0-10% +/-
$costmod=0;

//array für die forschungskosten, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Lagermodul NSX '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  $hasspace=$fm_groesse[$i-1];
  $needspace=round($hasspace*1.2);
  $needenergy=round($needspace/4);

  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";  
  
  //echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needspace, hasspace, needenergy)   VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '1', '$i', '$modulcost', '$tech_id', '$needspace', '$hasspace', '$needenergy');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}


//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// bergbaumodul
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0]=array(60, 30, 10, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);


//start-id der technologie
$tech_id=301;
$need_tech=0;

//kostenmodifikator 0-10% +/-
$costmod=10;

//array für die forschungskosten, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Bergbaumodul ZAL '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  $canmine=$fm_groesse[$i-1]*2;//doppelte lagermodulgröße
  $needspace=round($canmine*2);
  $needenergy=round($needspace*3);
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";  
  
  //echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needspace, canmine, needenergy)   VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '1', '$i', '$modulcost', '$tech_id', '$needspace', '$canmine', '$needenergy');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}


//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// reaktormodul
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0]=array(65, 25, 10, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);

//start-id der technologie
$tech_id=201;
$need_tech=0;

//kostenmodifikator 0-10% +/-
$costmod=-5;

//array für die forschungskosten, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

$giveenergy=1000;
for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Reaktor MEG '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $giveenergy=round($giveenergy*1.1);
  $needspace=round($giveenergy/15);

  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  //echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needspace, giveenergy) VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '1', '$i', '$modulcost', '$tech_id', '$needspace', '$giveenergy');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}


//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// hyperdrive
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0]=array(20, 50, 30, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);

//start-id der technologie
$tech_id=401;
$need_tech=60002;

//kostenmodifikator 0-10% +/-
$costmod=0;

//array für die forschungskosten, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

$giveenergy=1000;
for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Hyperdrive WOP '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $giveenergy=round($giveenergy*1.1);
  $needenergy=round($giveenergy*1.1);//wird von den reaktoren abgeleitet, man braucht mindestens 2 um ein hd zu versorgen
  $needspace=round($needenergy/2);
  
  $givehyperdrive=$i;
  
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  //echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needenergy, needspace, givehyperdrive) VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '4', '$i', '$modulcost', '$tech_id', '$needenergy', '$needspace', '$givehyperdrive');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}


//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// forschungsmodule fürs raumschiff
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0] =array(70, 5, 25, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);



//start-id der technologie
$tech_id=501;
$need_tech=60003;

//kostenmodifikator 0-10% +/-
$costmod=0;

//array für die forschungskosten, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

$giveenergy=1000;
for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Forschungsmodul ATH '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $giveenergy=round($giveenergy*1.1);
  $needenergy=round($giveenergy*0.5);//wird von den reaktoren abgeleitet, man braucht mindestens einen halben um ein hd zu versorgen
  $needspace=round($needenergy	);
  
  $giveresearch=$i*3600;
  
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  //echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needenergy, needspace, giveresearch)  VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '1', '$i', '$modulcost', '$tech_id', '$needenergy', '$needspace', '$giveresearch');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}



//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// waffenmodule fürs raumschiff
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0] =array(70, 7, 23, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);

//start-id der technologie
$tech_id=601;
$need_tech=60004;

//kostenmodifikator 0-10% +/-
$costmod=0;

//array für die waffenwerte, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

$giveenergy=1000;
for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Waffenmodul BFG '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $giveenergy=round($giveenergy*1.1);
  $needenergy=round($giveenergy*0.75);//wird von den reaktoren abgeleitet, man braucht mindestens 0,75 um ein waffensystem zu versorgen
  $needspace=round($needenergy);
  
  $giveweapon=$i*1000;
  
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needenergy, needspace, giveweapon)  VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '2', '$i', '$modulcost', '$tech_id', '$needenergy', '$needspace', '$giveweapon');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}
*/
/*
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// schildmodule fürs raumschiff
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0] =array(60, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);

//start-id der technologie
$tech_id=701;
$need_tech=60005;

//kostenmodifikator 0-10% +/-
$costmod=0;

//array für die waffenwerte, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

$giveenergy=1000;
for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Schildmodul HYP '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $giveenergy=round($giveenergy*1.1);
  $needenergy=round($giveenergy*0.80);//wird von den reaktoren abgeleitet, man braucht mindestens 0,80 um ein schildsystem zu versorgen
  $needspace=round($needenergy);
  
  $giveshield=$i*6000;
  
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  //echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needenergy, needspace, giveshield)  VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '3', '$i', '$modulcost', '$tech_id', '$needenergy', '$needspace', '$giveshield');<br>";
  
  echo "UPDATE sou_frac_techs SET giveshield='$giveshield' WHERE tech_id='$tech_id';<br>";
  
  $need_tech=$tech_id;
  $tech_id++;
}
*/
/*

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// bergungsmodule fürs raumschiff
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0] =array(80, 15, 5, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);

//start-id der technologie
$tech_id=801;
$need_tech=60007;

//kostenmodifikator 0-10% +/-
$costmod=20;

//array für die waffenwerte, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

$giveenergy=1000;
for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Bergungsmodul RCV '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $giveenergy=round($giveenergy*1.1);
  $needenergy=round($giveenergy*0.20);//wird von den reaktoren abgeleitet, man braucht mindestens 0,25 um ein bergungssystem zu versorgen
  $needspace=round($needenergy*2);
  
  $canrecover=$i*1000;
  
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, needenergy, needspace, canrecover)  VALUES ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '1', '$i', '$modulcost', '$tech_id', '$needenergy', '$needspace', '$canrecover');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}

*/

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// klonmodul
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//verteilungsverhältnis bei den kosten
unset($share);
$share[0]=array(27, 55, 45, 0, 0, 0, 0, 0, 0, 0, 0);
$share[15]=array($share[0][0], 0, $share[0][1], $share[0][1], 0, 0, 0, 0, 0, 0, 0);
$share[20]=array($share[0][0], 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0, 0);
$share[25]=array($share[0][0], 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0, 0);
$share[30]=array($share[0][0], 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0, 0);
$share[35]=array($share[0][0], 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0, 0);
$share[40]=array($share[0][0], 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0, 0);
$share[45]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2], 0);
$share[49]=array($share[0][0], 0, 0, 0, 0, 0, 0, 0, 0, $share[0][1], $share[0][2]);

//start-id der technologie
$tech_id=201;
$need_tech=0;

//kostenmodifikator 0-10% +/-
$costmod=0;

//array für die forschungskosten, modulkosten
unset($t_defs);unset($m_defs);
generate_tech_cost();
generate_modul_cost();

for($i=1;$i<=$max_tech_level;$i++)
{
  $tech_name='Klonmodul DNS '.$i;
  $tech_vor='B1x'.($i).';'.$t_defs[$i-1];
  $modulcost=$m_defs[$i-1];
  
  $canclone=$i*1000;
  
  //echo "UPDATE sou_frac_techs SET tech_vor='$tech_vor', modulcost='$modulcost'WHERE tech_id='$tech_id';<br>";
  
  echo "INSERT INTO sou_frac_techs (tech_id, tech_name, tech_vor, need_tech, bldg_build, bldg_level, modulcost, sort_id, canclone) VALUES 
  ('$tech_id', '$tech_name', '$tech_vor', '$need_tech', '1', '$i', '$modulcost', '$tech_id', '$canclone');<br>";
  $need_tech=$tech_id;
  $tech_id++;
}




//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

//funktion zum generieren der forschungskosten
function generate_tech_cost()
{
  global $max_tech_level, $fkosten, $share, $costmod, $t_defs, $reswert;
  
  for($i=0;$i<$max_tech_level;$i++)
  {
    //gebäudegesamtkosten berechen
    $cost=$fkosten[$i];
    //modifikator berechnen
    $cost=$cost+($cost*$costmod/100);
    //die kosten nach dem verteilungsverhältnis aufteilen
    if(isset($share[$i])){$shareit=$share[$i];}
    //else $shareit=$share[0];
    //die kosten nach dem vorgegebenen verhältnis aufsplitten
    $coststring='';
    for($r=0;$r<11;$r++)
    {
  	  //einzelkosten berechnen
  	  if($r==0) $costpart=$cost*$shareit[$r]/100;
  	  else $costpart=$cost*$shareit[$r]/100/$reswert[$r-1];
      //den wert auf 3 nullen am ende trimmen
      $costpart=round($costpart/1000);
      $costpart=$costpart*1000;
  	
  	  //kostenstring bauen
  	  if($costpart>0)
  	  {
  	    if($coststring!='')$coststring.=';';
  	    if($r==0) $coststring.='Zx'.$costpart;
  	    else $coststring.=$costpart.'x'.($r-1);
  	  }
    } 
    //die werte im hauptarray definieren
    $t_defs[$i]=$coststring;
  }  
}

//funktion zum generieren der modulkosten
//wir nehmen einfach mal 1% der foschungkosten an
function generate_modul_cost()
{
  global $max_tech_level, $fkosten, $share, $costmod, $m_defs, $reswert;
  
  for($i=0;$i<$max_tech_level;$i++)
  {
    //gebäudegesamtkosten berechen
    $cost=round($fkosten[$i]/100);
    //modifikator berechnen
    $cost=$cost+($cost*$costmod/100);
    //die kosten nach dem verteilungsverhältnis aufteilen
    if(isset($share[$i])){$shareit=$share[$i];}
    //else $shareit=$share[0];
    //die kosten nach dem vorgegebenen verhältnis aufsplitten
    $coststring='';
    for($r=0;$r<11;$r++)
    {
  	  //einzelkosten berechnen
  	  if($r==0) $costpart=$cost*$shareit[$r]/100;
  	  else $costpart=$cost*$shareit[$r]/100/$reswert[$r-1];
      //den wert auf 2 nullen am ende trimmen
      $costpart=round($costpart/100);
      $costpart=$costpart*100;
  	
  	  //kostenstring bauen
  	  if($costpart>0)
  	  {
  	    if($coststring!='')$coststring.=';';
  	    if($r==0) $coststring.='Zx'.$costpart;
  	    else $coststring.=$costpart.'x'.($r-1);
  	  }
    } 
    //die werte im hauptarray definieren
    $m_defs[$i]=$coststring;
  }  
}
?>