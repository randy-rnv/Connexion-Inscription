<?php

require_once("../models/User.php");
require_once("lib/Connexion.php");
require_once ("lib/DataAccess.php");
require_once("lib/ServerVerification.php");

$pdo    = Connexion::getConnexion();

/** values of form elements */
$firstName  = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
$lastName   = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
$gender     = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
    // connexion elements
$login      = filter_input(INPUT_POST, "login", FILTER_SANITIZE_SPECIAL_CHARS);
$login2     = filter_input(INPUT_POST, "login2", FILTER_SANITIZE_SPECIAL_CHARS);
$password   = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    // birthday
$day        = filter_input(INPUT_POST, "day", FILTER_SANITIZE_SPECIAL_CHARS);
$month      = filter_input(INPUT_POST, "month", FILTER_SANITIZE_SPECIAL_CHARS);
$year       = filter_input(INPUT_POST, "year", FILTER_SANITIZE_SPECIAL_CHARS);
if(intval($day) != 0 && intval($month) != 0 && intval($year) != 0){
    $birthday = new DateTime("$year-$month-$day");
    $birthday = $birthday->format("Y-m-d");
}

/** serverside verification */
    // gender verification
$genderChecked  =   ServerVerification::checkGender($gender);
if($genderChecked === false) {
    header("Location:../index.php?message=Veuillez renseigner votre genre.");
}

    // birthday verification //
$birthdayChecked    = ServerVerification::validBirthday($birthday, $day, $month, $year);
if($birthdayChecked === false) {
    header("Location:../index.php?message=Veuillez renseigner votre date de naissance.");
}

    //password verification
$passwordChecked = trim($password) !== "" ? true : false;
if($passwordChecked === false){
    header("Location:../index.php?message=Votre mot de passe ne peut pas être vide");
}

    // login verification //
$validLogin     = ServerVerification::validLogin($login);
        // if $login == $login2
$loginIsSame    = $validLogin ? ServerVerification::loginIsSame($login, $login2) : false;
if($loginIsSame === false) {
    header("Location:../index.php?message=Veuillez renseigner un email/numero valide");
}
        // if login exist
$loginAvailable = ServerVerification::checkIfLoginExist($pdo, $login);
if($loginAvailable === false) {
    header("Location:../index.php?message=Email/Numero existant.");
}
        // all ok
$loginChecked   = $validLogin && $loginIsSame && $loginAvailable ;

$firstNameChecked =  trim($firstName)   !== "" ? true : false;
$lastNameChecked  =  trim($lastName)    !== "" ? true : false;
if($firstNameChecked === false || $lastNameChecked === false){
    header("Location:../index.php?message=Veuillez renseigner votre nom.");
}

/** persistence of data */
if($firstNameChecked && $lastNameChecked && $loginChecked && $passwordChecked && $birthdayChecked && $genderChecked ){
    //password hash
    $password = password_hash($password, PASSWORD_BCRYPT);

    // instaciation of a new user
    $user = new User($firstName, $lastName, $login, $password, $birthday, $gender);

    // insert query
    $insert = DataAccess::insertOne($pdo, $user);

    header("Location:../index.php?message=Inscription terminé");
}