<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Faculty List</h1>
        <!-- Add New Faculty Button -->
        <div class="mb-3">
            <a href="/faculty/create" class="btn btn-light">Add New Faculty</a>
        </div>
        <!-- Faculty Table -->
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID No</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faculty as $member): ?>
                <tr>
                    <td><?= $member['id_no']; ?></td>
                    <td><?= $member['last_name']; ?></td>
                    <td><?= $member['first_name']; ?></td>
                    <td><?= $member['middle_name']; ?></td>
                    <td><?= $member['email']; ?></td>
                    <td><?= $member['contact']; ?></td>
                    <td><?= $member['gender']; ?></td>
                    <td><?= $member['address']; ?></td>
                    <td>
                        <a href="/faculty/edit/<?= $member['id']; ?>" class="btn btn-light btn-sm">Edit</a>
                        <a href="/faculty/delete/<?= $member['id']; ?>" class="btn btn-light btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
