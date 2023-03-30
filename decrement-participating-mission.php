<?php


require __DIR__ . '/includes/config.php';

if (!$user->isAdmin()) {
    header('Location: login.php');
    exit;
}

// Checks if the value is already 0, and if it is, it will give an error message using a JavaScript alert
// Else, decrements data when form is submitted, using data from 'id' passed by the form

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = Data::find($_POST['id']);
    if ($data) {
        if ($data->getTimesParticipatingMission() == 0) {
            echo "<script type='text/javascript'>alert('Cannot decrement below 0');</script>";
        } else {
            $data->decrementTimesParticipatingMission(); // Decrements the number of times the user has led a platoon using the Data::decrementTimesLeadingPlatoon() method
        }
    }
}

header('Location: attendance.php');
exit;