<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="lightbox.css" text="text/css">
    <link rel="stylesheet" href="galeries.css" text="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="scripts/lightbox.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<div class="slide galeries">
<div class="container text-center">
          <h1>Photography</h1>
<?php
        include("connexion.php");

        $req= $bdd->prepare("SELECT * FROM oeuvres WHERE categorie='Web' ORDER BY id DESC"); // requête avec influence 
        $req->execute(array());
        while($don=$req->fetch()){
            echo "<div class='oeuvres'>";
            echo "<div>".$don['titre']."</div>";
            echo "<div><a href='upload/".$don['image']."' data-lightbox='category-gallery' data-title='titre de l'image'><img src='upload/mini_".$don['image']."' alt='l'image de ".$don['titre']."'></a></div>";
        echo "</div>";
        }
        $req->closeCursor();

?>
<a href="index.php">Retour</a>
</div>
</div>
</body>
</html>