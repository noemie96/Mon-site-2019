<?php
       session_start();
       if(!isset($_SESSION['login'])){
           header("LOCATION:index.php");
       }
    if(isset($_GET['id'])){
        if(is_numeric($_GET['id'])){
            $id=htmlspecialchars($_GET['id']);
        }
        else{
            header("LOCATION:404.php");
        }
    }
    else{
        header("LOCATION:404.php");
    }

    require "connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
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
       
        <?php
        if(isset($_GET['err'])){
            echo '<div class="alert alert-danger" role="alert">
            Veuillez remplir correctement le formulaire.
          </div>';
        }

        if(isset($_GET['error'])){
            echo '<div class="alert alert-danger" role="alert">
            Veuillez verifier votre fichier!
          </div>';
        }

        if(isset($_GET['upload'])){
            echo '<div class="alert alert-warning" role="alert">
             Un problème est survenu lors de l\'upload de votre fichier, désolé
          </div>';
        }
    
       $req=$bdd->prepare("SELECT * FROM animation WHERE id=?");
       $req->execute([$id]); 
       $don=$req->fetch();
    ?>
        <form method="POST" action="traitementmodifanim.php?id=<?= $don['id']; ?>" enctype="multipart/form-data">				
                <h1 class='tmk'>Modification de: <?= $don['titre']; ?></h1>
        <form action="traitementmodifanim.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data" class='text-light'>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="titre">titre</label>
                    <input type="text" class="form-control" id="titre" placeholder="Ex: la valise" name="titre" value="<?= $don['titre']; ?>"  required>
                    
                </div>
                <div class="form-group col-12">
                    <label for="pitch">Pitch</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pitch" id="pitch"><?= $don['pitch']; ?></textarea>
                 </div>
                
                <div class="form-group col-12">
        <label for="pourcentage">Lien</label>
        <input type="text" class="form-control" id="lien" placeholder="lien" name="lien" value="<?= $don['lien']; ?>">
         </div>
                
            
                </div>
            <button type="submit" class="btn btn-warning mt-5">Modifier</button>
        </form>
</body>
</html>