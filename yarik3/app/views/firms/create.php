<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>defaultuser0</title>
</head>

<body>
    <form action="index.php?action=firmStore" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Name" required>
        <label for="description">Description:</label>
        <textarea name="description" placeholder="Description" required> </textarea>
        <button type="submit">Save</button>
    </form>
    <a href="index.php?action=index" class="link">Назад к каталогу</a>
</body>

</html>