
<?php
    if(isset($_POST['nom'])){
        $err=0;
        if($_POST['nom']==""){
            $err=1;
        }else{
            $name=htmlspecialchars($_POST['nom']);
        }

        if($_POST['prenom']==""){
            $err=2;
        }
        else{
            $prenom=htmlspecialchars($_POST['prenom']);
        }

        if($_POST['email']==""){
            $err=3;
        }else{
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
            {
                $email=$_POST['email'];
            }
            else
            {
                $err=4;
            }
        }

        if($_POST['message']==""){
            $err=5;
        }else{
            $message=htmlspecialchars($_POST['message']);
        }

        if($err==0){
            require "connexion.php";
            $insert=$bdd->prepare("INSERT INTO contact(nom,prenom,email,message) VALUES(:nom,:prenom,:email,:message)");
            $insert->execute([
                ':nom'=>$name,
                ':prenom'=>$prenom,
                ':email'=>$email,
                ':message'=>$message
            ]);
            $insert->closeCursor();
            header('LOCATION:index.php?message=success#contact');
        }
        else{
            header('LOCATION:index.php?message=echec&err='.$err.'#contact');
        }



    }
    else{
        header('LOCATION:index.php');
    }



    
?>