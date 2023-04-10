</main>

<footer>
    <span>Todos os direitos reservados &copy; <?= date('Y') ?></span>
</footer>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChartDesp);
    google.charts.setOnLoadCallback(drawChartEntr);

    function drawChartDesp() {
        const data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

        const options = {
            title: 'Despesas',
            width: '100%',
            height: '100%'
        };

        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }

    function drawChartEntr() {
        const data = google.visualization.arrayToDataTable(<?php echo json_encode($dataEntrada); ?>);

        const options = {
            title: 'Entradas',
            width: '100%',
            height: '100%'
        };

        const chart = new google.visualization.PieChart(document.getElementById('entradasGraf'));
        chart.draw(data, options);
    }
</script>
<script src="/financial/js/page_tab.js"></script>
</body>

</html>