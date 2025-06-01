<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Исполнитель</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2><?= htmlspecialchars($performer['fullname']) ?></h2>
    <p>Описание: <?= htmlspecialchars($performer['description']) ?></p>
    <p>Навыки: <?= htmlspecialchars($performer['skills']) ?></p>
    <a href="index.php?action=chat&performer_id=<?= $performer['id'] ?>">Написать сообщение</a>
    <a href="index.php?action=performers">Назад к исполнителям</a>
</body>
</html>