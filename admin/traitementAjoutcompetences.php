<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("LOCATION:index.php");
	}
	
	require('../connexion.php');

    if(isset($_POST['titre'])){
        $err=0;
        /* verification du formulaire */
        if($_POST['titre']==""){
            $err=1;
        }
        else{
            $titre=htmlspecialchars($_POST['titre']);
        }

		if($_POST['couleur']==""){
            $err=2;
        }
        else{
            $couleur=htmlspecialchars($_POST['couleur']);
        }
		
        if($_POST['pourcentage']==""){
            $err=3;
        }else{
            $pourcentage=htmlspecialchars($_POST['pourcentage']);
        }

        if($err==0){

            $req = $bdd->prepare('INSERT INTO competence(titre,color,pourcentage) VALUES(:tit,:col,:pour)');
            $req->execute([
            ":tit"=>$titre,
            ":col"=>$couleur,
            ":pour"=>$pourcentage
            ]);
            $req->closeCursor();
          
            header('LOCATION:index.php');
        }
        else{
            header('LOCATION:ajouteroeuvres.php?err='.$err);
        }
    }
    else{
        header('LOCATION:index.php');
    }
?>

