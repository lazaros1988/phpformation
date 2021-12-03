<?php



/**
 * Les formulaires HTML
 
 */
echo $_GET["nom"];
echo $_GET["prenom"];
echo $_GET["message"];







?>

<body>

<form>

<input type="text" id="votre nom" name="nom" placeholder="votre nom"/>
<input type="text" id="prenom" name="prenom" placeholder="votre prenom"/>
<textarea name="message" id="message" rows=5></textarea>
<input type="submit" name="envoyer" />
</form>



</body>




