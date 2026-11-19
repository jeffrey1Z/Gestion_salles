<?php


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$bouton = $_POST['validate'] ?? null; // Utiliser l'opérateur null coalescent

if (isset($bouton)) {
    
    // Vérification de l'existence des clés avant d'accéder
    $nom = $_POST['nom'] ?? null;
    $prenom = $_POST['prn'] ?? null;
    $age = $_POST['age'] ?? null;
    $telephone = $_POST['tel'] ?? null;
    $mail = $_POST['mail'] ?? null;
    $pass = $_POST['pass'] ?? null;
    $confirm = $_POST['confirm'] ?? null;

    if ( empty($nom) || empty($prenom) || empty($age) || empty($telephone) || empty($mail) || empty($pass) || empty($confirm)) {
        $errmessage = "Veuillez saisir tous les champs...";
    } else {
        if ($pass !== $confirm) {
            $errmessage = "Les mots de passe ne correspondent pas.";
        } else {
           
            $nom = htmlspecialchars($nom);
            $prenom = htmlspecialchars($prenom);
            $age = htmlspecialchars($age);
            $telephone = htmlspecialchars($telephone);
            $mail = htmlspecialchars($mail);
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $compte_exist = $bdd->prepare('SELECT * FROM inscription WHERE nom = ? AND mail=?');
            $compte_exist->execute(array($nom,$mail));

            if ($compte_exist->rowCount() == 0) {
                $inscrire = $bdd->prepare('INSERT INTO inscription( nom, prenom, age, telephone, mail, mdp) VALUES (?, ?, ?, ?, ?, ?)');
                $inscrire->execute(array( $nom, $prenom, $age, $telephone, $mail, $pass));

                $authentification = $bdd->prepare('SELECT id, nom, mail FROM inscription WHERE   nom = ? AND prenom = ? AND age=? AND mail = ?');
                $authentification->execute(array($nom, $prenom,$age, $mail)); // Corrigé : utiliser les bonnes variables
                $recupedonnes = $authentification->fetch();

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $recupedonnes['id'];
                $_SESSION['nom'] = $recupedonnes['nom'];
                $_SESSION['prenom'] = $recupedonnes['prenom'];
                $_SESSION['mail'] = $recupedonnes['mail'];
                $_SESSION['photo_profil'] = $recupedonnes['photo_profil'];
                header('Location: login.php');
                exit; 
            } else {
                $errmessage = "votre compte existe déjà.";
            }
        }
    }
}
