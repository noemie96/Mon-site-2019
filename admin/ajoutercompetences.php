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
        <form action="traitementAjoutcompetences.php" method="POST" enctype="multipart/form-data" class='text-light'>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="title">Titre</label>
                    <select class="form-control" id="title" name="titre">
                        <option value="Illustrator">Illustrator</option>
                        <option value="Photoshop">Photoshop</option>
                        <option value="Web">web</option>
                        <option value="Animation">Animation</option>
                        <option value="Indesign">Indesign</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="color">Couleur</label>
                    <input type="text" class="form-control" id="color" name="couleur"></textarea>
                </div>

                <div class="form-group col-12">
                    <label for="percent">Pourcentage</label>
                    <input type="number" class="form-control" id="percent" name="pourcentage" min="1" max="100" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-5">Ajouter</button>
        </form>
    </div>
</body>

</html>