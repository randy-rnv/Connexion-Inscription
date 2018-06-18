<?php

require_once("../models/User.php");
require_once("lib/Connexion.php");
require_once ("lib/DataAccess.php");

$pdo        = Connexion::getConnexion();

// connexion elements
$login      = filter_input(INPUT_POST, "loginConnexion");
$password   = filter_input(INPUT_POST, "passwordConnexion");

echo($password);

// checking in database
$user     = DataAccess::selectOne($pdo, $login);

if($user !== null){
    // check if password is ok
    $userChecked = password_verify($password, $user->getPassword());

    if($userChecked){
        header("Location:../views/accueil.php?message=Connexion réussi");
    }else{
        header("Location:../index.php?message=Erreur login/mot de passe");
    }
}else{
    header("Location:../index.php?message=Erreur login/mot de passe");
}


