<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?action=login');
    exit();
}
$success = $_GET['success'] ?? false;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личный кабинет - defaultuser0</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include __DIR__ . '/../menu.php'; ?>
    <div class="dashboard-container">
        <h1>Личный кабинет</h1>

        <?php if ($success): ?>
            <div class="alert success">Данные успешно обновлены</div>
        <?php endif; ?>

        <form class="profile-form" action="index.php?action=update_profile" method="POST">
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input type="text" name="username" id="username"
                    value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Новый пароль (оставьте пустым, если не хотите менять)</label>
                <input type="password" name="password" id="password" placeholder="Введите новый пароль">
            </div>

            <button type="submit" class="btn">Обновить данные</button>
        </form>

        <div class="dashboard-links">
            <a href="index.php?action=index" class="btn secondary">Вернуться на главную</a>
        </div>
    </div>
</body>

</html>
