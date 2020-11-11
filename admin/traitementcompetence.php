
<?php
   	session_start();
	if(!isset($_SESSION['login'])){
		header("LOCATION:index.php");
	}

	if(isset($_POST['titre'])){
		$err=0;
		if($_POST['titre']==""){
			$err=1;
		}else{
			$titre=htmlspecialchars($_POST['titre']);
		}
		
		if($_POST['pourcentage']==""){
			$err=3;
		}
		else{
			$pourcentage=htmlspecialchars($_POST['pourcentage']);
		}
		
		if($_POST['color']==""){
			$err=2;
		}
		else{
			$color=htmlspecialchars($_POST['color']);
		}
	
		if($err==0){
		
			require "connexion.php";
			$insert=$bdd->prepare("INSERT INTO competence(titre,pourcentage,color) VALUES(:titre,:pourc,:colo)");
			$insert->execute([
				":titre"=>$titre,
				":pourc"=>$pourcentage,
				":colo"=>$color,
				
			]);
			$insert->closeCursor();
		}

		//Sinon (la fonction renvoie FALSE).
		else{ 
			header("LOCATION:index.php?upload=echec");
		}
	}

	else
	{
		header("LOCATION:competence.php?error=".$err);		
	}	

// else
// {
	
// 	header("LOCATION:index.php");
// }

?>
