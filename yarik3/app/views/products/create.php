<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Create Product</h2>
    <form action="index.php?action=create_product" method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="category_id" placeholder="Category ID" required>
        <input type="number" name="firm_id" placeholder="Firm ID" required>
        <button type="submit">Add Product</button>
    </form>
    <a href="index.php?action=index">Back to Products</a>
</body>
</html>
