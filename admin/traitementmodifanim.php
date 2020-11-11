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
            $update=$bdd->prepare("UPDATE animation SET titre=:titre, pitch=:pit, lien=:link WHERE id=:myid");
            $update->execute([
                ":titre"=>$titre,
                ":pit"=>$pitch,
				":link"=>$lien,
                ":myid"=>$id
            ]);
            $update->closeCursor();
            header("LOCATION:index.php?update=success&id=".$id);
	}
	else
	{
		header("LOCATION:modifieranim.php?id=".$id."&error=".$err);		
	}

	
}
else
{
	
	header("LOCATION:index.php");
}

?>
