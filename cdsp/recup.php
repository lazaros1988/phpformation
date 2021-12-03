<?php

?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> <img src="/img/logo.png"  ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">A propos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Technique</a></li>
            <li><a class="dropdown-item" href="#">Statistique</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Comptabilité</a></li>
            <li><a class="dropdown-item" href="#">Materiel</a></li>
            <li><a class="dropdown-item" href="#">Secretariat</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Recrutement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Annonces</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link disabled">Administration</a>
        </li>-->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Administration
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="listecandidat.php">Liste des candidats</a></li>
                       
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Recherche</button>
    
      </form>
    </div>
  </div>
</nav>



<?php
if(isset($_POST["nom"]) && isset($_POST["prenom"])  && isset($_POST["telephone"]) && isset($_POST["adresse"]) && isset($_POST["email"])  
&& isset($_POST["motivation"]) && isset($_FILES["cv"]) && isset($_FILES["diplome"]))

{
    
    //Testons si l'extension est autorisée
    $filesInfo= pathinfo($_FILES['cv']['name']);
    $filediplome= pathinfo($_FILES['diplome']['name']);
    
    // recuperer les extensions
    $extensioncv= $filesInfo["extension"];
    $extensiondiplome= $filediplome["extension"];
    // liste des extensions autorisées
    $allowedcvextensions= ["pdf", "doc", "docx"];
    
    if (!in_array($extensioncv, $allowedcvextensions)){
        echo ("Extension non autorisée");
        return;
    }
    
    if (!in_array($extensiondiplome, $allowedcvextensions)) {
        echo ("Extension non autorisée");
        return;
    }
    
    //valider le fichier et le stocker definitivement
    move_uploaded_file($_FILES["cv"] ["tmp_name"], 
    "tmp/" .strip_tags(basename($_FILES["cv"]["name"])));
    
    move_uploaded_file($_FILES["diplome"] ["tmp_name"], 
    "tmp/" .strip_tags(basename($_FILES["diplome"]["name"])));
    try
{
	$db = new PDO(
        'mysql:host=localhost;dbname=cdsp_db;charset=utf8',
        'root',
        ''
    );
}
catch (Exception $e)
{
        die('Impossible de se connecter, erreur : ' . $e->getMessage());
}
 
    
$nom = strip_tags($_POST["nom"]);
$prenom= strip_tags($_POST["prenom"]);
$adresse=strip_tags($_POST["adresse"]);
$telephone=strip_tags($_POST["telephone"]);
$email=strip_tags($_POST["email"]);
$motivation= strip_tags($_POST["motivation"]);
$cv= "tmp/" .basename($_FILES["cv"]["name"]);
$diplome= "tmp/" .strip_tags(basename($_FILES["diplome"]["name"])); 
$querry = 'INSERT INTO utilisateur(nom, prenom, telephone, email, adresse, motivation, cv, diplome) VALUES (:nom, :prenom, :telephone, :email, :adresse, :motivation, :cv, :diplome)';

    $insertrow = $db->prepare($querry);

    $insertrow->execute([
            "nom"=>$nom,
            "prenom" => $prenom, 
            "telephone" => $telephone, 
            "email"=>$email, 
            "adresse"=>$adresse, 
            "motivation"=>$motivation,
            "cv"=>$cv,
            "diplome"=>$diplome,
    ]);

    
}

else{ 
    
 echo "error";
 return;
}



?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CDSP</title>
  </head>
  <body>
 

<form>
        <div class="container">
            <h3>Votre dossier de candidature a été enregistré avec succès</h3>
        <div class="card">
                <div class="card-body">
                <h5 class="card-title"> Récapitulatif </h5>
                <p class="card-text"><b>Nom</b> : <?php echo $_POST["nom"]. " " .$_POST["prenom"]; ?> </p>
                <p class="card-text"><b>Email</b> : <?php echo $_POST["email"]; ?> </p>
                <p class="card-text"><b>Lettre de motivation</b> : <?php echo $_POST["motivation"]; ?> </p>
                <a href="tmp/<?php echo basename($_FILES["cv"]["name"]);?>"> <b>Mon CV</b></a>
        </div>
        </div>

 </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>