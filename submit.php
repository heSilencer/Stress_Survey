<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root"; // Default username for XAMPP MySQL
    $password = ""; // Default password for XAMPP MySQL
    $database = "stress_survey"; // Change this to your database name

    $conn = new mysqli($servername, $username, $password, $database);
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the keys exist in $_POST before accessing them
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    // Check if a survey with the same email or name already exists
    $checkQuery = "SELECT * FROM survey_responses WHERE email = ? OR name = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $email, $name);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Survey with the same email or name already exists
        $checkStmt->close();
        $conn->close();
        echo '<script>alert("You have already submitted a survey with this email or name. You cannot take the survey again."); window.location.href = "index.html";</script>';
        exit();
    }


    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO survey_responses (name, email, age, role, year_level, gender, status, stress, experience, affect, sources, coping, effective, important, seek, attended) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $name, $email, $age, $role, $year_level, $gender, $status, $stress, $experience, $affect, $sources, $coping, $effective, $important, $seek, $attended);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $role = $_POST['role'];
    $year_level = $_POST['year_level']; // Note: make sure to add the 'year_level' field in your HTML form
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $stress = $_POST['stress'];
    $experience = $_POST['experience'];
    $affect = $_POST['affect'];
    $sources = $_POST['sources'];
    $coping = $_POST['coping'];  
    $effective = $_POST['effective'];
    $important = $_POST['important'];
    $seek = $_POST['seek'];
    $attended = $_POST['attended'];


    // Execute the SQL statement
    if ($stmt->execute()) {
        // Close statement and database connection
        $stmt->close();
        $conn->close();
        echo '<script>alert("New record created successfully"); window.location.href = "index.html";</script>';
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    // Redirect to the form page if the form is not submitted
    header("Location: index.html");
    exit;
}
?>
