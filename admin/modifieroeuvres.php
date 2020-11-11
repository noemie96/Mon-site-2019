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

        $req=$bdd->prepare("SELECT * FROM oeuvres WHERE id=?");
        $req->execute([$id]);
        $don=$req->fetch();
    ?>
   
     <h1 class='tmk'>Modification de: <?= $don['titre']; ?></h1>
        <form action="traitementModifoeuvres.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data" class='text-light'>
        <p><label for="cat">Categorie: </label></p>
			<p>
				<select name="categorie" id="cat">
                <?php
                    if($don['categorie']=="Photoshop"){
                        echo '<option value="Photoshop" selected>Photoshop</option>';
                        echo '<option value="Illustrator">Illustrator</option>';
                        echo '<option value="Web">WEB</option>';
                        
                        echo '<option value="Indesign">Indesign</option>';
                    }elseif($don['categorie']=="Illustrator"){
                        echo '<option value="Photoshop" >Photoshop</option>';
                        echo '<option value="Illustrator" selected>Illustrator</option>';
                        echo '<option value="Web">WEB</option>';
                        
                        echo '<option value="Indesign">Indesign</option>';
                     
                    }elseif($don['categorie']=="Web"){
                        echo '<option value="Photoshop" >Photoshop</option>';
                        echo '<option value="Illustrator">Illustrator</option>';
                        echo '<option value="Web" selected>WEB</option>';
                        
                        echo '<option value="Indesign">Indesign</option>';
                    
                        
                    }else{
                        echo '<option value="Photoshop" >Photoshop</option>';
                        echo '<option value="Illustrator">Illustrator</option>';
                        echo '<option value="Web">WEB</option>';
                        echo '<option value="Indesign" selected>Indesign</option>';
                      
                    }

                ?>
					
					
				
				</select>
            <div class="form-row">

                <div class="form-group col-12">
                    <label for="titre">titre</label>
                    <input type="text" class="form-control" id="titre" placeholder="Ex: Morphing" name="titre" value="<?= $don['titre']; ?>"  required>
                </div>
                
                <div class="form-group col-12">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" id="description"><?= $don['description']; ?></textarea>
                </div>
                
            
                <div class="form-group">
                    <label for="image">Ajouter image (facultatif)</label>
                    <input type="file" class="form-control-file" id="image" name="couverture" >
                </div>
               
            </div>
            <button type="submit" class="btn btn-warning mt-5">Modifier</button>
        </form>
    </div>
</body>

</html>