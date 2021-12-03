<?php

//les tableaux à index
$participants=["Bienvenu","Casimir","desire"];
echo $participants[0];

//les tableaux associatifs

$note=["math"=>20,"physique"=>18, "biologie"=>17];
echo "ma note en math:".$note["math"];
echo "ma note en physique:".$note["physique"];
echo "ma note en biologie:".$note["biologie"];

$moy=($note["math"] + $note["physique"] + $note["biologie"])/3;
echo $moy;


?>

