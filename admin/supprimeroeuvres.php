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
        
        $req=$bdd->prepare("SELECT * FROM oeuvres WHERE id=?");
        $req->execute([$id]);
        $don=$req->fetch();

        unlink('../upload/'.$don['image']);
        unlink('../upload/mini_'.$don['image']);
        $req->closeCursor();

        $req=$bdd->prepare("DELETE FROM oeuvres WHERE id=?");
        $req->execute([$id]);
        $req->closeCursor();
        header("LOCATION:index.php?delete=success");
    }


    $req=$bdd->prepare("SELECT * FROM oeuvres WHERE id=?");
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
    <title>Admin</title>
</head>

<body>

    <div class="container">
         <div class="row justify-content-center pt-5">
            <img src="../logo/logo_final.png" class="img-responsive" />
        </div>
        <div class="row">
            <h1 class='tmk col-12 mt-5 text-center'><?= $don['titre'] ?></h1>
            <div class="col-8 offset-2 text-center">
                    <img src="../upload/mini_<?= $don['image']; ?>" alt="image de <?= $don['titre']; ?>" class="img-fluid">
            </div>
            <h2 class='tmk col-12'>Description</h2>
            <p class="col-12"><?= nl2br($don['description']); ?></p>
        </div>
        <h1>Voulez vous supprimer cette entrée?</h1>
        <a href="supprimeroeuvres.php?del=ok&id=<?= $id;?>" class="btn btn-danger">Oui</a>
        <a href="index.php" class="btn btn-secondary">Non</a>
    </div>
</body>

</html>