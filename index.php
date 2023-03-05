<?php 
session_start();
?>
<?php 
require_once 'assets/lib/DbConnect.php'; 
require_once 'assets/lib/User.php';
$db = new DbConnect();
$user = new User($db);
?>

<!--  Path: index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a05ac89949.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/clicker2/assets/img/favicon.png"/>    
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    
    <!-- JS -->
    <script src="/clicker2/assets/js/menu.js" defer></script>
    
</head>

<body id="index">

    <div class="wrapper">

        <main>

            <div class="container d-flex justify-content-center align-items-center ">

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
                    <!-- afficher le login de l'utilisateur -->
                    <mark><?php $login = $user->getLogin(); ?></mark></li>

                    <div class="text-center">
                        <div class="flex-column">
                            <button type="button" class="btn btn-dark btn-lg m-2"><a class="text-warning" href="game.php">JOUER</a></button>
                            <button type="button" class="btn btn-dark btn-lg m-2"><a class="text-warning" href="index.php?deconnexion=true">DECONNEXION</a></button>
                        </div>
                    </div>
                <?php
                } else { 
                    ?>
                    <!-- afficher les liens menus correspondants à l'absence de session -->

                    <div class="text-center">
                        <button type="button" id="connexion" class="btn btn-dark btn-lg m-2"><a id="loginBtn" class="text-warning" href="/clicker/forms.php?choice=login">CONNEXION</a></button>
                        <button type="button" id="inscription" class="btn btn-dark btn-lg m-2"><a id="registerBtn" class="text-warning" href="/clicker/forms.php?choice=register">INSCRIPTION</a></button>
                    </div>

                <?php
                }
                ?>

            </div> <!-- /container -->

        </main> <!-- /main -->

    <div class="push"></div> <!--repousse le footer en bas de page-->

    </div> <!-- /wrapper -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>