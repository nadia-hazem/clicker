<?php session_start(); ?>
<?php

    require_once 'assets/lib/DbConnect.php';
    require_once 'assets/lib/User.php';
    $db = new DbConnect();
    $user = new User($db);
?>

<!--  Path: forms.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

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
    <script src="/clicker/assets/js/script.js"></script>
    
</head>

<body id="forms">

    <div class="wrapper">

        <main>

            <div class="container d-flex justify-content-center align-items-center align-content-center">
                
                <div id="connexionDiv" class="animate__animated animate__zoomIn">

                    <button id="inscription" class="btn btn-dark btn-lg"><a class="text-center text-warning" id="registerBtn" href="/clicker/forms.php?choice=register">INSCRIPTION</a></button>

                    <!-- login -->
                    <form id="loginForm" class="bg-dark rounded p-5 m-5" action="assets/php/verification.php" method="post"> <!-- redirection vers la page de vérification -->
                    
                    <h3 class="playfair">Connectez-vous pour accéder au jeu</h3>
                    <h1 class="text-center text-warning">Connexion</h1>

                        <label for="login">Login</label>
                        <input type="text" class="login form-control" placeholder="Entrer le nom d'utilisateur" name="login" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" class="password form-control" placeholder="Entrer le mot de passe" name="password" required>
                        <p></p>
                        <input type="submit" id="loginSubmit" class="btn btn-warning" value="Connexion">
                        <p class="error"></p>

                        Vous n'avez pas de compte ? &nbsp;<a href="#" id="switchReg" class="text-success">Inscription</a>
                    </form> <!-- fin du formulaire -->
                    
                </div>

                
                <div id="inscriptionDiv" class="animate__animated animate__zoomIn">
                    
                    <button id="inscription" class="btn btn-dark btn-lg"><a class="text-center text-warning" id="loginBtn" href="/clicker/forms.php?choice=login">CONNEXION</a></button>
                    
                    <!-- register -->
                    <form id="registerForm"  class="bg-dark rounded p-5 m-5" action="assets/php/verification.php">
                        
                        <h3 class="">Inscrivez-vous pour jouer</h3>
                        <h1 class="text-center text-warning">Inscription</h1>

                        <label for="login">login</label>
                        <input type="text" name="login" class="login form-control" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="password form-control" required>
                        <p></p>
                        <label for="password2">Confirmer le mot de passe</label>
                        <input type="password" name="password2" id="password2" class="form-control" required>
                        <p></p>
                        <input type="submit" id="registerSubmit" class="btn btn-warning" value="Inscription">
                        <p class="error"></p>

                        Déjà inscrit ? &nbsp;<a href="#" id="switchLog" class="text-success">Connexion</a>

                    </form> <!-- fin du formulaire -->

                </div> <!-- /inscriptionDiv -->
            
            </div> <!-- /container -->

        </main> <!-- /main -->

        <div class="push"></div> <!--repousse le footer en bas de page-->

    </div> <!-- /wrapper -->

    <!-- footer -->
    <?php include 'includes/footer.php';?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>