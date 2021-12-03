<?php


?>


/*
* 1-intégrer bootstrap
* 2-créer un formulaire: nom, prenom, adresse, telephone, email, lettre de motivation(saisir), cv, Diplomes
* postuler(de couleur bleu)
* recupere les données et les afficher à l'utilisateur
 */
$nom= $_POST["nom"];
$prenom= $_POST["prenom"];
$adresse= $_POST["adresse"];
$telephone= $_POST["telephone"];
$email= $_POST["email"];
$lm= $_POST["lettre de motivation"];
$cv= $_FILES["cv"];
$diplome= $_FILES["diplome"];

if(isset($_POST["nom"]) || isset($_POST["prenom"]) || isset($_POST["adresse"]) || isset($_POST["telephone"]) 
|| isset($_POST["email"]) || isset($_POST["lettre de motivation"]) || isset($_FILES["cv"]) || isset($_FILES["diplome"]))

{
    echo ("rassurez-vous de renseigner les noms, prenom, adresse, email, telephone, lettre de motivation");
    return;
}

else{ 
    
    var_dump($_FILES['cv']);
    var_dump($_FILES['diplome']);
    
   
    //Testons si l'extension est autorisée
    $filesInfo= pathinfo($_FILES['cv']['name']);
    $filesdiplome= pathinfo($_FILES['diplome']['name']);
    
    // array qui contient les infos du cv et du diplome
    var_dump($fileInfocv);
    var_dump($fileInfodiplome);
    // recuperer les extensions
    $extensioncv= $fileInfocv["extension"];
    $extensiondiplome= $fileInfodiplome["extension"];
    // liste des extensions autorisées
    $allowedcvextensions= ["pdf", "doc", "docx"];
    $alloweddiplomeextensions= ["pdf", "doc", "docx"];

    if (!in_array($extensioncv, $allowedcvExtensions)){
        echo ("Extension non autorisée");
        return;
    }
    
    if (!in_array($extensiondiplome, $alloweddiplomeExtensions)) {
        echo ("Extension non autorisée");
        return;
    }
    
    //valider le fichier et le stocker definitivement
    move_uploaded_file($_FILES["cv"] ["tmp_name"], 
    "CVs/" .basename($_FILES["cv"]["name"]));
    
    move_uploaded_file($_FILES["diplome"] ["tmp_name"], 
    "Diplomes/" .basename($_FILES["diplome"]["name"]));


    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <div class="container">
    <div class="row">

    <form method="post" enctype="multipart/form-data" action="#">
            <input type="text" "required" id="nom" name="nom" placeholder="nom"/>
            <input type="text"  "required"   id="prenom" name="prenom" placeholder="prenom"/>
            <input type="text"  "required" id="adresse" name="adresse" placeholder="adresse"/>
            <input type="text"  "required" id="telephone" name="telephone" placeholder="telephone"/>
            <input type="text" "required"   id="email" name="email" placeholder="email"/>
            <textarea name="lettre de motivation(saisir)" id="lettre de motivation(saisir)" rows=5></textarea> 
            <input type="file" "required" id="cv" name="cv" placeholder="cv"/>
            <input type="file" "required" id="diplome" name="diplome" placeholder="diplome"/>
            <input type="submit" "required" name="postuler" />
</form>
  </body>
  </html>

