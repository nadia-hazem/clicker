<!--  Path: game.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clicker</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a05ac89949.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>    
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>    
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="assets/js/game.js"></script>
    
</head>

<body id="jeu">

    <?php include 'includes/header.php'; ?>

    <div class="wrapper">

        <main>     

            <section class="container d-flex flex-column justify-content-center align-items-center text-center">

                <div class="row w-75 justify-content-around">
                
                    <div class="col-md-6 shadow degr rounded align-items-center p-3">

                        <div class="money h-50 w-100 justify-content-center align-items-center align-content-center">
                            <h1 id="moneyDisplay" class="display d-flex text-dark text-center border-2 border-warning m-5 justify-content-center">$0</h1>
                            <input id="moneyButton" type="button" value="" class="moneyButton">
                            <p id="moneyPerSec" class="mps text-dark" style="display:block;"></p>
                            <img src="assets/img/sacdor.png" alt="money" class="money">
                        </div> 

                    </div>

                    <div class="upgrades col-md-4 justify-content-center">
                        <div class="d-flex justify-content-around my-2 ">                  
                            <img src="assets/img/banner.png" alt="money">
                        </div>
                        
                        <div class="click shadow degr rounded m-2 p-2">
                            <input id="upgrdClick" type="button" value="" class="clickUpgrade btn btn-sm btn-xs">
                            <p class="stats-click text-dark" id="clickUpgradeStats">Coût : $10 <br> Niveau 1</p>
                        </div>

                        <div class="auto shadow degr rounded m-2 p-2">
                            <input id="upgrdAuto" type="button" value="" class="autoUpgrade btn btn-sm btn-xs">
                            <p class="stats-auto text-dark" id="autoUpgradeStats">Coût : $25 <br> Niveau 0</p>
                        </div>

                        <div class="autoAmount shadow degr rounded m-2 p-2">
                            <input id="upgrdAutoAmt" type="button" value="" class="autoUpgradeAmount btn btn-sm btn-xs">
                            <p class="stats-auto-amount text-dark" id="autoAmountUpgradeStats">Coût : $50 <br> Multiplieur x1</p>
                    </div>

                </div> <!-- /row -->

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