<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<h1>Welcome to the Social Network & Marketplace</h1>
<a href="index.php">Home</a>
    <?php
        if (!isset($_COOKIE['id'])) {
            echo "    
            <p>This is the home page. Please log in or register to continue.</p>
            <a href='index.php?action=login'>Login</a>
            <a href='index.php?action=register'>Register</a>";
        } else {
            echo "<div class='regandauth'>
                <a href='index.php?action=cart'>Cart</a>
                <a href='index.php?action=logout'>Logout</a>
                <a href='index.php?action=chat'>Chat</a>
            </div>";
            if ($_SESSION['role'] == 'performer' && isset($_COOKIE['id'])) {
                echo "<a href='index.php?action=admin'>Admin Panel</a>";
            } elseif (isset($_COOKIE['id'])) {
                echo "<a href='index.php?action=user_dashboard'>User  Panel</a>";
            };
        }
    ?>
</body>
</html>
