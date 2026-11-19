
<?php
require 'bdd/bdd.php';
if (isset($_POST['modifier'])) {
    // Mise à jour de la publication
    $new_msg = $_POST['msg_modifie'];
    $publication_id = $_SESSION['id_publication'];
    $update_query = "UPDATE publication SET publication = ? WHERE id = ?";
    $stmt = $bdd->prepare($update_query);
    $stmt->execute([$new_msg, $publication_id]);
    header("Location: publication.php"); // Redirection pour afficher les mises à jour
}

if (isset($_POST['supprimer'])) {
    // Suppression de la publication
    $publication_id = $_SESSION['id_publication'];
    $delete_query = "DELETE FROM publication WHERE id_publication = ?";
    $stmt = $bdd->prepare($delete_query);
    $stmt->execute([$publication_id]);
    header("Location: publication.php"); // Redirection après suppression
}
