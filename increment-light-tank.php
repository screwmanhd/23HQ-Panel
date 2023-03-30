<?php
require __DIR__ . '/includes/config.php';

if (!$user->isAdmin()) {
    header('Location: login.php');
    exit;
}

// Decrement data when form is submitted, using data from 'id' passed by the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = Data::find($_POST['id']);
    if ($data) {
        $data->incrementTanksDestroyedLight(); // Decrements the number of times the user has led a platoon using the Data::decrementTimesLeadingPlatoon() method
    }
}

header('Location: attendance.php');
exit;