<?php

ini_set('display_errors', 1);
// This file is included by all other files in the application, and makes sure that the user
// is logged in (otherwise he is redirected to the login page). It also includes the database
// connection file, and makes sure all classes are loaded (so they can be used in other files).

require __DIR__ . '/classes/Database.php';
require __DIR__ . '/classes/User.php';
require __DIR__ . '/classes/Data.php';

const LOGGED_IN_REDIRECT = '/index.php';

ini_set('display_errors', 1);
session_start();

// Redirect if user is not logged in, and we are not on the index page or register page
if (!isset($_SESSION['user']) && !in_array($_SERVER['REQUEST_URI'], ['/login.php', '/register.php', '/'])) {
    header('Location: /login.php');
    exit;
}

// Redirect if user is logged in, and we are on the index page
if (isset($_SESSION['user']) && $_SERVER['REQUEST_URI'] === '/login.php') {
    header('Location: ' . LOGGED_IN_REDIRECT);
    die;
}

/** @var User $user */
$user = $_SESSION['user'] ?? null;