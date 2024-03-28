<?php include 'DisplaySql.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
   

   .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .card {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1 1 300px; /* Adjust width as needed */
        }

        .card h2 {
            color: #333;
        }

        .count {
            font-size: 24px;
            margin-top: 10px;
            font-weight: bold;
        }

        /* CSS for chart container */
        #chartContainer {
            width: 300px; /* Adjust width as needed */
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* CSS for chart title */
        #chartTitle {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        #barChartTitle {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        #barchartContainer {
            width: 300px; /* Adjust width as needed */
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
            /* body{
            font-family: 'Poppins',sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.4;
            color: var(--color-white);
            margin: 0;
            }
            body::before{
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                z-index: -1;
                background: var(--color-darkblue);
                background-image: linear-gradient(215deg,rgba(75, 113, 179, 0.8),rgba(124, 192, 147, 0.8));
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
         */
        </style>
</head>
<body>
    <h1>Dashboard</h1>
    <div class="grid-container">
        <!-- Cards for total statistics -->
        <div class="card">
            <h2>Total Agreed</h2>
            <div class="count"><?php echo $totalAgreed; ?></div>
        </div>
        <div class="card">
            <h2>Total Declined</h2>
            <div class="count"><?php echo $totalDeclined; ?></div>
        </div>
        <div class="card">
            <h2>Total Respondents</h2>
            <div class="count"><?php echo $totalRespondents; ?></div>
        </div>
        <div class="card">
            <h2>Total Stress</h2>
            <div class="count"><?php echo $totalStress; ?></div>
        </div>
    </div>
   
    <!-- Chart container for pie chart -->
    <div id="chartContainer">
        <div id="chartTitle">Main Sources of Stress</div>
        <canvas id="stressChart"></canvas>
    </div>

    <!-- Chart container for bar chart -->
    <div id="barChartContainer">
        <div id="barChartTitle">Stress Levels by Course</div>
        <canvas id="courseStressChart"></canvas>
    </div>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // JavaScript code for creating pie chart (existing code)
             // Data for the pie chart
        var data = {
            labels: ["Work", "School", "Relationships", "Finances", "Health", "Daily hassles", "Family"],
            datasets: [{
                data: [<?php echo implode(",", $sourcesPercent); ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)',
                    'rgba(100, 149, 237, 0.8)'
                ]
            }]
        };

        // Configuration for the pie chart
        var options = {
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = ((currentValue / total) * 100).toFixed(2);         
                            return percentage + "%";
                    }
                }
            }
        };

        // Get the canvas element
        var ctx = document.getElementById('stressChart').getContext('2d');

        // Create the pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
        // JavaScript code for creating bar chart
        var courseStressData = <?php echo json_encode($courseStressData); ?>;

        var courseNames = Object.keys(courseStressData);
        var stressCounts = Object.values(courseStressData);

        var barChartData = {
            labels: courseNames,
            datasets: [{
                label: 'Number of Stressed Students',
                data: stressCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var barChartOptions = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        var barCtx = document.getElementById('courseStressChart').getContext('2d');
        var barChart = new Chart(barCtx, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    </script>

</body>
</html>