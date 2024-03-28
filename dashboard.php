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

            body{
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
                background-image: linear-gradient(215deg,rgba(75, 113, 179, 0.8),rgba(124, 192, 147, 0.8)),url(/developers.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>
</head>
<body>
    <h1>Dashboard</h1>
    <div class="grid-container">
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
</body>
</html>
