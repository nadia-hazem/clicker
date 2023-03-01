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
    <script src="/clicker/assets/js/menu.js"></script>
    
</head>

<body id="jeu">

    <?php include 'includes/header.php'; ?>

    <div class="wrapper">

        <main>

            <div class="container">
                
                <div id="levelRow" class="row mx-auto p-5 bg-secondary">
                    <img src="level1.png" id="level1"><!--or-->
                    <img src="level2.png" id="level2"><!--argent-->
                    <img src="level3.png" id="level3"><!--zinc-->
                    <img src="level4.png" id="level4"><!--cuivre-->
                </div>

                <div class="money card">
                    <input id="moneyButton" type="button" value="Click" class="moneyButton">
                    <p id="moneyDisplay" class="display">0€</p>
                    <p id="moneyPerSec" class="mps"></p>
                </div>

                <div class="upgrades">
                    <div class="click">
                        <input id="upgrdClick" type="button" value="Upgrade Click" class="clickUpgrade">
                        <p class="stats-click" id="clickUpgradeStats">Coût: 10€ <br> Niveau: 1</p>
                    </div>
                    <br>
                    <div class="auto">
                        <input id="upgrdAuto" type="button" value="Auto Click" class="autoUpgrade">
                        <p class="stats-auto" id="autoUpgradeStats">Coût: 25€ <br> Niveau: 0</p>
                    </div>
                    <br>
                    <div class="autoAmount">
                        <input id="upgrdAutoAmt" type="button" value="Multiplieur Click" class="autoUpgradeAmount">
                        <p class="stats-auto-amount" id="autoAmountUpgradeStats">Coût: 50€ <br> Multiplieur: x1</p>
                    </div>
                </div>
            </div>

        </main> <!-- /main -->

        <div class="push"></div> <!--repousse le footer en bas de page-->

    </div> <!-- /wrapper -->

    <!-- Footer -->
    <?php include 'includes/footer.php';?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>