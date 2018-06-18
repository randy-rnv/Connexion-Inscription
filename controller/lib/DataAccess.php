<?php

//require_once("../../models/User.php");

class DataAccess
{

    /**
     * @param $pdo PDO
     */
    public static function selectOne($pdo, $login){
        $user = new User();

        //selecting user
        try{
            $select = "SELECT * FROM users WHERE login=:login";

            $query = $pdo->prepare($select);
            $query->execute(array(
                ":login"    => $login
            ));
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query->fetch();

            // user properties
            if($result !== false){
                $user->setIdUser($result["id_user"])
                    ->setFirstName($result["first_name"])
                    ->setLastName($result["last_name"])
                    ->setLogin($result["login"])
                    ->setPassword($result["password"])
                    ->setBirthday($result["birthday"])
                    ->setGender($result["gender"]);
            }else{
                $user = null;
            }

        }catch (PDOException $e){
            echo $e->getMessage();
        }

        return $user;
    }

    /**
     * @param $pdo PDO
     * @param $user User
     */
    public static function insertOne($pdo, $user){
        $pdo->beginTransaction();
        try{
            $insert = "INSERT INTO users(first_name, last_name, login, password, birthday, gender)
                        VALUES(:first_name, :last_name, :login, :password, :birthday, :gender)";
            $query  = $pdo->prepare($insert);
            $query->execute(array(
                ":first_name"   => $user->getFirstName(),
                ":last_name"    => $user->getLastName(),
                ":login"        => $user->getLogin(),
                ":password"     => $user->getPassword(),
                ":birthday"     => $user->getBirthday(),
                ":gender"       => $user->getGender()
            ));

            $result = "Inscription Ok";

            $pdo->commit();
        }catch (PDOException $e){
            $result = "Inscription KO";
            $pdo->rollBack();
        }

        return $result;
    }
}