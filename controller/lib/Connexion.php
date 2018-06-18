<?php

class Connexion
{
    /**
     * Connexion to database 'reseau'
     */
    public static function getConnexion(){
        $pdo = new PDO("mysql:host=localhost;dbname=reseau;port=3306", "root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'UTF8'");

        return $pdo;
    }

    public static function deconnexion($pdo){
        $pdo = null;
        return $pdo;
    }
}