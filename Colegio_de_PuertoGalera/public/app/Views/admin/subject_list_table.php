<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subject List</title>
</head>
<body>
    <h1>Subject List</h1>

    <!-- Display success message if any -->
    <?php if (session()->has('success')): ?>
        <p style="color: green;"><?php echo session('success'); ?></p>
    <?php endif; ?>

    <!-- Display error message if any -->
    <?php if (session()->has('error')): ?>
        <p style="color: red;"><?php echo session('error'); ?></p>
    <?php endif; ?>

    <!-- Table to display subjects -->
    <table border="1">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Actions</th> <!-- New column for edit/delete actions -->
            </tr>
        </thead>
        <tbody>
            <!-- Loop through subjects and display in table rows -->
            <?php foreach ($subjects as $subject): ?>
                <tr>
                    <td><?php echo esc($subject['name']); ?></td>
                    <td><?php echo esc($subject['description']); ?></td>
                    <td>
                        <!-- Edit button linking to the edit view -->
                        <a href="/subject_list/edit/<?php echo $subject['id']; ?>">Edit</a>

                        <!-- Delete button with confirmation -->
                        <form action="/subject_list/delete/<?php echo $subject['id']; ?>" method="post" style="display:inline;">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this subject?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Link to add a new subject -->
    <a href="/subject_list/create">Add New Subject</a>
</body>
</html>
