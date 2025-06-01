<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мои жалобы</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h2>Мои жалобы</h2>
    <table>
        <tr>
            <th>Название учреждения</th>
            <th>Описание</th>
            <th>Статус</th>
        </tr>
        <?php foreach ($complaints as $complaint): ?>
            <tr>
                <td><?= htmlspecialchars($complaint['institution_name']) ?></td>
                <td><?= htmlspecialchars($complaint['description']) ?></td>
                <td><?= htmlspecialchars($complaint['status']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?action=create_complaint">Создать новую жалобу</a>
</body>

</html>