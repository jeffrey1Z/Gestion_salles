<?php


$recupe_msg = $bdd->prepare('SELECT * FROM publication WHERE id_auteur=?');
$recupe_msg->execute([$_SESSION['id']]);

?>