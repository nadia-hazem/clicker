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

                <div class="row text-center mx-auto my-5">
                    <div class="col-md-6">
                        <h4>Points</h4>
                        <span id="compteur">0</span>
                    </div>
                    <div class="col-md-6">
                        <h4>Clicks/sec</h4>
                        <span id="cps">0</span>
                    </div>
                </div>

                <div class="row justify-content-start my-5">
                    <button id="btnClick" class="btn btn-secondary w-auto mx-auto">Click</button>
                    <button id="autoClickBtn" class="btn btn-secondary w-auto mx-auto">Auto Click</button>
                </div>


                <section id="shop" class="row">
                    <h3>Acheter des packs de clics :</h3>
                    
                    <div class="shopItem col card form-group m-2 p-3" data-pack="1">
                        <p class="small-pack">Petit Pack</p>
                        <div class="clicks-per-pack">gain : <span class="gain">1.5</span> clic/sec.</div>
                        <div class="pack-cost">Coût : <span class="cost">10</span> points</div>
                        <button class="buy btn btn-success">Acheter</button>                        
                    </div>
                    
                    <div class="shopItem col card form-group m-2 p-3" data-pack="2">
                        <p class="medium-pack">Moyen Pack</p>
                        <div class="clicks-per-pack">gain : <span class="gain">2</span> clics/sec.</div>
                        <div class="pack-cost">Coût : <span class="cost">50</span> points</div>
                        <button class="buy btn btn-success">Acheter</button>
                    </div>
                    
                    <div class="shopItem col card form-group m-2 p-3" data-pack="3">
                        <p class="large-pack">Grand Pack</p>
                        <div class="clicks-per-pack">gain: <span class="gain">2.5</span> clics/sec.</div>
                        <div class="pack-cost">Coût : <span class="cost">100</span>points</div>
                        <button class="buy btn btn-success">Acheter</button>
                    </div>
                    
                    <div class="shopItem col card form-group m-2 p-3 " data-pack="4">
                        <p class="mega-pack">Mega Pack</p>
                        <div class="clicks-per-pack">gain : <span class="gain">3</span> clics/sec.</div>
                        <div class="pack-cost">Coût : <span class="cost">300</span> points</div>
                        <button class="buy btn btn-success">Acheter</button>
                    </div>

                </section>

            </div> <!-- /container -->

        </main> <!-- /main -->

    <div class="push"></div> <!--repousse le footer en bas de page-->

    </div> <!-- /wrapper -->

    <!-- Footer -->
    <?php include 'includes/footer.php';?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>