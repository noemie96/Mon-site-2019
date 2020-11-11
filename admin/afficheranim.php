<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:index.php");
    }

    if(!isset($_GET['id'])){
        header("LOCATION:index.php");
    }
    else{
        if(is_numeric($_GET['id'])){
            require "../connexion.php";
            $id=$_GET['id'];
        }
        else{
            header("LOCATION:index.php"); 
        }
    }

    $req=$bdd->prepare("SELECT * FROM animation WHERE id=?");
    $req->execute([$id]);
    $don=$req->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title></title> Admin</title>
</head>

<body>

    <div class="container">
    <form method="POST" action="traitementanim.php" enctype="multipart/form-data">
			<label for="trt">Titre de l'oeuvre: </label><input type="text" value="" name="titre" id="trt"/><br/>
         <div class="row justify-content-center pt-5">
            <img src="../logo/logo_final.png" class="img-responsive" />
        </div>
        <div class="row">
            <h2 class='tmk col-12'>Pitch</h2>
            <p class="col-12"><?= nl2br($don['pitch']); ?></p>
        </div>
        <div class="row">
            <h2 class='tmk col-12'>Url/h2>
            <p class="col-12"><?= nl2br($don['lien']); ?></p>
        </div>
        <h2 class='tmk col-12'>type</h2>
            <p class="col-12"><?= nl2br($don['type']); ?></p>
        </div>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </div>
</body>

</html>