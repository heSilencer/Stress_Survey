<?php
// Check if the status parameter is set in the URL
if (isset($_GET['status'])) {
    // Get the status from the URL parameter
    $status = $_GET['status'];

    // Establish database connection
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $database = "stress_survey"; // Your database name
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert agreement status
    $stmt = $conn->prepare("INSERT INTO choices (status) VALUES (?)");
    $stmt->bind_param("s", $status);

    // Execute SQL statement
    if ($stmt->execute()) {
        if ($status == 'Agreed') {
            header("Location: index3.php"); // Redirect to index3.php if agreed
            exit;
        } elseif ($status == 'Declined') {
            header("Location: thankyou.php"); // Redirect to thankyou.php if declined
            exit;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If status parameter is not set, redirect to the terms and conditions page
    header("Location: index.html");
    exit;
}
?>
