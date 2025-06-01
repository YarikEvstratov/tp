<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Chat</h2>
    <div class="messages">
        <?php foreach ($chats as $chat): ?>
            <div class="message">
                <strong><?= htmlspecialchars($chat['user_details']['fullname']) ?>:</strong>
                <p><?= htmlspecialchars($chat['message']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <form action="index.php?action=send_message" method="POST">
        <input type="hidden" name="performer_id" value="<?= $performer_id ?>">
        <textarea name="message" placeholder="Your message" required></textarea>
        <button type="submit">Send</button>
    </form>

    <a href="index.php?action=performers">Back to Performers</a>
</body>
</html>
