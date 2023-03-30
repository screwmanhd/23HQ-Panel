<?php
require __DIR__ . '/includes/config.php';

$conn = Database::getConnection();


// Creating a default player in the data table
echo "Creating default player in data table...\n";
$sql = "INSERT INTO data (username) VALUES ('mandemina')";

if ($conn->query($sql) !== FALSE) {
    echo "Default player created" . PHP_EOL;
} else {
    echo "Error creating default player: " . $conn->error . PHP_EOL;
}

//return to attendance.php
header("Location: attendance.php");