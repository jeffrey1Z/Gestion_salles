<?php 
 require 'faAction.php';

// Récupérer les valeurs depuis l'URL
$plan = isset($_GET['plan']) ? htmlspecialchars($_GET['plan']) : '';
$prix = isset($_GET['prix']) ? htmlspecialchars($_GET['prix']) : '';

?>
<style>

        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    color: #f1f1f1;
    background-image: url(img/IMG_5792.JPG);
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
 }

        .container {
            width: 40%;
            margin: auto;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
           /* box-shadow: 0 0 10px red;*/
            margin-top:150px;
            opacity: 0.8;
            text-align:center;
        }

        input, select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 2px solid red;
            background: #333;
            color: white;
            
        }

        .sub {
            cursor: pointer;
            height: 40px;
            width: 80%;
            border: 2px solid red;
            color: red;
            border-radius: 5px;
            background: #111;
            font-size: 16px;
            
        }

        .sub:hover {
            box-shadow: 0 0 10px red;
            background: red;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Souscription à l’offre : <?= $plan; ?></h2>
    <h3>Prix : <?= $prix; ?>$/Mois</h3>

    <form action="faAction.php" method="POST">
        <input type="hidden" name="plan" value="<?= $plan; ?>">
        <input type="hidden" name="prix" value="<?= $prix; ?>">

        <input type="text" name="nom" placeholder="Votre Nom" required>
        <input type="text" name="email" placeholder="Votre Email" required>
        <input type="text" name="telephone" placeholder="Votre Téléphone" required>

        <input type="submit" name="valider" value="Souscrire" class="sub">
    </form>
</div>

</body>
</html>
