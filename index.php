<?php
require __DIR__ . '/includes/config.php';
// Index page for the website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>23HQ PANEL</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body>
        <main class="flex flex-col items-center justify-center h-screen">
            <h1 class="text-6xl font-bold text-center absolute top-0 p-4">23rd HQ Panel</h1>
            <?php if ($user): // Checks if user is logged in, if he is this html code is displayed?>
                <h1 class="text-3xl font-bold text-center absolute top-0 left-0 p-4">
                    Welcome <?php echo $user->getUsername(); ?></h1>
                <h1 class="text-5xl font-bold text-center mb-5">Main Menu</h1>
                <div class="flex flex-col items-center justify-center">
                    <a href="/attendance.php" class="text-2xl font-bold text-center">Attendance</a>
                    <a href="https://www.google.com" class="text-2xl font-bold text-center">Placeholder2</a>
                    <a href="logout.php" class="text-2xl font-bold text-center mt-10">Logout</a>
                </div>
            <?php else: // Otherwise, this code is shown. This allows the same page to be used for logged in / non logged-in users,
                // which means that the user always lands on the index.php page.?>
                <div class="flex flex-col items-center justify-center">
                    <a href="login.php" class="text-2xl font-bold text-center">Login</a>
                </div>
            <?php endif; ?>
        </main>
    </body>
</html>
