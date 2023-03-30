<?php
// Destroys the session, thereby setting $_SESSION['user'] to null, which means the website
// will no longer think the user is logged in
session_start();
session_destroy();
header('Location: /');
exit;