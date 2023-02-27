<?php 

require_once 'assets/lib/DbConnect.php'; 
require_once 'assets/lib/User.php';
$db = new DbConnect();
$user = new User($db);

?>

<!-- header -->
<header class="bg-grey">

    <nav class="close" id="nav">

        <!-- Burger menu -->
        <burgerButton class="open" onclick="burgerSwitch(this.parentNode);">
        </burgerButton>

        <!-- tester si l'utilisateur est connecté -->
        <?php
        if (isset($_GET['deconnexion'])){
            if($_GET['deconnexion']==true){
                $user->disconnect();
                header('Location: index.php');
            }
        }
        else if ($user->isConnected()) {
            
            ?>

            <!-- afficher les liens menus correspondants à la session -->
            <ul class="nav nav-pills nav-fill">

                <!-- afficher le login de l'utilisateur -->
                <li class="nav-item pt-2"><mark><?php $login = $user->getLogin(); ?></mark></li>

                <li id="accueil" class="nav-item"><a class="nav-link text-dark bg-secondary" href="index.php">ACCUEIL</a></li>

                <li id="profil" class="nav-item"><a class="nav-link text-dark bg-secondary" href="profil.php"></i>PROFIL</a></li> 

                <li id="game" class="nav-item"><a class="nav-link text-dark bg-secondary" href="game.php">JOUER</a></li>

                <li id="deconnexion" class="nav-item"><a class="nav-link text-dark bg-secondary" href="index.php?deconnexion=true">DECONNEXION</a></li>

                <li id="contact" class="nav-item"><a class="nav-link text-dark bg-secondary" href="mailto:nadia.hazem@laplateforme.io">CONTACT</a></li>
            </ul>
        

            <?php
        } else { 

            ?>

            <!-- afficher les liens menus correspondants à l'absence de session -->
            <ul class="nav nav-pills nav-fill">

                <li id="accueil" class="nav-item"><a class="nav-link text-dark" href="index.php">ACCUEIL</a></li>

                <li id="connexion" class="nav-item"><a class="nav-link text-dark" id="loginBtn" href="/clicker/forms.php?choice=login">CONNEXION</button></a></li>
                
                <li id="inscription" class="nav-item"><a class="nav-link text-dark" id="registerBtn" href="/clicker/forms.php?choice=register">INSCRIPTION</a></li>

                <li id="contact" class="nav-item"><a class="nav-link text-dark" href="mailto:nadia.hazem@laplateforme.io">CONTACT</a></li>
            </ul>

            <?php
        }

        ?>

    </nav>
    

</header>

