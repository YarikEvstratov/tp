<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>defaultuser0</title>
</head>

<body>
    <h1>Имя: <?= $firm['name'] ?></h1>
    <h2>Описание: <?= htmlspecialchars($firm['description']) ?></h2>
    <a href="index.php?action=index" class="link">Назад к каталогу</a>
</body>

</html>