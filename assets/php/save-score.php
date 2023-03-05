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

// récupérer les données de progression du jeu
$money = $_POST['money'];
$clickUpCost = $_POST['clickUpCost'];
$clickLevel = $_POST['clickLevel'];
$autoUpCost = $_POST['autoUpCost'];
$autoLevel = $_POST['autoLevel'];
$multUpCost = $_POST['multUpCost'];
$multiplierLevel = $_POST['multiplierLevel'];

// sauvegarder les données de progression du jeu via la method save() de User class
$user->save($money, $clickUpCost, $clickLevel, $autoUpCost, $autoLevel, $multUpCost, $multiplierLevel);

?>
