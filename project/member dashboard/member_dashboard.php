<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="member_d.css">
</head>
<body>
    <div class="container">
        <h2>Member Feature Panel</h2>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php endif; ?>

        <form action="process_member_d.php" method="POST">
            <label for="title">Feature Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>
