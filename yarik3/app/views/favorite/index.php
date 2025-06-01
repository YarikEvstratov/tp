<?php include __DIR__ . '/../menu.php'; ?>
<h1>defaultuser0</h1>

<table>
    <tr>
        <th>Товар</th>
        <th>Цена</th>
        <th>Сумма</th>
    </tr>
    <?php foreach ($favoriteItems as $favoriteItem): ?>
        <tr>
            <td>
                <?php if (!empty($favoriteItem['images'])): ?>
                    <img src="<?= $favoriteItem['images'][0]['image_path'] ?>"
                        alt="<?= $favoriteItem['images'][0]['image_name'] ?>">
                <?php else: ?>
                    <img src="public/uploads/default.jpg" alt="Default Image">
                <?php endif; ?>
                <h2><?= $favoriteItem['name'] ?></h2>
                <p>Категория: <?= $favoriteItem['category_name'] ?></p>
                <p>Фирма: <?= $favoriteItem['firm_name'] ?></p>
                <p>Описание: <?= $favoriteItem['description'] ?></p>
            </td>
            <td> <?= $favoriteItem['price'] ?></td>
            <td>
                <form action="index.php?action=delete-favorite" method="post">
                    <input type="hidden" name="id" value="<?= $favoriteItem['id'] ?>">
                    <button type="submit">Удалить</button>
                </form>
                <form action="index.php?action=add-favorite" method="post">
                    <input type="hidden" name="id" value="<?= $favoriteItem['id'] ?>">
                    <button type="submit">Добавить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>