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
            <img src="../images/logo.png" class="img-responsive" />
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
    
       $req=$bdd->prepare("SELECT * FROM competence WHERE id=?");
       $req->execute([$id]); 
       $don=$req->fetch();
    ?>
        <form method="POST" action="traitementmodifcompetence.php?id=<?= $don['id']; ?>" enctype="multipart/form-data">
        <p><label for="pourc">Pourcentage: </label></p>
			<p>
				<select name="pourcentage" id="cat">
                <?php
                    if($don['pourcentage']=="10"){
                        echo '<option value="10" selected>10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';

                    }elseif($don['pourcentage']=="20"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20" selected>20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';

                    }elseif($don['pourcentage']=="30"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30" selected>30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';

                    }elseif($don['pourcentage']=="40"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40" selected>40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';
                    
                    }elseif($don['pourcentage']=="50"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50" selected>50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';
   
                    }elseif($don['pourcentage']=="60"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60" selected>60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';

                    }elseif($don['pourcentage']=="70"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70" selected>70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';

                    }elseif($don['pourcentage']=="80"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80" selected>80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100">100%</option>';

                    }elseif($don['pourcentage']=="90"){
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90" selected>90%</option>';
                        echo '<option value="100">100%</option>'; 
                        
                    }else{
                        echo '<option value="10" >10%</option>';
                        echo '<option value="20">20%</option>';
                        echo '<option value="30">30%</option>';
                        echo '<option value="40">40%</option>';
                        echo '<option value="50">50%</option>';
                        echo '<option value="60">60%</option>';
                        echo '<option value="70">70%</option>';
                        echo '<option value="80">80%</option>';
                        echo '<option value="90">90%</option>';
                        echo '<option value="100" selected>100%</option>';
                    }

                ?>
					
					
				
				</select>
                <h1 class='tmk'>Modification de: <?= $don['titre']; ?></h1>
        <form action="traitementModifcompetence.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data" class='text-light'>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="titre">titre</label>
                    <input type="text" class="form-control" id="titre" placeholder="Ex: Morphing" name="titre" value="<?= $don['titre']; ?>"  required>
                    
                </div>
                
                <div class="form-group col-12">
                    <label for="couleur">Couleur</label>
                    <input type="text" class="form-control" id="exampleFormControlTextarea1" name="couleur" id="couleur" value="<?= $don['color']; ?>">
                </div>
                
            
                </div>
            <button type="submit" class="btn btn-warning mt-5">Modifier</button>
        </form>
</body>
</html>