<?php
session_start();
// Path: verification.php

require_once 'assets/lib/DbConnect.php';
require_once 'assets/lib/User.php'; 
$db = new DbConnect();
$user = new User($db);

// test disponibilité du login
if (isset($_POST['verifLogin'])) {
    $login = $_POST['verifLogin'];
    $user->isUserExist($login);
}

// inscription
if (isset($_POST['register'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->register($login, $password);
}

// connexion
if (isset($_POST['connect'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->connect($login, $password);
}

// change login
if (isset($_POST['changeLogin'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->changeLogin($login, $password);
}

// change password
if (isset($_POST['changePassword'])) {
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newPassword'];
    $user->changePassword($oldPassword, $newPassword);
}

// delete account
if (isset($_POST['deleteAccount'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->delete($password);
}

