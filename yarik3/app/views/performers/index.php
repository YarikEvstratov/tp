<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Исполнители</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Исполнители</h2>
    <a href="index.php?action=create_performer">Добавить нового исполнителя</a>
    <table>
        <tr>
            <th>ФИО</th>
            <th>Описание</th>
            <th>Навыки</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($performers as $performer): ?>
            <tr>
                <td><?= htmlspecialchars($performer['fullname']) ?></td>
                <td><?= htmlspecialchars($performer['description']) ?></td>
                <td><?= htmlspecialchars($performer['skills']) ?></td>
                <td><a href="index.php?action=performer_show&id=<?= $performer['id'] ?>">Подробнее</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>