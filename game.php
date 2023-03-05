<?php session_start(); ?>
<?php require_once 'assets/lib/DbConnect.php'; ?>
<?php require_once 'assets/lib/User.php'; ?>

<?php
$db = new DbConnect(); 
$user = new User($db); 

if (!$user->isConnected()) {
        header('Location: index.php');
    }
?>

<!--  Path: game.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a05ac89949.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/clicker/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/clicker/assets/img/favicon.png"/>    
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        let userId = <?php echo $user->getId(); ?>;
    </script>
    <!-- JS -->
    <script src="/clicker/assets/js/game.js"></script>
    
</head>

<body id="jeu">

    <div class="wrapper">

        <main>     
            <h2 class="text-center mt-5 " ><?php $login = $user->getLogin(); ?></h2>

            <section class="container d-flex wrap text-center justify-content-center align-items-center align-content-center">


                <div id="scorePopup" style="display: none;"></div>
                
                <div class="col-7 col-md-6 col-sm-6 border border-5 border-warning align-items-center bg-dark p-5">

                    <div class="d-flex justify-content-center mx-5 my-0">
                        <button id="deconnexion" class="btn btn-warning btn-lg btn-sm btn-xs mx-2"><a class="text-dark" href="index.php?deconnexion=true">DECONNEXION</a></button>
                        <button id="profil" class="btn btn-warning btn-lg btn-sm btn-xs mx-2"><a class="text-dark" href="profil.php">PROFIL</a></button>
                    </div>    

                    <div class="money m-5 justify-content-center align-items-center">
                        <h1 id="moneyDisplay" class="display d-flex rounded text-white text-center bg-dark border-5 border-warning py-5 m-5 justify-content-center">$0</h1>
                        <input id="moneyButton" type="button" value="" class="moneyButton rounded-circle shadow">
                        <p id="moneyPerSec" class="mps text-white"></p>
                    </div> 
                </div>

                <div class="upgrades col-2 col-md-4 col-sm-5 m-auto">
                    <div class="d-flex justify-content-around my-2 ">                  
                        <h1 class="text-dark">BONUS</h1>
                        <button id="showScoreBtn" class="btn btn-warning btn-md btn-sm my-2">Score</button>
                    </div>
                    
                    <div class="click rounded bg-dark">
                        <input id="upgrdClick" type="button" value="" class="clickUpgrade btn btn-sm btn-xs">
                        <p class="stats-click" id="clickUpgradeStats">Coût : $10 <br> Niveau 1</p>
                    </div>

                    <div class="auto rounded bg-dark m-2 p-2">
                        <input id="upgrdAuto" type="button" value="" class="autoUpgrade btn btn-sm btn-xs">
                        <p class="stats-auto" id="autoUpgradeStats">Coût : $25 <br> Niveau 0</p>
                    </div>

                    <div class="autoAmount rounded bg-dark m-2 p-2">
                        <input id="upgrdAutoAmt" type="button" value="" class="autoUpgradeAmount btn btn-sm btn-xs">
                        <p class="stats-auto-amount" id="autoAmountUpgradeStats">Coût : $50 <br> Multiplieur x1</p>
                </div>

                

            </section> <!-- /container -->  

        </main> <!-- /main -->

        <div class="push"></div> <!--repousse le footer en bas de page-->

    </div> <!-- /wrapper -->

    <!-- Footer -->
    <?php include 'includes/footer.php';?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>