<?php
    session_start();
    include('connexion.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" text="text/css" />
  <script src="scripts/jquery-3.3.1.min.js"></script>
  <script src="scripts/skill.js"></script>
  <script src="scripts/lightbox.min.js"></script>
  <link rel="icon" type="image/png" href="logo/logo_final.png">
    <title>Noémie</title>
    <script>
        window.addEventListener('load',()=>{
            const gAbout = document.querySelector('#gAbout');
            const dAbout = document.querySelector('#dAbout');
            const photo = document.querySelector('#photo');
            const gaTxt = document.querySelector('.gaTxt');
            const daTxt = document.querySelector('.daTxt');
            const moi = document.querySelector('#moi');
            const mydiv = document.querySelector('#div');

            if(document.body.offsetWidth > 1000){

var etat1=0;
gAbout.addEventListener('click',()=>{
    if(etat1==0){
    gAbout.classList.add("openAbout");
    dAbout.classList.add("closeAbout");
    photo.classList.add('opacityPhoto');
    gaTxt.classList.add('atxt');
    setTimeout(() => {
        photo.style.display="none";        
    }, 800);
    etat1=1;
    }
    else{
        gAbout.classList.remove("openAbout");
        dAbout.classList.remove("closeAbout");
        photo.style.display="block";
        gaTxt.classList.remove('atxt');
        setTimeout(() => {
            photo.classList.remove('opacityPhoto');       
        }, 800);
        etat1=0;
    }  
});



var etat2=0;
dAbout.addEventListener('click',()=>{
    $span = $('span');
 
 for (var i = 0; i <= $span.length; i++) {
   (function (i) { 
     setTimeout(function () { 
       $span.eq(i).addClass('active'); 
     }, 200 * i); 
   })(i); 
 }; 
    if(etat2==0){
    dAbout.classList.add("openAbout");
    gAbout.classList.add("closeAbout");
    photo.classList.add('opacityPhoto');
    daTxt.classList.add('atxt');
    setTimeout(() => {
        photo.style.display="none";        
    }, 800);
    etat2=1;
    }
    else{
        dAbout.classList.remove("openAbout");
        gAbout.classList.remove("closeAbout");
        photo.style.display="block";
        daTxt.classList.remove('atxt');
        setTimeout(() => {
            photo.classList.remove('opacityPhoto');       
        }, 800);
        etat2=0;
    }  
});

moi.addEventListener('click',()=>{
    gAbout.classList.remove("openAbout");
        dAbout.classList.remove("closeAbout");
        photo.style.display="block";
        gaTxt.classList.remove('atxt');
        setTimeout(() => {
            photo.classList.remove('opacityPhoto');       
        }, 800);
        etat1=0;
    etat2=1;
    dAbout.classList.add("openAbout");
    gAbout.classList.add("closeAbout");
    photo.classList.add('opacityPhoto');
    daTxt.classList.add('atxt');
    setTimeout(() => {
        photo.style.display="none";        
    }, 800);
});


div.addEventListener('click',()=>{
    dAbout.classList.remove("openAbout");
        gAbout.classList.remove("closeAbout");
        photo.style.display="block";
        daTxt.classList.remove('atxt');
        setTimeout(() => {
            photo.classList.remove('opacityPhoto');       
        }, 800);
        etat2=0;
    
    gAbout.classList.add("openAbout");
    dAbout.classList.add("closeAbout");
    photo.classList.add('opacityPhoto');
    gaTxt.classList.add('atxt');
    setTimeout(() => {
        photo.style.display="none";        
    }, 800);
    etat1=1; 
});

                console.log(document.body.offsetWidth);
            }
           

        });

    $(document).ready(function() {
        var etatmenu=0;

        $('#logo-responsive').click(function(){
                if(etatmenu==0)
                    {
                        $("#nav-responsive").animate({'width':'100%'},900);
                        etatmenu=1;
                    }
                else
                    {
                        $("#nav-responsive").animate({'width':'-0%'},900);
                        etatmenu=0;
                    }
            });

        $('#mymenu ul li a').click(function(){
            $("#nav-responsive").animate({'width':'0%'},900);
            etatmenu=0;
        });
    }); 
    </script>
</head>
<body>
    <div class="container-fluid">

        <div id="nav-responsive">
            <img id="logo-responsive" src="logo/logo_final.png" alt="logo responsive">

            <div id="mymenu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#dAbout">Compétence-About me</a></li>                    
                    <li><a href="#projets">Projets</a></li>
                    <li><a href="#contact">Contact</a></li>
                     <li><a href="https://www.facebook.com/noemie.francois.18"><i class="fab fa-facebook-square fa-2x" id="facebook-responsive"></a></i>
                    <li><a href="https://www.instagram.com/n0n0_fr/?hl=fr"><i class="fab fa-instagram fa-2x" id="instagram-responsive"></a></i></li>
                </ul>
            </div>
        </div>



        <nav>
            <div id="navLogo">
                <div id="logo"></div>
            </div>
            <div id="navigation">
            <a href="#home"><i class="fas fa-home fa-2x" id="maison"></a></i><br/>
            <a href="#dAbout"><i class="fas fa-user fa-2x" id="moi"></a></i><br/>
            <a href="#dAbout"><i class="fas fa-code fa-2x" id="div"></a></i><br/>
            <a href="#projets"><i class="fas fa-image fa-2x" id="picture"></a></i><br/>
            <a href="#contact"><i class="fas fa-envelope fa-2x" id="lettre"></a></i>
            </div>
            <div id="navFooter">
            <a href="https://www.facebook.com/noemie.francois.18"><i class="fab fa-facebook-square fa-2x" id="facebook"></a></i><br/>
            <a href="https://www.instagram.com/n0n0_fr/?hl=fr"><i class="fab fa-instagram fa-2x" id="instagram"></a></i>
            </div>
        </nav>

        <div class="slide row" id="home">
            <div id="container-logo">
                <img id="logoaccueil" src="logo/logo_final.png" class="img-fluid"/>
            </div>
            <!-- <div id="logoaccueil" class="img-fluid"></div> -->
            <div id="container-design" class="col-xs-12 offset-md-7 col-md-5 text-left">
                <div id="titre" class="col-12">Web Designer</div>
                <div id="ligne" class="animligne col-12"></div>
            </div>
            
        </div>

        <div class="row" id="about-mini">
            <div class="slide">
                <div id="hAbout-mini">
                    <h4>About me</h4>
                    <span>Courageuse</span>
                    <span>Consciencieuse</span>
                    <span>Née le 27 septembre 1996</span>
                    <span>Infographiste</span> 
                    <span>web designer</span>
                    <span> souriante</span>
                </div>
            </div>
            <div class="slide">
                <div id="bAbout-mini">
                    <h4>Compétences</h4>
                    <div id="containerSKill">
                        <?php
                            $skills = $bdd->query("SELECT * FROM competence");
                            while($donSkill=$skills->fetch()){
                        ?>

                        <div class="skill">
                            <h5><?= $donSkill['titre']; ?></h5>
                            <div class="skillbar">
                                <p>level</p>
                                <p><?= $donSkill['pourcentage']; ?>%</p>
                                <div class="skill_percentage">
                                    <div class="skill_level"
                                        style="width:<?= $donSkill['pourcentage'];?>%; background: <?= $donSkill['color']; ?>;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                            $skills->closeCursor();
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide row" id="about">
            <img src="images/moiv1.png" id="photo" class="d-none d-lg-block">
            <div id="gAbout">
            <h4 class='abh4'>Compétences</h4>
                <div class="gaTxt" id="comp">
                
                    <div id="containerSKill" class="row">
                        <?php
                            $skills = $bdd->query("SELECT * FROM competence");
                            while($donSkill=$skills->fetch()){
                        ?>

                        <?php if($donSkill['id']%2==1){ ?>
                        <div id="gSkill" class="col-lg-6">
                            <div class="skill">
                                <h5><?= $donSkill['titre']; ?></h5>
                                <div class="skillbar">
                                    <p>level</p>
                                    <p><?= $donSkill['pourcentage']; ?>%</p>
                                    <div class="skill_percentage">
                                        <div class="skill_level"
                                            style="width:<?= $donSkill['pourcentage'];?>%; background: <?= $donSkill['color']; ?>;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>

                        <?php if($donSkill['id']%2==0){ ?>
                        <div id="dSkill" class="col-lg-6">
                            <div class="skill">
                                <h5><?= $donSkill['titre']; ?></h5>
                                <div class="skillbar">
                                    <p>level</p>
                                    <p><?= $donSkill['pourcentage']; ?>%</p>
                                    <div class="skill_percentage">
                                        <div class="skill_level"
                                            style="width:<?= $donSkill['pourcentage'];?>%; background: <?= $donSkill['color']; ?>;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <?php
                            }
                            $skills->closeCursor();
                        ?>
                    </div>
                </div>
            </div>
            <div id="dAbout">
            <h4 class='dah4'>About me</h4>
                <div class="daTxt">
                 
                    <span>Courageuse</span>
                    <span>Consciencieuse</span>
                    <span>Née le 27 septembre 1996</span>
                    <span>Infographiste</span> 
                    <span>web designer</span>
                    <span> souriante</span>
                </div>
            </div>
        </div>
        <div class="slide row" id="projets" class="gallery">
            <a href="galleryillu.php" class="projet" id="illu" >
                <h2>Illustrator</h2>
            </a>
            <a href="galleryphotoshop.php" class="projet" id="photoshop">
                <h2>Photoshop</h2>
            </a>
            <a href="galleryweb.php" class="projet" id="Web">
                <h2>Web</h2>
            </a>
            <a href="galleryanimation.php" class="projet" id="animation">
                <h2>Animation</h2>
            </a>
            <a href="galleryindesign.php" class="projet" id="indesign">
                <h2>Indesign</h2>
            </a>
        </div>
        <div class="slide row" id="contact">
            <div id="contg">
                <?php
                    if(isset($_GET['message'])){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Vous avez bien ajouté un élément à la base de données
                        </div>';
                    }
                    else{
                ?>
                    <h1>Contact</h1>
                    <form action="traitement.php" method="POST">
                    <p><label for="nom">Nom: </label><input type="text" id="nom" name="nom" placeholder="François"></p>
                    <p><label for="prenom">Prénom: </label><input type="text" id="prenom" name="prenom" placeholder="Noémie"></p>
                    <p><label for="email">Email: </label><input type="email" id="email" name="email" placeholder="nono@saurus.com"></p>           
                    <p><label for="mess">Message:</label></p>
                    <p><textarea name="message" id="mess"></textarea></p>
                    <p><input type="submit" value="Envoyer"></p>
                    </form>
                <?php        
                    }
                ?>
            </div>
            <div id="contd"></div>
        </div>
    </div>
</body>
</html>