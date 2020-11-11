<?php
   session_start();
   if(!isset($_SESSION['login'])){
	   header("LOCATION:index.php");
   }
if(isset($_POST['titre']))
{
	$err=0;
	if($_POST['titre']==""){
		$err=1;
	}else{
		$titre=htmlspecialchars($_POST['titre']);
	}

	if($_POST['pitch']==""){
		$err=2;
	}
	else{
		$pitch=htmlspecialchars($_POST['pitch']);
	}

	if($_POST['lien']==""){
		$err=3;
	}
	else{
		$lien=htmlspecialchars($_POST['lien']);
	}


	if($err==0)
	{				
		require "connexion.php";
		$insert=$bdd->prepare("INSERT INTO animation(titre,pitch,lien) VALUES(:titre,:pitch,:link)");
		$insert->execute([
			":titre"=>$titre,
			":pitch"=>$pitch,
			":link"=>$lien
		]);
		$insert->closeCursor();			
	}
		//Sinon (la fonction renvoie FALSE).
	else
	{ 
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