<?php
ini_set('display_errors', 1);
header('Content-Type: text/plain');
// This file is used to create all the tables in the database 'app'
// WARNING: This file should only be run once

// When this file is ran, it will create a new file called run_once.txt, which will prevent this file from being run again
// If you want to run this file again, you will need to delete the run_once.txt file

if (file_exists('run_once.txt')) {
    echo "                          𝙏𝙝𝙞𝙨 𝙛𝙞𝙡𝙚 𝙝𝙖𝙨 𝙖𝙡𝙧𝙚𝙖𝙙𝙮 𝙗𝙚𝙚𝙣 𝙧𝙪𝙣. 𝙄𝙛 𝙮𝙤𝙪 𝙬𝙖𝙣𝙩 𝙩𝙤 𝙧𝙪𝙣 𝙞𝙩 𝙖𝙜𝙖𝙞𝙣, 𝙮𝙤𝙪 𝙬𝙞𝙡𝙡 𝙣𝙚𝙚𝙙 𝙩𝙤 𝙙𝙚𝙡𝙚𝙩𝙚 𝙩𝙝𝙚 𝙧𝙪𝙣_𝙤𝙣𝙘𝙚.𝙩𝙭𝙩 𝙛𝙞𝙡𝙚
                          𝙏𝙝𝙞𝙨 𝙛𝙞𝙡𝙚 𝙝𝙖𝙨 𝙖𝙡𝙧𝙚𝙖𝙙𝙮 𝙗𝙚𝙚𝙣 𝙧𝙪𝙣. 𝙄𝙛 𝙮𝙤𝙪 𝙬𝙖𝙣𝙩 𝙩𝙤 𝙧𝙪𝙣 𝙞𝙩 𝙖𝙜𝙖𝙞𝙣, 𝙮𝙤𝙪 𝙬𝙞𝙡𝙡 𝙣𝙚𝙚𝙙 𝙩𝙤 𝙙𝙚𝙡𝙚𝙩𝙚 𝙩𝙝𝙚 𝙧𝙪𝙣_𝙤𝙣𝙘𝙚.𝙩𝙭𝙩 𝙛𝙞𝙡𝙚
                          𝙏𝙝𝙞𝙨 𝙛𝙞𝙡𝙚 𝙝𝙖𝙨 𝙖𝙡𝙧𝙚𝙖𝙙𝙮 𝙗𝙚𝙚𝙣 𝙧𝙪𝙣. 𝙄𝙛 𝙮𝙤𝙪 𝙬𝙖𝙣𝙩 𝙩𝙤 𝙧𝙪𝙣 𝙞𝙩 𝙖𝙜𝙖𝙞𝙣, 𝙮𝙤𝙪 𝙬𝙞𝙡𝙡 𝙣𝙚𝙚𝙙 𝙩𝙤 𝙙𝙚𝙡𝙚𝙩𝙚 𝙩𝙝𝙚 𝙧𝙪𝙣_𝙤𝙣𝙘𝙚.𝙩𝙭𝙩 𝙛𝙞𝙡𝙚" . PHP_EOL . PHP_EOL;
    echo '𝐈𝐟 𝐲𝐨𝐮 𝐚𝐫𝐞 𝐦𝐚𝐥𝐢𝐜𝐢𝐨𝐮𝐬𝐥𝐲 𝐭𝐫𝐲𝐢𝐧𝐠 𝐭𝐨 𝐫𝐮𝐧 𝐭𝐡𝐢𝐬 𝐟𝐢𝐥𝐞 𝐚𝐠𝐚𝐢𝐧, 𝐤𝐢𝐧𝐝𝐥𝐲 𝐬𝐭𝐨𝐩.' . PHP_EOL;;
    echo PHP_EOL  . PHP_EOL . PHP_EOL;;
    exit;
} else {
    $file = fopen('run_once.txt', 'w');
}

// Include the database connection
require_once __DIR__ . '/includes/classes/Database.php';
$conn = Database::getConnection();

echo "Creating tables..." . PHP_EOL;

// Creating the users table
$conn->query("DROP TABLE IF EXISTS users");

$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    permission INT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== FALSE) {
    echo "Table users created successfully" . PHP_EOL;
} else {
    echo "Error creating table: " . $conn->error . PHP_EOL;
}

// Creating the default admin user
echo "Creating default admin user...\n";
$hashed_password = password_hash('Adminpw123', PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username, password, permission) VALUES ('admin', '$hashed_password', 1)";
if ($conn->query($sql) !== FALSE) {
    echo "Admin user created successfully with password Adminpw123" . PHP_EOL;
} else {
    echo "Error creating admin user: " . $conn->error . PHP_EOL;
}


/* number of times leading a platoon, number of times in a position of leadership, number of times commanding a tank,
number of times participating in a paradrop, number of times participating as an infantryman, number of times surviving a whole mission,number of tanks
destroyed as an infantryman, number of tanks destroyed as a tank gunner or with an at gun, number of times being a tank driver, number of times
being a tank crewman, and the number of missions participated in.*/

/* the attendance data will be stored in a database, and will be shared with all users. the attendance data will be stored in a table called data */

// Creating the data table
$conn->query("DROP TABLE IF EXISTS data");

$sql = "CREATE TABLE data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    times_leading_platoon INT(6) NOT NULL DEFAULT 0,
    times_as_leadership INT(6) NOT NULL DEFAULT 0,
    times_commanding_tank INT(6) NOT NULL DEFAULT 0,  
    times_participating_paradrop INT(6) NOT NULL DEFAULT 0,
    times_participating_infantryman INT(6) NOT NULL DEFAULT 0,
    times_surviving_whole_mission INT(6) NOT NULL DEFAULT 0,
    tanks_destroyed_light INT(6) NOT NULL DEFAULT 0,
    tanks_destroyed_heavy INT(6) NOT NULL DEFAULT 0,
    times_being_tank_driver INT(6) NOT NULL DEFAULT 0,
    times_being_tank_crewman INT(6) NOT NULL DEFAULT 0,
    times_participating_mission INT(6) NOT NULL DEFAULT 0 )";

if ($conn->query($sql) !== FALSE) {
    echo "Table data created successfully" . PHP_EOL;
} else {
    echo "Error creating table: " . $conn->error . PHP_EOL;
}

// Creating a default player in the data table
echo "Creating default player in data table...\n";
$sql = "INSERT INTO data (username) VALUES ('mandem')";

$conn->query($sql);
if ($conn->query($sql) !== FALSE) {
    echo "Default player created" . PHP_EOL;
} else {
    echo "Error creating default player: " . $conn->error . PHP_EOL;
}


echo "Done!\n";