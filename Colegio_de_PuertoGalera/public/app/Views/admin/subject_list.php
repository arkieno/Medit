<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
</head>
<body>
    <h1>Add Subject</h1>
    
    <!-- Check if there's a success message -->
    <?php if (session()->has('success')): ?>
        <p style="color: green;"><?php echo session('success'); ?></p>
    <?php endif; ?>

    <!-- Form to add a new subject -->
    <form action="/subject_list/store" method="post">
        <label for="name">Subject Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <button type="submit">Save Subject</button>
    </form>
</body>
</html>
