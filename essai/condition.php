<?php
/*synthase: la condition est une variable booléenne 
if(condition){
    action
}
else if(condition 2){action 2
}
esle{
    action par defaut
}
*/ 
$heure=10;
$salutations=["bonjour", "bon aprèes midi", "bonsoir", "bonne nuit"];
if($heure>=0 && $heure <=12){
    //Bonjour
    echo $salutations[0]
}
elseif($heure>=12 && $heure <15) 
    //Bon après midi

elseif($heure>=15 && $heure <20) 
    //Bonsoir
    echo $salutations[1]

else{
    //bonne nuit
    echo $salutations[2]
}
 


/* les operateurs de comparaison
> superieur
< inferieur
<= inferieur ou egal
>= superieur ou egal
== egal
=== egal et meme type
!= different
 */

 /*les operateurs ET et OU 
 && ET
 || OU
 (vrai) et (faux)= faux
 (faux) et (vrai)= faux
 (vrai) et (vrai) = vrai
 (faux) et (faux) = faux
  
 (vrai) ou (faux) = vrai
 (faux) ou (vrai) = vrai
 (vrai) ou (vrai) = vrai
 (faux) ou (faux) =faux