<?php
if(isset($_POST["nom"]) && isset($_POST["prenom"])  && isset($_POST["telephone"]) && isset($_POST["adresse"]) && isset($_POST["email"])  
&& isset($_POST["motivation"]) && isset($_FILES["cv"]) && isset($_FILES["diplome"]))

{
    echo "votre dossier a été bien enregistré";
    return;
}

else{ 
    
 echo "error";
 return;
}

?>
