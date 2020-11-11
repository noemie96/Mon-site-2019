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

		if($_POST['description']==""){
            $err=2;
        }
        else{
            $description=htmlspecialchars($_POST['description']);
        }
		
        if($_POST['categorie']==""){
            $err=3;
        }else{
            $categorie=htmlspecialchars($_POST['categorie']);
        }

        if($err==0){
            /* ajout d'image */
            $dossier = '../upload/';
			$fichier = basename($_FILES['couverture']['name']);
			$taille_maxi = 2000000; // 2Mo
			$taille = filesize($_FILES['couverture']['tmp_name']);
			$extensions = array('.png','.jpg','.jpeg');
			$extension = strrchr($_FILES['couverture']['name'], '.'); 
			
			
			
			if(!in_array($extension, $extensions)) 
			{
				 $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg';
				 $_SESSION['extension_error']=$extension;
			}
			if($taille>$taille_maxi)		
			{
				 $erreur = 'Le fichier dépasse la taille autorisée';
			}
			
			if(!isset($erreur)) 
			{
				
				 $fichier = strtr($fichier, 
					  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
					  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier); 
				 $fichiercptl=rand().$fichier;
				 if(move_uploaded_file($_FILES['couverture']['tmp_name'], $dossier . $fichiercptl)) 
				 {
					  $req = $bdd->prepare('INSERT INTO oeuvres(titre,description,categorie,image) VALUES(:tit,:descri,:cat,:img)');
					  $req->execute([
                        ":tit"=>$titre,
						":descri"=>$description,
						":cat"=>$categorie,
                        ":img"=>$fichiercptl
                       
					  ]);
					  $req->closeCursor();
							
						if($extension==".png")
						{
							header("LOCATION:redimpng.php?image=".$fichiercptl);
						}
						else
						{
							header("LOCATION:redim.php?image=".$fichiercptl);
						}
						
				 }
				 else 
				 {
					  header("LOCATION:ajouteroeuvres.php?upload=echec");
				 }
			}
			else
			{
				 header("LOCATION:ajouteroeuvres.php?error=".$erreur);
            }
            
        }
        else{
            header('LOCATION:ajouteroeuvres.php?err='.$err);
        }
    }
    else{
        header('LOCATION:index.php');
    }
?>

