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

// Fetch data from the database for stress sources
$sql = "SELECT sources FROM survey_responses";
$result = $conn->query($sql);

// Initialize an array to store the count of each source
$sourcesCount = array(
    "Work" => 0,
    "School" => 0,
    "Relationships" => 0,
    "Finances" => 0,
    "Health" => 0,
    "Daily hassles" => 0,
    "Family" => 0
);

// Process fetched data and count occurrences of each source
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sources = explode(",", $row['sources']);
        foreach ($sources as $source) {
            $source = trim($source);
            if (array_key_exists($source, $sourcesCount)) {
                $sourcesCount[$source]++;
            }
        }
    }
}

// Calculate percentages for each source
$sourcesPercent = array();
foreach ($sourcesCount as $source => $count) {
    $percent = ($count / $totalRespondents) * 100;
    $sourcesPercent[$source] = $percent;
}
$sql = "SELECT year_level, COUNT(*) AS stress_count FROM survey_responses WHERE stress = 'Yes' GROUP BY year_level";
$result = $conn->query($sql);

// Initialize an array to store stress counts by course
$courseStressData = array();

// Process fetched data and store in $courseStressData array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courseStressData[$row['year_level']] = $row['stress_count'];
    }
}
// Close database connection
$conn->close();
?>
