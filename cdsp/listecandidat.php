<?php

?>
<?php

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
 
$empstsmt = $db->prepare('SELECT * FROM utilisateur');
$empstsmt->execute();
$candidat = $empstsmt->fetchAll();

    
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
            <li><a class="dropdown-item" href="#">Liste des candidats</a></li>
                       
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

<form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Adresse</th>
      <th scope="col">Motivation</th>
      <th scope="col">Cv</th>
      <th scope="col">Diplome</th>
      

    </tr>
  </thead>
  <tbody>
        <?php
foreach ($candidat as $candidat){
    ?>

<tr>

      <th scope="row">1</th>
      <td><?php echo $candidat["id"]; ?></td>
      <td><?php echo $candidat["nom"]; ?></td>
      <td><?php echo $candidat["prenom"]; ?></td>
      <td><?php echo $candidat["telephone"]; ?></td>
      <td><?php echo $candidat["email"]; ?></td>
      <td><?php echo $candidat["adresse"]; ?></td>
      <td><?php echo $candidat["motivation"]; ?></td>
      <td><?php echo $candidat["cv"]; ?></td>
      <td><?php echo $candidat["diplome"]; ?></td>      
    </tr>

<?php
}
?>
    
    
  </tbody>
</table>
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