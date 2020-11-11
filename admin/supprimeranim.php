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
        
        $req=$bdd->prepare("DELETE FROM animation WHERE id=?");
        $req->execute([$id]);
        $req->closeCursor();
        header("LOCATION:index.php?delete=success");
    }


    $req=$bdd->prepare("SELECT * FROM animation WHERE id=?");
    $req->execute([$id]);
    $don=$req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.1.3/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../script/jquery-3.3.1.min"></script>
    <script type="text/javascript" src="../bootstrap-4.1.3/dist/js/bootstrap.min"></script>
    <title>Supprimer un projet web</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="col-12"><?= $don['titre']; ?></h1>
            <h2 class="col-12"><?= $don['lien']; ?></h2>
        </div>
        <h1>Voulez vous supprimer cette entrée?</h1>
        <a href="supprimeranim.php?del=ok&id=<?= $id;?>" class="btn btn-danger">Oui</a>
        <a href="index.php" class="btn btn-secondary">Non</a>
    </div>
    <?php
        $req->closeCursor();
    ?>
</body>
</html>