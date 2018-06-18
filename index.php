<?php
    $message    = filter_input(INPUT_GET,"message", FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion/Inscription</title>
    <link href="style/main.css" rel="stylesheet"/>
</head>
<body>
    <section id="connexion">
        <form method="post" action="controller/connexion.php">
            <label for="loginConnexion">Adresse e-mail ou mobile</label>
            <label for="passwordConnexion" id="passwordLabel">Mot de passe</label>
            <br/>
            <input type="text" name="loginConnexion" id="loginConnexion" placeholder="Votre login" />
            <input type="password" name="passwordConnexion" id="passwordConnexion" placeholder="Votre mot de passe" />
            <button type="submit" id="connexionButton">Connexion</button>
        </form>
        <a href="#" id="link">Informations de compte oubliées?</a>
    </section>

    <aside id="serverMessage">
        <?= $message ?>
    </aside>
    <aside id="clientMessage">
    </aside>

    <section id="inscription">
        <h1>Inscription</h1>
        <form method="post" action="controller/registration.php">
            <input type="text" name="firstName" placeholder="Prénom" class="inputRegistration" />
            <input type="text" name="lastName" placeholder="Nom de famille" class="inputRegistration" />
            <br/>
            <input type="text" name="login" id="login" placeholder="Numéro de mobile ou email" class="inputRegistration" />
            <br/>
            <input type="text" name="login2" id="login2" placeholder="Confirmer numéro de mobile ou email" class="inputRegistration" />
            <br/>
            <input type="password" name="password" id="password" placeholder="Nouveau mot de passe" class="inputRegistration" />
            <br/>
            <label for="birthday" id="birthday"><b>Date de naissance</b></label>
            <br/>
            <select name="day" id="day">
                <option>Jour</option>
            </select>
            <select name="month" id="month">
                <option>Mois</option>
            </select>
            <select name="year" id="year">
                <option>Année</option>
            </select>
            <br/>
            <input type="radio" name="gender" id="F" value="F" />
            <label for="F"><b>Femme</b></label>
            <input type="radio" name="gender" id="M" value="M" />
            <label for="M"><b>Homme</b></label>

            <article id="text">En cliquant sur Inscription, vous acceptez nos conditions générales d'utilisation.</article>

            <button type="submit" id="registrationButton">Inscription</button>
        </form>
    </section>

    <script src="js/birthday.js"></script>
    <script src="js/ajaxFunction.js"></script>
    <script src="js/clientVerification.js"></script>
</body>
</html>