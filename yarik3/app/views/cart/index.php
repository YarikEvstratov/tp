<?php include __DIR__ . '/../menu.php'; ?>
<h1>whoami</h1>
<table>
    <tr>
        <th>Товар</th>
        <th>Кол-во</th>
        <th>Цена</th>
        <th>Сумма</th>
    </tr>
    <?php foreach ($cartItems as $cartItem): ?>
        <tr>
            <td>
                <?php if (!empty($cartItem['images'])): ?>
                    <img src="<?= $cartItem['images'][0]['image_path'] ?>" alt="<?= $cartItem['images'][0]['image_name'] ?>">
                <?php else: ?>
                    <img src="../public/uploads/default.png" alt="Default Image">
                <?php endif; ?>
                <h2><?= $cartItem['name'] ?></h2>
                <p>Категория: <?= $cartItem['category_name'] ?></p>
                <p>Фижма: <?= $cartItem['firm_name'] ?></p>
                <p>Описание: <?= $cartItem['description'] ?></p>
            </td>
            <td>
                <form action="index.php?action=update-cart" method="post">
                    <input type="hidden" name="id" value="<?= $cartItem['id'] ?>">
                    <input type="number" name="quantity" value="<?= $cartItem['quantity'] ?>">
                    <button type="submit">Обновить</button>
                </form>
            </td>
            <td> <?= $cartItem['price'] ?></td>
            <td> <?= $cartItem['quantity'] * $cartItem['price'] ?></td>
            <td>
                <form action="index.php?action=delete-cart" method="post">
                    <input type="hidden" name="id" value="<?= $cartItem['id'] ?>">
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p>Общая сумма: <?= $this->getTotalSum() ?></p>