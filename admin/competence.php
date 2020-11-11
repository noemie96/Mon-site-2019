<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:index.php");
    }

?>

<!DOCTYPE html>
<html>
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
        <h1 class='tmk'>Ajouter une competence</h1>
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
		<form action="traitementcompetence.php" method="POST" enctype="multipart/form-data" class='text-light'>
		<div class="form-row">
			<label for="trt">Titre de la compétence: </label><input type="text" value="" name="titre" id="trt"/><br/>
			<select name="pourcentage" id="cat">
					<option value="10">10%</option>
					<option value="20%">20%</option>
					<option value="30">30%</option>
					<option value="40">40%</option>
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>
				</select>
			<br/>
	</div>
	<div class="form-group">
			<p><label for="descri">Description: </label></p>
			<p><textarea name="description" id="descri" cols="30" rows="10"></textarea></p>
		</div>
		<button type="submit" class="btn btn-primary mt-5">Ajouter</button>
		</form>
	</body>
</html>