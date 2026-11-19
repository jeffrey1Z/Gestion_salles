<?php


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


if (isset($_POST['envoyer'])) {
    if(empty($_POST['msg'])){
        $errmessage="saisissez quelque chose";
    }
    else{
    $msg = $_POST['msg'];
    $user_id = $_SESSION['id'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    
    // Insertion dans la base de données
    $query = "INSERT INTO publication (id_auteur, publication, date_publication) VALUES (?, ?, NOW())";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$user_id, $msg]);

    // Retourner le nouveau commentaire (format HTML)
    $new_comment = '<div class="content">';
    $new_comment .= '<img src="' . htmlspecialchars($_SESSION['photo_profil']) . '" alt="Votre photo" class="profile-pic">';
    $new_comment .= '<div class="comment-content"><h4>' . htmlspecialchars($_SESSION['prenom']) . ' ' . htmlspecialchars($_SESSION['nom']) . '</h4>';
    $new_comment .= '<p>' . nl2br(htmlspecialchars($msg)) . '</p>';
    $new_comment .= '<small>Publié à : ' . date('H:i d/m/Y') . '</small></div></div>';
    
    echo $new_comment;
}
}
