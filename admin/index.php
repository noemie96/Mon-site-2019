<?php
    session_start();
    require "../connexion.php";
    $formerror="";
    /* partie de connexion  */
    if(isset($_POST['login'])){
        if(!empty($_POST['login']) OR !empty($_POST['mdp'])){
            $login=htmlspecialchars(ucfirst($_POST['login']));
            $mdp=htmlspecialchars($_POST['mdp']);
            $reqlog=$bdd->prepare("SELECT * FROM admin WHERE login=?");
            $reqlog->execute(array($login));
            if($donlog=$reqlog->fetch()){
                if(password_verify($mdp,$donlog['mdp'])){
                    $_SESSION['login']=$donlog['login'];
                    header("LOCATION:index.php");
                }
                else{
                    $formerror=' <div class="alert alert-danger text-center mt-3" role="alert">Login ou Mot de passe incorrect</div>';
                }
            }
            else{
                $formerror=' <div class="alert alert-danger text-center mt-3" role="alert">Login ou Mot de passe incorrect</div>';
            }
            $reqlog->closeCursor();
        }
        else{
            $formerror=' <div class="alert alert-danger text-center mt-3" role="alert">Veuillez remplir correctement le formulaire</div>';
        }
    }

    /* 
        les messages du formulaire de connexion 

         $formerror=' <div class="alert alert-danger text-center mt-3" role="alert">Login ou Mot de passe incorrect</div>';
         $formerror=' <div class="alert alert-danger text-center mt-3" role="alert">Veuillez remplir correctement le formulaire</div>';

        le nom de la session : $_SESSION['login']

    */


    /* déconnexion  */
    if(isset($_GET['deco'])){
        session_destroy();
        header("LOCATION:index.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>MK11 - Admin</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5">
            <img src="../logo/logo_final.png" class="img-responsive" />
        </div>
    
    <?php
    
        if(isset($_SESSION['login'])){
            echo "<h1 class='tmk'>Administration</h1>";
            echo "<a href='index.php?deco=ok' class='btn btn-warning'>Déconnexion</a>";
            echo "<a href='../index.php' target='blank' class='mx-2 btn btn-secondary'>Retourner vers le site</a>";
            /* Alert */
            if(isset($_GET['add'])){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Vous avez bien ajouté un élément à la base de données
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            if(isset($_GET['update'])){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Vous avez bien modifié l\'élément à la base de données avec l\'ID : '.$_GET['id'].'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'; 
            }
            if(isset($_GET['delete'])){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Vous avez bien supprimé l\'élément de la base de données
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }

            echo "<h2 class='tmk mt-5'>Oeuvres</h2><a href='ajouteroeuvres.php' class='btn btn-primary'>Ajouter</a>";
            echo "<table class='table col-sm-10 offset-sm-1 text-light mt-5'>";
                echo "<thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>oeuvres</th>
                    <th scope='col'>catégorie</th>
                    <th scope='col'>Action</th>
                </tr>
                </thead>";
                echo "<tbody>";
                    $reqoeuvres=$bdd->query("SELECT * FROM oeuvres");
                    while($donoeuvres=$reqoeuvres->fetch()){
                        echo "<tr scope='row'>";
                            echo "<td>".$donoeuvres['id']."</td>";
                            echo "<td><a href='afficheroeuvres.php?id=".$donoeuvres['id']."'>".$donoeuvres['titre']."</a></td>";
                            echo "<td><a href='afficheroeuvres.php?id=".$donoeuvres['id']."'>".$donoeuvres['categorie']."</a></td>";
                            echo "<td><a href='modifieroeuvres.php?id=".$donoeuvres['id']."' class='btn btn-warning'>Modifier</a> <a href='supprimeroeuvres.php?id=".$donoeuvres['id']."' class='btn btn-danger'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    $reqoeuvres->closeCursor();
                echo "</tbody>";
            echo "</table>";

            echo "<h2 class='tmk mt-5'>Animation</h2><a href='ajouteranim.php' class='btn btn-primary'>Ajouter</a>";
            echo "<table class='table col-sm-10 offset-sm-1 text-light mt-5'>";
                echo "<thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>animaiton</th>
                    <th scope='col'>url</th>
                    <th scope='col'>Action</th>
                </tr>
                </thead>";
                echo "<tbody>";
                    $reqanimation=$bdd->query("SELECT * FROM animation");
                    while($donanimation=$reqanimation->fetch()){
                        echo "<tr scope='row'>";
                            echo "<td>".$donanimation['id']."</td>";
                            echo "<td><a href='afficheranim.php?id=".$donanimation['id']."'>".$donanimation['titre']."</a></td>";
                            echo "<td><a href='afficheranim.php?id=".$donanimation['id']."'>".$donanimation['pitch']."</a></td>";
                            echo "<td><a href='afficheranim.php?id=".$donanimation['id']."'>".$donanimation['lien']."</a></td>";
                            echo "<td><a href='modifieranim.php?id=".$donanimation['id']."' class='btn btn-warning'>Modifier</a> <a href='supprimeranim.php?id=".$donanimation['id']."' class='btn btn-danger'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    $reqanimation->closeCursor();
                echo "</tbody>";
            echo "</table>";

            echo "<h2 class='tmk mt-5'>Compétences</h2><a href='ajoutercompetences.php' class='btn btn-primary'>Ajouter</a>";
            echo "<table class='table col-sm-10 offset-sm-1 text-light mt-5'>";
                echo "<thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>compétences</th>
                    <th scope='col'>pourcentages</th>
                    <th scope='col'>Action</th>
                </tr>
                </thead>";
                echo "<tbody>";
                    $reqcompetence=$bdd->query("SELECT * FROM competence");
                    while($doncompetence=$reqcompetence->fetch()){
                        echo "<tr scope='row'>";
                            echo "<td>".$doncompetence['id']."</td>";
                            echo "<td><a href='affichercompetence.php?id=".$doncompetence['id']."'>".$doncompetence['titre']."</a></td>";
                            echo "<td><a href='affichercompetence.php?id=".$doncompetence['id']."'>".$doncompetence['pourcentage']."</a></td>";
                            echo "<td><a href='modifiercompetence.php?id=".$doncompetence['id']."' class='btn btn-warning'>Modifier</a> <a href='supprimercompetence.php?id=".$doncompetence['id']."' class='btn btn-danger'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    $reqcompetence->closeCursor();
                echo "</tbody>";
            echo "</table>";

            echo "<h2 class='tmk mt-5'>Contacts</h2>";
            echo "<table class='table col-sm-10 offset-sm-1 text-light mt-5'>";
                echo "<thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>nom</th>
                    <th scope='col'>prénom</th>
                    <th scope='col'>message</th>
                    <th scope='col'>Action</th>
                </tr>
                </thead>";
                echo "<tbody>";
                    $reqContact=$bdd->query("SELECT * FROM contact");
                    while($donContact=$reqContact->fetch()){
                        echo "<tr scope='row'>";
                            echo "<td>".$donContact['id']."</td>";
                            echo "<td><a href='afficherContact.php?id=".$donContact['id']."'>".$donContact['nom']."</a></td>";
                            echo "<td><a href='afficherContact.php?id=".$donContact['id']."'>".$donContact['prenom']."</a></td>";
                            echo "<td><a href='afficherContact.php?id=".$donContact['id']."'>".$donContact['message']."</a></td>";
                            echo "<td>".$donContact['email']."</td>";
                            echo "<td><a href='supprimerContact.php?id=".$donContact['id']."' class='btn btn-danger'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    $reqContact->closeCursor();
                echo "</tbody>";
                
            echo "</table>";


        }
        else{
            echo ' <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                    <div class="row justify-content-center"><h1 class="tmk">Administration</h1></div>
                        <form method="POST" action="index.php">
                            <div class="form-group row">
                                <label for="log" class="col-sm-4 col-form-label">Login</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="log" name="login" placeholder="Votre login">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="pass" name="mdp" placeholder="Password">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Connexion</button>
                            </div>
                        </form>
                        '.$formerror.'
                    </div>
            </div>';
        }

    
    ?>


    </div>    
</body>
</html>