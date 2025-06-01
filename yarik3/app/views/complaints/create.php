<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Complaint</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Create Complaint</h2>
    <form action="index.php?action=create_complaint" method="POST">
        <input type="text" name="institution_name" placeholder="Institution Name" required>
        <textarea name="description" placeholder="Complaint Description" required></textarea>
        <button type="submit">Submit Complaint</button>
    </form>
    <a href="index.php?action=complaints">Back to Complaints</a>
</body>
</html>