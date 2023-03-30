<?php
require __DIR__ . '/includes/config.php';

// This file is used to delete an entry from the data table using the delete button on the attendance.php page, and using the id of that player

/*if (!$user->isAdmin()) {
    header('Location: login.php');
    exit;
}*/

// Delete data when form is submitted, using data from 'id' passed by the modal menu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $data = Data::find($id);
    if ($data) {
        $data->delete();
    } else {
        $data->delete();
    }
}



header('Location: attendance.php');
exit;


