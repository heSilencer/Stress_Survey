<?php
// Check if the choice parameter is set
if(isset($_POST['choice'])) {
    // Get the choice value
    $choice = $_POST['choice'];

    // Save the choice to the database or perform any other necessary action
    // Example: Insert into a database table
    // You should replace the database connection and query with your own logic
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stress_survey";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO choices (choice) VALUES ('$choice')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Choice saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
