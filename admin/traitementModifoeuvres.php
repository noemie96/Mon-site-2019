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
        }else{
            $description=htmlspecialchars($_POST['description']);
        }

        if($_POST['categorie']==""){
            $err=2;
        }else{
            $categorie=htmlspecialchars($_POST['categorie']);
        }

        if($err==0){
            require "connexion.php";

            /* ajout d'image */
            if(empty($_FILES['couverture']['tmp_name'])){
                $req = $bdd->prepare('UPDATE oeuvres SET titre=:tit, description=:descri, categorie=:cat WHERE id=:myid');
                $req->execute([
                  ":tit"=>$titre,
                  ":descri"=>$description,
                  ":cat"=>$categorie,
                  ":myid"=>$id                           
                ]);
                $req->closeCursor();
                header("LOCATION:index.php?update=success&id=".$_GET['upload']);
            }
            else{
                /* Supprimer l'image dans le dossier avant d'upload la nouvelle image */
                $delimg=$bdd->prepare("SELECT * FROM oeuvres WHERE id=?");
                $delimg->execute([$id]);
                $dondelimg=$delimg->fetch();
                unlink('../upload/'.$dondelimg['image']);
                unlink('../upload/mini_'.$dondelimg['image']);
                $delimg->closeCursor();    
                
                /* upload de l'image */

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
                       
                          $req = $bdd->prepare('UPDATE oeuvres SET titre=:tit, description=:descri, categorie=:cat, image=:img WHERE id=:myid');
                          $req->execute([
                            ":tit"=>$titre,
                            ":descri"=>$description,
                            ":cat"=>$categorie,
                            ":img"=>$fichiercptl,
                            ":myid"=>$id                           
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
                          header("LOCATION:modifieroeuvres.php?upload=echec");
                     }
                }
                else
                {
                     header("LOCATION:modifieroeuvres.php?error=".$erreur);
                }
            }

        }
        else{
            header('LOCATION:modifieroeuvres.php?err='.$err);
        }
    }
    else{
        header('LOCATION:index.php');
    }


?>

