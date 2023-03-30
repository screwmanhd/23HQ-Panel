<?php

require __DIR__ . '/includes/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Get the user from the database
    $user = User::find($username);

    // Check if the user exists
    if ($user) {
        // Check the password
        if (password_verify($password, $user->getPassword())) {
            // Creating the session
            $_SESSION['user'] = $user;
            // Redirect to the collections page
            header('Location: ' . LOGGED_IN_REDIRECT);
            die;
        } else {
            // Invalid password
            $error = 'Invalid password';
        }
    } else {
        // User doesn't exist
        $error = 'User doesn\'t exist';
    }
}
// If user is already logged in, redirect to the collections page
if (isset($_SESSION['user'])) {
    header('Location: collections.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>23HQ Secure Login</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<main class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold mb-4">Login</h1>
    <?php if (!empty($error)): // Hidden error message that appears if $error is populated ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <p class="error"><?php echo $error; ?></p>
        </div>
    <?php endif; ?>
    <form action="" method="post" class="flex flex-col items-center justify-center mt-4">
        <label for="username" class="mb-2">Username</label>
        <input type="text" name="username" id="username" class="mb-4 p-2 border border-gray-400 rounded"
               value="<?php echo $username ?? ''; ?>">
        <label for="password" class="mb-2">Password</label>
        <input type="password" name="password" id="password" class="mb-4 p-2 border border-gray-400 rounded">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</main>

</body>
</html>
