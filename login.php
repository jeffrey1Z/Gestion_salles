<?php require 'loginAction.php'; 
require 'head.php'; 
?>
<body>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        color: #f1f1f1;
        background-image: url(img/IMG_5819.JPG);
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    #formulaire {
        box-shadow: 0 0 10px;
        align-items: center;
        margin-top: 150px;
        height: 350px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        max-width: 550px;
        text-align: left;
        border-radius: 40px;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7); /* Ajouter un fond semi-transparent pour améliorer la lisibilité */
    }

    input[type='email'],
    input[type='password'] {
        width: 100%;
        max-width: 350px;
        margin-top: 30px;
        border-radius: 10px;
        height: 35px;
        font-size: 20px;
        padding-left: 10px;
    }

    .sub {
        cursor: pointer;
        height: 40px;
        width: 100%;
        max-width: 180px;
        color: red;
        border-radius: 5px;
        background: #111;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .sub:hover {
        box-shadow: 0 0 10px;
        background: red;
        color: #fff;
        transform: translateY(1.1) scale(1.01);
    }

    legend {
        font-size: 20px;
        margin-top: 20px;
    }

    a {
        color: #f1f1f1;
        text-decoration: none;
        font-size: 14px;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Responsive design */
    @media screen and (max-width: 768px) {
        #formulaire {
            margin-top: 100px; /* Ajuster la marge en fonction de la taille de l'écran */
            width: 90%; /* Largueur du formulaire plus large sur petit écran */
            max-width: 400px; /* Limiter la largeur maximale */
        }

        .sub {
            width: 100%;
        }

        input[type='email'],
        input[type='password'] {
            width: 100%; /* Assurer que les champs occupent toute la largeur disponible */
        }
    }
</style>

<form action="" method='POST' id="formulaire">
    <legend>FORMULAIRE DE CONNEXION</legend>

    <?php if (isset($errmessage)) {
        echo '<p>' . $errmessage . '</p>';
    } ?>

    <input type="email" name="mail" placeholder="votre e-mail" class="mail" id='mail' required>

    <input type="password" name="pass" placeholder="votre mot de passe" id='mdp' class="mail" required>

    <input type="submit" name="validate" value='se connecter' class="sub">

    <br><br><br>

    <a href="connexion.php"><p>je n'ai pas de compte, je m'inscris.</p></a>
</form>
</body>
</html>
