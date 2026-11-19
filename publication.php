<?php  

require 'header.php';
require 'publier.php';
require 'recupe.php';


?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #111;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        margin-top: 80px; /* Ajustement pour éviter le conflit avec la barre de navigation existante */
    }

    .content {
        display: flex;
        align-items: flex-start;
        background-color: rgba(255, 0, 0, 0.2);
        border-radius: 10px;
        padding: 15px;
        margin: 10px 0;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .profile-pic {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
        object-fit: cover;
        border: 2px solid red;
    }

    .comment-content {
        flex-grow: 1;
    }

    h4 {
        margin: 0;
        color: red;
        font-size: 16px;
    }

    .elemt p {
        font-size: 14px;
        margin: 5px 0;
        word-wrap: break-word;
    }

    small {
        color: gray;
    }

    form {
        display: flex;
        align-items: center;
        max-width: 600px;
        width: 100%;
        margin-top: 20px;
    }

    textarea {
        flex-grow: 1;
        height: 40px;
        border-radius: 20px;
        font-size: 14px;
        padding: 10px;
        border: 2px solid red;
        background: #222;
        color: white;
        resize: none;
        outline: none;
    }

    .sub {
        cursor: pointer;
        height: 40px;
        width: 80px;
        border: none;
        color: white;
        border-radius: 20px;
        background: red;
        margin-left: 10px;
        font-size: 14px;
        transition: 0.3s;
    }

    .sub:hover {
        box-shadow: 0 0 10px red;
        transform: scale(1.05);
    }
</style>

<body>
   


    <?php while($question = $recupe_msg->fetch()) { ?>
    <div class="content">
        <img src="<?= ($_SESSION['photo_profil']) ?>" alt="Photo de profil" class="profile-pic">
        <div class="comment-content">
            <h4><?= ($question['prenom_auteur']) . ' ' . ($question['nom_auteur']); ?></h4>
            <div class="elemt">
                <p><?= ($question['publication']); ?></p>
            </div>
            <small>Publié le : <?= ($question['date_publication']); ?></small>

            <?php if ($question['id_auteur'] == $_SESSION['id']) { ?>
                <!-- Bouton pour modifier -->
                <button class="modifier-btn" data-id="<?= $question['id_auteur'] ?>" data-publication="<?= htmlspecialchars($question['publication']) ?>">Modifier</button>
                
                <!-- Bouton pour supprimer -->
                <form action="modsup.php" method="POST" style="display:inline;">
                    <input type="hidden" name="publication_id" value="<?= $question['id_auteur'] ?>">
                    <input type="submit" name="supprimer" value="Supprimer" class="sub">
    
                </form>
                
            <?php } ?>
        </div>
        
    </div>



<!-- Formulaire modifiable pour chaque publication -->


    <?php } ?>

    <div id="modification-form" style="display:none;">
    <textarea id="modification-msg"></textarea>
    <button id="save-modification">Sauvegarder</button>
</div>


<form action="" method="POST" id="formulaire" style="display:none;>
     
<form action="" method="POST" id="formulaire">
        <textarea name="msg"  ></textarea>
        <input type="submit" name="envoyer" value="envoyer" class="sub">
    </form>
     

    <form action="" method="POST" id="formulaire">
        <textarea name="msg"  ></textarea>
        <input type="submit" name="envoyer" value="envoyer" class="sub">
    </form>
<script>
    document.querySelectorAll('.modifier-btn').forEach(button => {
        button.addEventListener('click', function() {
            const publicationId = this.getAttribute('data-id');
            const publicationText = this.getAttribute('data-publication');

            // Afficher le formulaire de modification
            document.getElementById('modification-form').style.display = 'block';
            document.getElementById('modification-msg').value = publicationText;
            
            // Sauvegarder la modification avec AJAX
            document.getElementById('save-modification').addEventListener('click', function() {
                const newMsg = document.getElementById('modification-msg').value;

                // Requête AJAX pour modifier la publication
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'votre_page.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        location.reload(); // Rafraîchir la page après modification
                    }
                };
                xhr.send('modifier=true&msg_modifie=' + encodeURIComponent(newMsg) + '&publication_id=' + publicationId);
            });
        });
    });
</script>

<script>
    const formulaire = document.getElementById('formulaire');
    formulaire.addEventListener('submit', function(e) {
        e.preventDefault(); // Empêche l'envoi du formulaire classique

        const formData = new FormData(formulaire);
        
        // Requête AJAX pour soumettre le commentaire
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'votre_page.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const newComment = xhr.responseText; // Commentaire renvoyé par le serveur
                // Ajouter dynamiquement le commentaire à la page sans recharger
                const newCommentElement = document.createElement('div');
                newCommentElement.classList.add('content');
                newCommentElement.innerHTML = newComment;
                document.body.appendChild(newCommentElement);
            }
        };
        xhr.send(formData);
    });
</script>

<?php  


require 'footer.php';


?>
</body>
</html>
