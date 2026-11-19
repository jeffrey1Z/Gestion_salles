<?php
 require 'photo.php';
?>
<?php

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Récupérer la photo de profil depuis la base de données
    $query = $bdd->prepare("SELECT photo_profil FROM inscription WHERE id = ?");
    $query->execute([$user_id]);
    $user = $query->fetch();

    // Définir l'image de profil (soit celle de la BDD, soit une image par défaut)
    $photo_profil = !empty($user['photo_profil']) ? "uploads/" . $user['photo_profil'] : "uploads/default.png";
} else {
    $photo_profil = "uploads/default.png"; // Si l'utilisateur n'est pas connecté
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>mon accueil</title>
</head>
<body>
<header>


<a href="" class="logo">Dream <span>fit</span></a>

<div class='bx bx-menu' id='menu'></div>

<ul class="navbar">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="suivi.php">Evolution</a></li>
    <li><a href="publication.php">Commentaires</a></li>

</ul>

<div class="right-section">
        <?php if (isset($_SESSION['id'])): ?>
            <form action="aprofil.php" method="POST" enctype="multipart/form-data">
                <div class="profile-container">
                    <label for="file-input">
                        <img src="<?= htmlspecialchars($photo_profil); ?>" alt="Photo de profil" class="profile-pic">
                    </label>
                    <input type="file" name="photo" id="file-input" accept="image/*" style="display: none;">
                </div>
                <button type="submit">Changer</button>
                <a href="sp.php" class="delete-btn">Supprimer</a>
            </form>
        <?php else: ?>
            <a href="login.php" class="connexion">Connexion</a>
        <?php endif; ?>
    </div>
</header>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

</body>
</html>
<style>
    /* Conteneur de la photo */
.profile-container {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid red;
    cursor: pointer;
    display: inline-block;
}

/* Style de l'image de profil */
.profile-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Bouton de suppression */
.delete-btn {
    display: inline-block;
    background-color: red;
    color: white;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
    margin-left: 10px;
}

.delete-btn:hover {
    background-color: darkred;
}

</style>