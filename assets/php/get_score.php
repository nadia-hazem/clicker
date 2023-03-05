<?php session_start(); ?>
<?php require_once 'assets/lib/DbConnect.php'; ?>
<?php require_once 'assets/lib/User.php'; ?>

<?php
require 'assets/lib/DbConnect.php';
require 'assets/lib/User.php';

$db = new DbConnect(); 
$user = new User($db); 

if (!$user->isConnected()) {
        header('Location: index.php');
    }

    // Récupérer les données de progression du jeu
    $scoreData = $user->getScore();
    
    // Convertir au format JSON
    $scoreJson = json_encode($scoreData);
    
    // Définir le type de contenu à JSON
    header('Content-Type: application/json');
    
    return $scoreJson;
    echo $scoreJson;
    