<?php


require 'header.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['id'];

// Enregistrement des données
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poids = $_POST['poids'];
    $calories = $_POST['calories'];
    $reps = $_POST['repetitions'];

    $query = "INSERT INTO suivis_clients (client_id, date, poids, calories_bruleers, repetition) VALUES (?, NOW(), ?, ?, ?)";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$user_id, $poids, $calories, $reps]);
}

// Récupération des données
$stmt = $bdd->prepare("SELECT * FROM suivis_clients WHERE client_id = ? ORDER BY date DESC");
$stmt->execute([$user_id]);
$evolutions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivi de l'Évolution</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="evolution-page">
    <style>
        body.evolution-page {
            background-color: #111;
            color: #fff;
            font-family: 'Arial', sans-serif;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #1c1c1c;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid red;
        }

        .titre {
            text-align: center;
            color: red;
            margin-bottom: 20px;
        }

        .evolution-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .evolution-form input {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid red;
            background: #222;
            color: white;
            width: 28%;
        }

        .btn-enregistrer {
            background: red;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-enregistrer:hover {
            background: darkred;
        }

        .evolution-table {
            width: 100%;
            border-collapse: collapse;
        }

        .evolution-table th, .evolution-table td {
            border: 1px solid red;
            padding: 10px;
            text-align: center;
        }

        .evolution-table th {
            background: #222;
            color: red;
        }

        .filter-graph {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
            color: red;
        }

        .filter-graph select {
            padding: 6px 12px;
            background-color: #111;
            color: white;
            border: 1px solid red;
            border-radius: 5px;
        }

        .graph-container {
            width: 100%;
            max-width: 900px;
            margin: auto;
            background: #222;
            padding: 20px;
            border-radius: 10px;
        }
    </style>

    <div class="container">
        <h2 class="titre">Votre évolution</h2>

        <form method="POST" class="evolution-form">
            <input type="number" name="poids" step="0.1" placeholder="Poids (kg)" required>
            <input type="number" name="calories" placeholder="Calories brûlées" required>
            <input type="number" name="repetitions" placeholder="Répétitions" required>
            <button type="submit" class="btn-enregistrer">Enregistrer</button>
        </form>

        <table class="evolution-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Poids</th>
                    <th>Calories brûlées</th>
                    <th>Répétitions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evolutions as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td><?= htmlspecialchars($row['poids']) ?> kg</td>
                        <td><?= htmlspecialchars($row['calories_bruleers']) ?></td>
                        <td><?= htmlspecialchars($row['repetition']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="filter-graph">
        <label for="periode">Afficher les données :</label>
        <select id="periode">
            <option value="all">Tout</option>
            <option value="7">7 derniers jours</option>
            <option value="30">30 derniers jours</option>
        </select>
    </div>
    <br><br><br>
    <div class="graph-container">
        <canvas id="evolutionChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const rawData = {
            labels: <?= json_encode(array_reverse(array_column($evolutions, 'date'))) ?>,
            poids: <?= json_encode(array_reverse(array_column($evolutions, 'poids'))) ?>,
            calories: <?= json_encode(array_reverse(array_column($evolutions, 'calories_bruleers'))) ?>,
            reps: <?= json_encode(array_reverse(array_column($evolutions, 'repetition'))) ?>
        };

        const ctx = document.getElementById('evolutionChart').getContext('2d');

        const config = {
            type: 'line',
            data: {
                labels: rawData.labels,
                datasets: [
                    {
                        label: 'Poids (kg)',
                        data: rawData.poids,
                        borderColor: 'red',
                        backgroundColor: 'rgba(255,0,0,0.2)',
                        tension: 0.4
                    },
                    {
                        label: 'Calories brûlées',
                        data: rawData.calories,
                        borderColor: '#ff6600',
                        backgroundColor: 'rgba(255,102,0,0.2)',
                        tension: 0.4
                    },
                    {
                        label: 'Répétitions',
                        data: rawData.reps,
                        borderColor: '#00ccff',
                        backgroundColor: 'rgba(0,204,255,0.2)',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#fff'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#fff' }
                    },
                    y: {
                        ticks: { color: '#fff' },
                        beginAtZero: true
                    }
                }
            }
        };

        const evolutionChart = new Chart(ctx, config);

        document.getElementById('periode').addEventListener('change', function () {
            const days = this.value;
            let filteredLabels = rawData.labels;
            let poids = rawData.poids;
            let calories = rawData.calories;
            let reps = rawData.reps;

            if (days !== 'all') {
                const today = new Date();
                const dateLimit = new Date(today.setDate(today.getDate() - parseInt(days)));

                const newLabels = [];
                const newPoids = [];
                const newCalories = [];
                const newReps = [];

                for (let i = 0; i < rawData.labels.length; i++) {
                    const date = new Date(rawData.labels[i]);
                    if (date >= dateLimit) {
                        newLabels.push(rawData.labels[i]);
                        newPoids.push(rawData.poids[i]);
                        newCalories.push(rawData.calories[i]);
                        newReps.push(rawData.reps[i]);
                    }
                }

                filteredLabels = newLabels;
                poids = newPoids;
                calories = newCalories;
                reps = newReps;
            }

            evolutionChart.data.labels = filteredLabels;
            evolutionChart.data.datasets[0].data = poids;
            evolutionChart.data.datasets[1].data = calories;
            evolutionChart.data.datasets[2].data = reps;
            evolutionChart.update();
        });
    </script>
    <br><br><br>

<?php  

require 'footer.php';


?>
</body>
</html>
