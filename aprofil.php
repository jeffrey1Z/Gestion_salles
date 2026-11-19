<?php

require 'bdd/bdd.php';
if (!isset($_SESSION['id'])) {
    die("Vous devez être connecté pour changer votre photo de profil.");
}

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $upload_dir = "uploads/";
    $filename = "profil_" . $user_id . ".jpg"; // Chaque utilisateur a un fichier unique
    $target_file = $upload_dir . $filename;

    // Vérifier si le dossier existe
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Vérifier le type de fichier (JPEG, PNG, GIF)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES['photo']['type'], $allowed_types)) {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // Mettre à jour la BDD
            $query = $bdd->prepare("UPDATE inscription SET photo_profil = ? WHERE id = ?");
            $query->execute([$filename, $user_id]);
            
            echo "Photo mise à jour avec succès.";
        } else {
            echo "Erreur lors du téléchargement.";
        }
    } else {
        echo "Format non autorisé.";
    }
}
?>
