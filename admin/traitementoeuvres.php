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

	if($_POST['description']==""){
		$err=2;
	}
	else{
		$description=htmlspecialchars($_POST['description']);
	}

	if($_POST['categorie']==""){
		$err=3;
	}
	else{
		$categorie=htmlspecialchars($_POST['categorie']);
	}


	if($err==0)
	{
			$dossier = '../upload/';
			$fichier = basename($_FILES['affiche']['name']);
			$taille_maxi = 20000000;
			$taille = filesize($_FILES['affiche']['tmp_name']);
			$extensions = ['.png', '.gif', '.jpg', '.jpeg'];
			$extension = strrchr($_FILES['affiche']['name'], '.'); 


			if(!in_array($extension, $extensions)) // on test si l'extension du fichier uploadé correspond aux extensions autorisées
			{
				$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
			}

			if($taille>$taille_maxi)		// on teste la taille de notre fichier 
			{
				$erreur = 'Le fichier dépasse la taille autorisée';
			}

			if(!isset($erreur)) // Si tous les tests sont OK on passe à l'étape de l'upload sur notre serveur
			{
				//On formate le nom du fichier, strtr remplace tous les KK spéciaux en normaux suivant notre liste 
				$fichier = strtr($fichier, 
					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier); // preg_replace remplace tout ce qui n'est pas un KK normal en tiret 
				$fichiercplt= rand().$fichier;
				if(move_uploaded_file($_FILES['affiche']['tmp_name'], $dossier . $fichiercplt)) // la fonction renvoie True si l'upload a été réalisé 
				{
					require "connexion.php";
					$insert=$bdd->prepare("INSERT INTO oeuvres(titre,description,image,categorie) VALUES(:titre,:descri,:img,:cat)");
					$insert->execute([
						":titre"=>$titre,
						":descri"=>$description,
						":img"=>$fichiercplt,
						":cat"=>$categorie
					]);
					$insert->closeCursor();
					// ajouter redim attention lien upload dehors du dossier admin!
					if($extension==".png"){
						header("LOCATION:redimpng.php?image=".$fichiercplt);
					}
					else{
						header("LOCATION:redim.php?image=".$fichiercplt);
					}

				
				}
				else //Sinon (la fonction renvoie FALSE).
				{
					header("LOCATION:index.php?upload=echec");
				}

			}
			else
			{
				header("LOCATION:afficheroeuvres.php?error=".$erreur);
			}

	}
	else
	{
		header("LOCATION:afficheroeuvres.php?error=".$err);		
	}

	
}
else
{
	
	header("LOCATION:index.php");
}

?>