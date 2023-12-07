<?php include("./mvc/views/partials/theme.php"); ?>

<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="p-2 bg2" style="height: 100vh;width: 320px;">
            <p class="ml-1 font-weight-bold cl" style="font-size: 130%">Dashboard</p>
            <div class="row m-0">
                <?php include("./mvc/views/partials/home-menu-account.php"); ?>
                <?php include("./mvc/views/partials/home-menu-item.php"); ?>
            </div>
        </div>

        <!-- Chart container -->
        <div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
            <div class="p-3">
                <!-- Add your charts here -->
                <div class="chart-container">
                    <div style="width: 48%; float: left;">
                        <canvas id="barChart" style="max-height: 300px;"></canvas>
                    </div>
                    <div style="width: 48%; float: right;">
                        <canvas id="pieChart" style="max-height: 300px;"></canvas>
                    </div>
                    <div style="width: 100%; float: left;">
                        <canvas id="areaChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!---Using CDN to show charts ---->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Function to generate random data for demonstration
    function generateRandomData(length) {
        return Array.from({
            length
        }, () => Math.floor(Math.random() * 100));
    }

    var barData = {
        labels: ['Table 1', 'Table 2', 'Table 3', 'Table 4', 'Table 5'],
        datasets: [{
            label: 'Discounts',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(255, 255, 255, 1)', // White line color
            borderWidth: 1,
            data: generateRandomData(5)
        }]
    };

    var pieData = {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        datasets: [{
            data: generateRandomData(7),
            backgroundColor: ['red', 'yellow', 'green', 'blue', 'purple', 'white', 'orange']
        }]
    };

    var areaData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Orders',
            data: generateRandomData(12),
            borderColor: 'rgba(0, 128, 0, 1)', // Green line color
            backgroundColor: 'rgba(0, 128, 0, 0.2)', // Green background color with transparency
            fill: true,
            tension: 0.3 // Controls the curvature of the line
        }]
    };

    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData
    });

    var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaData,
        options: {
            scales: {
                x: {
                    type: 'category', // Set x-axis type to 'category' for months
                    labels: areaData.labels // Provide labels for the x-axis
                }
            }
        }
    });

    // Update data every day (for demonstration purposes)
    setInterval(function() {
        barData.datasets[0].data = generateRandomData(5);
        pieData.datasets[0].data = generateRandomData(7);
        areaData.datasets[0].data = generateRandomData(12);

        barChart.update();
        pieChart.update();
        areaChart.update();
    }, 5000);
</script>