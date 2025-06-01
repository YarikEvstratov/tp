<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>defaultuser0</title>
</head>

<body>
    <?php include __DIR__ . '/../menu.php'; ?>
    <form action="index.php?action=firmUpdate&id=<?= $firm['id'] ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $firm['name'] ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" required><?= $firm['description'] ?></textarea>
        <button type="submit">Save</button>
    </form>
    <a href="index.php?action=index">Назад к каталогу</a>
</body>

</html>