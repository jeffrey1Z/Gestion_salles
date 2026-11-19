
<?php require 'action.php'; ?>

<body style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; color: #f1f1f1; background-image: url(img/IMG_5819.JPG); background-attachment: fixed; background-size: cover; background-position: center; background-repeat: no-repeat;">
<style> 
    body {
        margin: 0;
        padding: 0;
    }

    #formulaire {
        box-shadow: 0 0 10px;
        align-items: center;
        margin-top: 100px;
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
        background-color: rgba(0, 0, 0, 0.7); /* Pour améliorer la lisibilité */
    }

    input[type='text'],
    input[type='email'],
    input[type='password'] {
        width: 100%;
        max-width: 350px;
        margin-top: 20px;
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
        color: #fff;
        font-size: 16px;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
        #formulaire {
            margin-top: 50px; /* Ajuste la marge supérieure sur mobile */
            width: 90%; /* Le formulaire occupe 90% de l'écran */
            max-width: 400px; /* Limite la largeur maximale à 400px sur mobile */
        }

        .sub {
            width: 100%; /* Le bouton prend toute la largeur disponible */
        }

        input[type='text'],
        input[type='email'],
        input[type='password'] {
            width: 100%; /* Les champs prennent toute la largeur disponible */
        }
    }
</style>

<form action="" method="POST" id="formulaire">
    <legend>FORMULAIRE D'INSCRIPTION</legend>

    <?php if (isset($errmessage)) {
        echo '<p>' . $errmessage . '</p>';
    } ?>

    <input type="text" name="nom" id="n" placeholder="nom" required>
    <input type="text" name="prn" id="prn" placeholder="prenom" required>
    <input type="text" name="age" id="age" placeholder="age" required>
    <input type="text" name="tel" id="tel" placeholder="telephone" required>
    <input type="email" name="mail" class="mail" id="mail" placeholder="E-MAIL" required>
    <input type="password" name="pass" id="mdp" class="mail" placeholder="mot de passe" required>
    <input type="password" name="confirm" id="conf" class="mail" placeholder="confirmer" required>
    <input type="submit" name="validate" value="envoyer" class="sub">
    <br><br>
    <a href="login.php"><p>j'ai déjà un compte, je me connecte.</p></a>
</form>

</body>
</html>
