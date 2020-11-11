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

    if(isset($_GET['del'])){
        
        $req=$bdd->prepare("DELETE FROM contact WHERE id=?");
        $req->execute([$id]);
        $req->closeCursor();
        header("LOCATION:index.php?delete=success");
    }

    $req=$bdd->prepare("SELECT nom as nnom, prenom as nprenom, email as nmail, message as nmessage FROM contact WHERE id=?");
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
    <title>MK11 - Admin</title>
</head>

<body>

    <div class="container">
         <div class="row justify-content-center pt-5">
            <img src="../logo/logo_final.png" class="img-responsive" />
        </div>
        <h1>Contact</h1>
        <div class="row">
            <div class="col-12"><strong>Nom: </strong><?= $don['nnom'] ?></div>
            <div class="col-12"><strong>Prénom: </strong><?= $don['nprenom'] ?></div>
            <div class="col-12"><strong>E-mail: </strong><a href='mailto:<?= $don['nmail'] ?>'><?= $don['nmail'] ?></a></div>
            <div class="col-12"><strong>Message: </strong></div>
            <div class="col-12"><?= nl2br($don['nmessage']) ?></div>
            
        </div>
        <h1>Voulez vous supprimer cette entrée?</h1>
        <a href="supprimerContact.php?del=ok&id=<?= $id;?>" class="btn btn-danger">Oui</a>
        <a href="index.php" class="btn btn-secondary">Non</a>
    </div>
</body>

</html>