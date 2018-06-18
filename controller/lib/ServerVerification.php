<?php

class ServerVerification
{
    /*
     * check if login is an email or a phone number
     */
    public static function validLogin($login){
        $email          = "/^[0-9a-zA-Z_-]+([.][0-9a-zA-Z_-]+)?@[a-zA-Z._-]{2,}[.][a-zA-Z]{2,5}$/";
        $phoneNumber    = "/^0[1-9]([0-9]{2}){4}$/";

        $loginIsEmail       = preg_match($email, $login);
        $loginIsPhoneNumber = preg_match($phoneNumber, $login);

        if($loginIsEmail || $loginIsPhoneNumber){
            return true;
        }else{
            return false;
        }
    }

    /*
     * check if login enter for registration are the same
     */
    public static function loginIsSame($login, $login2){
        return $login === $login2;
    }

    /**
     * @param $pdo PDO
     * check if login already exist
     */
    public static function checkIfLoginExist($pdo, $login){
        $select = "SELECT * FROM users WHERE login=:login";
        $query  = $pdo->prepare($select);
        $query->execute(array(
            ":login" => $login
        ));
        $result = $query->fetch();

        $loginAvailable = $result == false ? true : false;

        return $loginAvailable;
    }

    /*
     * check if birthday format is valid
     */
    public static function validBirthday($birthday, $day, $month, $year){
        $dateIsValid = checkdate($month, $day, $year);

        if($dateIsValid){
            $form = "/^\d{4}-\d{2}-\d{2}$/";
            $birthdayIsDate = preg_match($form, $birthday);

            $result = $birthdayIsDate === 1 ? true : false;
        }else{
            $result = false;
        }


        return $result;
    }

    /*
     * check if gender is valid
     */
    public static function checkGender($gender){
        if(isset($gender) && ($gender == "F" || $gender == "M")){
            return true;
        }else{
            return false;
        }
    }

}