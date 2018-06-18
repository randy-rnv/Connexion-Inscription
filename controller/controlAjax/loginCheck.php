<?php

require_once("../lib/Connexion.php");
require_once("../lib/DataAccess.php");
require_once ("../lib/ServerVerification.php");

$pdo    = Connexion::getConnexion();

$login  = filter_input(INPUT_GET, "login");
$loginAvailable = ServerVerification::checkIfLoginExist($pdo, $login);

$response = $loginAvailable ? true : false;

echo($response);