<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Faculty</title>
</head>
<body>
    <h1>Add New Faculty</h1>
    <form action="/faculty/store" method="post">
        <label for="id_no">ID No:</label>
        <input type="text" name="id_no" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>
        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" required><br>
        <label for="gender">Gender:</label>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="contact">Contact:</label>
        <input type="text" name="contact" required><br>
        <select name="gender" required>
            <option value="" selected disabled>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <button type="submit">Add</button>
    </form>
    <a href="/faculty">Back to Faculty List</a>
</body>
</html>
