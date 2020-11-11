
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

if(isset($_POST['titre']))
{
	$err=0;
	if($_POST['titre']==""){
		$err=1;
	}else{
		$titre=htmlspecialchars($_POST['titre']);
	}

	if($_POST['pourcentage']==""){
		$err=2;
	}
	else{
		$pourcentage=htmlspecialchars($_POST['pourcentage']);
	}
	if($_POST['couleur']==""){
		$err=3;
	}
	else{
		$couleur=htmlspecialchars($_POST['couleur']);
	}


	if($err==0)
	{
			
            require "connexion.php";
            $update=$bdd->prepare("UPDATE competence SET titre=:titre, pourcentage=:pourc, color=:col WHERE id=:myid");
            $update->execute([
                ":titre"=>$titre,
                ":pourc"=>$pourcentage,
				":col"=>$couleur,
                ":myid"=>$id
            ]);
            $update->closeCursor();
            header("LOCATION:index.php?update=success&id=".$id);
	}
	else
	{
		header("LOCATION:modifiercompetence.php?id=".$id."&error=".$err);		
	}

	
}
else
{
	
	header("LOCATION:index.php");
}

?>
