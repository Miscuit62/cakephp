<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #f4f4f4;
    }

    canvas {
        margin-top: 20px;
    }
</style>
<h1>Résumé hebdomadaire</h1>
<p>Semaine du <strong><?= h($startOfWeek) ?></strong> au <strong><?= h($endOfWeek) ?></strong></p>
<h2>Statistiques</h2>
<ul>
    <li>Total de cycles de sommeil : <strong><?= $totalCycles ?></strong> <?= $indicators['totalCyclesGreen'] ? '<span style="color:green;">✔</span>' : '<span style="color:red;">✘</span>' ?></li>
    <li>4 jours consécutifs avec au moins 5 cycles : <?= $indicators['consecutiveDaysGreen'] ? '<span style="color:green;">✔</span>' : '<span style="color:red;">✘</span>' ?></li>
</ul>
<h2>Détails par jour</h2>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Heure de coucher</th>
            <th>Heure de lever</th>
            <th>Cycles</th>
            <th>Sieste AM</th>
            <th>Sieste PM</th>
            <th>Sport</th>
            <th>Score matin</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($weeklyData as $day): ?>
            <tr>
                <td><?= h($day->sleep_date) ?></td>
                <td><?= h($day->sleep_start) ?></td>
                <td><?= h($day->sleep_end) ?></td>
                <td><?= h($day->cycles) ?></td>
                <td><?= $day->nap_afternoon ? '✔' : '✘' ?></td>
                <td><?= $day->nap_evening ? '✔' : '✘' ?></td>
                <td><?= $day->sport ? '✔' : '✘' ?></td>
                <td><?= h($day->morning_score) ?></td>
                <td><?= h($day->comment) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Graphique - Cycles de sommeil</h2>
<div>
    <canvas id="cyclesChart" width="400" height="200"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = <?= json_encode($labels) ?>;
    const cyclesData = <?= json_encode($cyclesData) ?>;
    console.log('Labels:', labels);
    console.log('Cycles Data:', cyclesData);
    if (labels.length === 0 || cyclesData.length === 0) {
        console.error('Les données pour le graphique des cycles sont vides.');
    } else {
        const cyclesCtx = document.getElementById('cyclesChart').getContext('2d');
        new Chart(cyclesCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cycles de sommeil',
                    data: cyclesData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    fill: true,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    }
</script>