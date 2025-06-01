<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>defaultuser0</title>
</head>

<body>
    <div class="firms">
        <button type="submit"><a href="index.php?action=firmCreate" class="link">Создать фирму</a></button>
        <?php
        foreach ($firms as $firm):
            ?>
            <a href="index.php?action=firmShow&id=<?= $firm['id'] ?>">
                <h2><?= $firm['name'] ?></h2>
                <h3><?= $firm['description'] ?></h3>
            </a>
            <form action="index.php?action=firmEdit&id=<?= $firm['id'] ?>" method="post" style="display:inline"><button
                    type="submit" onclick="return confirm('Are you sure?')">Изменить фирму</button></form>
            <form action="index.php?action=firmDestroy&id=<?= $firm['id'] ?>" method="post" style="display:inline"><button
                    type="submit" onclick="return confirm('Are you sure?')">Удалить фирму</button></form>
        <?php endforeach; ?>
    </div>
</body>

</html>