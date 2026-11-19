<?php

require 'bdd/bdd.php'; // Connexion à la BDD

if (!isset($_SESSION['id'])) {
    die("Vous devez être connecté pour supprimer votre photo de profil.");
}

$user_id = $_SESSION['id'];
$query = $bdd->prepare("SELECT photo_profil FROM inscription WHERE id = ?");
$query->execute([$user_id]);
$user = $query->fetch();

if ($user && !empty($user['photo_profil'])) {
    $photo_path = "uploads/" . $user['photo_profil'];

    if (file_exists($photo_path)) {
        unlink($photo_path);
    }

    // Mettre à jour la base de données
    $query = $bdd->prepare("UPDATE inscription SET photo_profil = NULL WHERE id = ?");
    $query->execute([$user_id]);

    echo "Photo supprimée avec succès.";
} else {
    echo "Aucune photo à supprimer.";
}
?>
