<?php
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



function getTotalAgreed($conn) {
    $sql = "SELECT COUNT(*) AS total_agreed FROM choices WHERE status = 'Agreed'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total_agreed'];
}

function getTotalDeclined($conn) {
    $sql = "SELECT COUNT(*) AS total_declined FROM choices WHERE status = 'Declined'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total_declined'];
}

function getTotalRespondents($conn) {
    $sql = "SELECT COUNT(*) AS total_respondents FROM choices";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total_respondents'];
}

function getTotalStress($conn) {
    $sql = "SELECT COUNT(*) AS total_stress FROM survey_responses WHERE stress = 'yes'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total_stress'];
}

$totalAgreed = getTotalAgreed($conn);
$totalDeclined = getTotalDeclined($conn);
$totalRespondents = getTotalRespondents($conn);
$totalStress = getTotalStress($conn);


// Close database connection
$conn->close();
?>
