<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?></title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1><?= htmlspecialchars($product['name']) ?></h1>
    <p>Description: <?= htmlspecialchars($product['description']) ?></p>
    <p>Price: <?= htmlspecialchars($product['price']) ?></p>
    <a href="index.php?action=index">Back to Products</a>
</body>
</html>
    