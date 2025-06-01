<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Register</h2>
    <form action="index.php?action=register" method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="user">User</option>
            <option value="performer">Performer</option>
        </select>
        <button type="submit">Register</button>
    </form>
    <a href="index.php?action=login">Already have an account? Login</a>
</body>
</html>