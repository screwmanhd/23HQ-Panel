<?php

// this file will prompt the user to enter a username which will be used for the new data entry, and will then create a new entry in the data table

require __DIR__ . '/includes/config.php';

if (!$user->isAdmin()) {
    header('Location: login.php');
    exit;
}

// Logic adding new data when form is submitted using the create() method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    // do not let username be empty
    if (empty($username)) {
        header('Location: newData.php');
        exit;
    }
    Data::create($username);
    header('Location: attendance.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Data</title>
    <link rel="stylesheet" href="css/normalize.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<!--title saying add new user in the top center-->
    <h1 class="text-6xl font-bold text-center top-0 pt-5 ">Add New User</h1>

    <!--Style similar to other pages using tailwindcss-->
    <div class="flex flex-col items-center justify-center h-screen pb-20">
        <div class="flex flex-col items-center justify-center w-1/2 h-1/3 bg-gray-200 rounded-lg">
            <form method="post" class="flex flex-col items-center justify-center">
                <label for="name" class="text-2xl font-bold text-center">Name</label>
                <input type="text" name="name" id="name" class="border-2 border-black rounded-md p-2">
                <button type="submit" class="text-2xl font-bold text-center mt-5">Add</button>
            </form>
        </div>
    </div>

        <!--back button top right-->
        <a href="attendance.php" class="text-2xl font-bold text-center absolute top-0 right-0 p-4">Back</a>

</body>
