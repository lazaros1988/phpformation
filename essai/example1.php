<?php
//comment créer une variable
//nomenclature: caractères alphanumériques
$prenom="lazare";
$nom="TREKPO";
$fonction="policier";
$age=33;

$math=20;
$physique=18;
$biologie=17;
$total= ($math+$physique+$biologie);

//calculons la moyenne
echo $total=($math+$physique+$biologie);
echo $moy=$total/3;
echo "ma note en math est :" $math;
echo "ma note en physique est:" $physique;
echo "ma note en biologie est" $biologie;

//concatenation
echo "ma note en math:".$math;
$ph= "ma note en math est:".$math;
echo $ph;
 
// retour à la ligne

echo "math:".$math."\n";
echo "physique:".$physique."\n";
echo "biologie:" .$biologie."\n";



?>
Bonjour et bienvenue à cette session de formation sur PHP

<?php
echo $prenom;
echo $age;
?>