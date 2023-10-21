<!DOCTYPE html>
<html>
<head>
    <title>Données financières en temps réel</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <div>
        <h2>Données financières en temps réel</h2>
        <p>Métadonnées:</p>
        <table>
            <tr>
                <td>Information:</td>
                <td id="information"></td>
            </tr>
            <tr>
                <td>Symbole:</td>
                <td id="symbole"></td>
            </tr>
            <tr>
                <td>Dernière actualisation:</td>
                <td id="derniere_actualisation"></td>
            </tr>
        </table>
        <p>Graphique des fermetures:</p>
        <canvas id="graphique" width="400" height="200"></canvas>
    </div>

    <script>

        const url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=BZ&interval=1min&apikey=31JPUUAALJ4TO41N";

        let data = {
            timestamps: [],
            closes: [],
        };

        const ctx = document.getElementById('graphique').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.timestamps,
                datasets: [{
                    label: 'Fermetures',
                    data: data.closes,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }],
            },
        });

        function fetchData() {
            fetch(url)
                .then(response => response.json())
                .then(json => {
                    const metaData = json['Meta Data'];
                    document.getElementById('information').textContent = metaData['1. Information'];
                    document.getElementById('symbole').textContent = metaData['2. Symbol'];
                    document.getElementById('derniere_actualisation').textContent = metaData['3. Last Refreshed'];

                    const timeSeries = json['Time Series (1min)'];
                    data.timestamps = Object.keys(timeSeries).reverse();
                    data.closes = data.timestamps.map(timestamp => parseFloat(timeSeries[timestamp]['4. close']));

                    chart.data.labels = data.timestamps;
                    chart.data.datasets[0].data = data.closes;
                    chart.update();
                })
                .catch(error => {
                    console.error("Erreur lors de la récupération des données :", error);
                });
        }

        fetchData();
        setInterval(fetchData, 60000); // Met à jour les données toutes les 60 secondes
    </script>
</body>
</html>

