<?php
require 'bdd/bdd.php'; // Connexion à la base de données

if (isset($_POST['valider'])) {
    $plan = htmlspecialchars($_POST['plan']);
    $prix = htmlspecialchars($_POST['prix']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);

    // Vérifier que les champs sont bien remplis
    if (!empty($plan) && !empty($prix) && !empty($nom) && !empty($email) && !empty($telephone)) {
        // Insérer dans la base de données
        $query = $bdd->prepare("INSERT INTO souscription (plan, prix, nom, email, telephone, date_souscription) VALUES (?, ?, ?, ?, ?, NOW())");
        $query->execute([$plan, $prix, $nom, $email, $telephone]);

        echo "<script>alert('Souscription réussie !'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Veuillez remplir tous les champs !');</script>";
    }
}
?>
