<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:index.php");
    }

    include("../connexion.php");
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
        <h1 class='tmk'>Ajouter une oeuvre</h1>
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
        ?>
        <form action="traitementAjoutoeuvres.php" method="POST" enctype="multipart/form-data" class='text-light'>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="titre" placeholder="Ex: morphing" name="titre"  required>
                    
                </div>
                
                <div class="form-group col-12">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" id="description"></textarea>
                </div>

                <div class="form-group col-12">
                    <label for="catégorie">categorie</label>
                    <select class="form-control" id="categorie"  name="categorie">
                <option value="Illustrator">Illustrator</option>
                <option value="Photoshop">Photoshop</option>
                <option value="Web">web</option>
                <option value="Indesign">Indesign</option>
            </select>
                </div>
                
            
                <div class="form-group">
                    <label for="image">Ajouter image</label>
                    <input type="file" class="form-control-file" id="image" name="couverture" required>
                </div>
               
            </div>
            <button type="submit" class="btn btn-primary mt-5">Ajouter</button>
        </form>
    </div>
</body>

</html>