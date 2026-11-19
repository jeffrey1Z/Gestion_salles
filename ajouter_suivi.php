<?php
require 'bdd/bdd.php'; // Connexion à la base de données

$client_id = $_SESSION['id']; // Récupérer l'ID du client connecté

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $poids = $_POST['poids'];
    $calories = $_POST['calories'];
    $repetitions = $_POST['repetitions'];

    $query = "INSERT INTO suivis_clients (client_id, date, poids, calories_bruleers, repetition) VALUES (?, NOW(), ?, ?, ?)";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$client_id, $poids, $calories, $repetitions]);

    echo "Évolution enregistrée avec succès !";
}

?>
<canvas id="evolutionGraph"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch('ajouter_suivi.php') 
    .then(response => response.json())
    .then(data => {
        let ctx = document.getElementById('evolutionGraph').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.dates,
                datasets: [{
                    label: 'Poids (kg)',
                    data: data.poids,
                    borderColor: 'red',
                    borderWidth: 2
                }]
            }
        });
    });
</script>
