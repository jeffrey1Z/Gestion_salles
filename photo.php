<?php
require 'bdd/bdd.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $upload_dir = "uploads/";
    $filename = "profil.jpg"; // On écrase toujours la photo de profil avec le même nom
    $target_file = $upload_dir . $filename;

    // Vérifie si le dossier existe
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Vérifie que c'est bien une image
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES['photo']['type'], $allowed_types)) {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            echo "Photo mise à jour avec succès.";
        } else {
            echo "Erreur lors du téléchargement.";
        }
    } else {
        echo "Format non autorisé.";
    }
}
?>

