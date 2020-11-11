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

		if($_POST['pitch']==""){
            $err=2;
        }
        else{
            $pitch=htmlspecialchars($_POST['pitch']);
        }
		
		if($_POST['lien']==""){
            $err=2;
        }
        else{
            $lien=htmlspecialchars($_POST['lien']);
		}
		if($_POST['type']==""){
            $err=2;
        }
        else{
            $type=htmlspecialchars($_POST['type']);
        }
    if($err==0){
					  $req = $bdd->prepare('INSERT INTO animation(titre,pitch,lien,type) VALUES(:tit,:pitch,:link,:type)');
					  $req->execute([
                        ":tit"=>$titre,
						":pitch"=>$pitch,
						":link"=>$lien,
						":type"=>$type                      
					  ]);
					  $req->closeCursor();

					  header('LOCATION:index.php');
					}
					else{
						header('LOCATION:ajouteranim.php?err='.$err);
					}
				}
				else{
					header('LOCATION:index.php');
				}
			?>
			