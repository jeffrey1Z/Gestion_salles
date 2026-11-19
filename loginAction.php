<?php
require 'bdd/bdd.php';

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$bouton = $_POST['validate'] ?? null; // Utiliser l'opérateur null coalescent

if (isset($bouton)) {
    
    $mail = $_POST['mail'] ?? null;
    $pass = $_POST['pass'] ?? null;
    

    if (empty($mail) || empty($pass) ) {
        $errmessage = "Veuillez saisir tous les champs...";
    } else {
        
        
            $mail = htmlspecialchars($mail);
            $pass = htmlspecialchars($pass);

            $user_exist = $bdd->prepare('SELECT * FROM inscription WHERE mail = ?');
            $user_exist->execute(array($mail));

            if( $user_exist-> rowCount()>0){

                $user_infos = $user_exist->fetch();
                if(password_verify($pass,$user_infos['mdp'])){
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $user_infos['id'];
                    $_SESSION['nom'] = $user_infos['nom'];
                    $_SESSION['prenom'] = $user_infos['prenom'];
                    $_SESSION['mail'] = $user_infos['mail'];
                    $_SESSION['photo_profil'] = $user_infos['photo_profil'];
                    header('Location: index.php');
                    exit; 
                }
                else{
                    $errmessage = "votre mot de passe est incorrect";
                }

            }
            else{
                $errmessage = "votre adress mail est incorrect";
            }
          
            
        }
    }

