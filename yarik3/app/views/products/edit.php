<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Edit Product</h2>
    <form action="index.php?action=edit&id=<?= $product['id'] ?>" method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea>
        <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
        <input type="number" name="category_id" value="<?= htmlspecialchars($product['category_id']) ?>" required>
        <input type="number" name="firm_id" value="<?= htmlspecialchars($product['firm_id']) ?>" required>
        <button type="submit">Save Changes</button>
    </form>
    <a href="index.php?action=index">Back to Products</a>
</body>
</html>
