<?php session_start(); ?>

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

    <!-- JS -->
    <script src="/clicker/assets/js/game.js"></script>
    
</head>

<body id="jeu">

    <div class="wrapper">

        <main>

            

            <section class="container d-flex text-center justify-content-center align-items-center">
                
                <div class="col-6">
                    <div class="d-flex justify-content-start mx-5 my-0">
                        <button id="deconnexion" class="btn btn-danger btn-lg mx-2"><a href="index.php?deconnexion=true">DECONNEXION</a></button>
                        <button id="profil" class="btn btn-warning btn-lg mx-2"><a href="profil.php">PROFIL</a></button>
                    </div>    

                    <div class="money rounded m-5 bg-dark justify-content-center align-items-center">

                        <h1 id="moneyDisplay" class="display text-white my-5">$0</h1>
                        <input id="moneyButton" type="button" value="Click" class="moneyButton btn btn-danger btn-lg my-3">
                        <p id="moneyPerSec" class="mps text-white"></p>
                    </div> 
                </div>

                <div class="upgrades col-4 m-auto">
                    <h2 class="text-dark">Améliorations</h2>
                    
                    <div class="click rounded bg-dark m-2 p-2">
                        <input id="upgrdClick" type="button" value="Upgrade Click" class="clickUpgrade btn btn-warning my-2">
                        <p class="stats-click" id="clickUpgradeStats">Coût : $10 <br> Niveau 1</p>
                    </div>

                    <div class="auto rounded bg-dark m-2 p-2">
                        <input id="upgrdAuto" type="button" value="Auto Click" class="autoUpgrade btn btn-warning my-2">
                        <p class="stats-auto" id="autoUpgradeStats">Coût : $25 <br> Niveau 0</p>
                    </div>

                    <div class="autoAmount rounded bg-dark m-2 p-2">
                        <input id="upgrdAutoAmt" type="button" value="Multiplieur Click" class="autoUpgradeAmount btn btn-warning my-2">
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