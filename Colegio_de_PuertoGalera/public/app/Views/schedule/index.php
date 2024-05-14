<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class Schedule</title>
    <!-- Load Bootstrap and FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Georgia:wght@400;700&display=swap">
    
    <style>
        .small-button {
            width: 80px;
            height: 35px;
        }
        .large-button {
            width: 100px;
            height: 45px;
        }
        .table-striped th,
        .table-striped td {
            border-right: 1px solid #ccc; /* Create vertical lines between columns */
        }
        /* To remove the last border-right */
        .table-striped th:last-child,
        .table-striped td:last-child {
            border-right: none;
        }
        h1 {
            font-family: 'Pacifico', cursive; /* Use script font */
        }
        .custom-modal-dialog {
            max-width: 500px; /* Restricting the width for a minimalist look */
        }

        .modal-header,
        .modal-footer {
            border: none; /* Removing border for a clean look */
        }

        .modal-title {
            font-weight: 500; /* Slightly less bold title */
        }

        .btn {
            border-radius: 20px; /* Soft rounded corners */
        }

        .form-control {
            border-radius: 10px; /* Softer input field borders */
        }

        /* Minimalist color scheme */
        .modal-content {
            background-color: #f5f5f5; /* Soft background color */
        }

        .btn-primary {
            background-color: #4a90e2; /* Soft blue color for primary buttons */
            border: none; /* No border for a minimalist look */
        }

        .btn-secondary {
            background-color: #aaa; /* Gray color for secondary buttons */
            border: none; /* No border */
        }
            /* Apply the slab font to the entire body, or specifically to the table */
        body {
            font-family: 'Georgia', serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
        <?php if (session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success'); ?>
        </div>
        <?php endif; ?>

    <div class="container mt-4">
        <h1 class="mb-4">Class Schedule</h1>
   
        <!-- Button to open modal for creating a new schedule -->
        <button class="btn btn-light mb-4" data-toggle="modal" data-target="#addScheduleModal">
            <i class="fas fa-plus"></i> Add New Schedule
        </button>
        <div class="button-container mb-4" style="text-align: right;">
      <button class="btn btn-light filter-btn" data-filter="all">
      <a href="/history" style="color: gray;"> 
  <i class="fas fa-history"></i> History Log
</a>

      </button>
        </div>


        <div>
        <hr style="margin-top: 20px; border: 1px solid #ccc;">
        </div>
        
        <!-- Modal for creating a new schedule -->
 <!-- Modal for creating a new schedule -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Create a New Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for creating a new schedule -->
                <form action="/schedule/create" method="post">
                    <div class="form-group">
                        <label for="faculty_name">Faculty</label>
                        <input type="text" name="faculty_name" id="faculty_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="days_of_week">Days of Week</label>
                        <input type="text" name="days_of_week" id="days_of_week" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Subjects</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="time_from">Time From</label>
                        <input type="time" name="time_from" id="time_from" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="time_to">Time To</label>
                        <input type="time" name="time_to" id="time_to" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sem">Semester</label>
                        <input type="text" name="sem" id="sem" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="schedule_type">Course Year Section</label>
                        <select name="schedule_type" id="schedule_type" class="form-control" required>
                            <option value="" disabled selected>Select</option>
                            <option value="bstm">BSTM</option>
                            <option value="bsoa">BSOA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Room</label>
                        <input type="text" name="room" id="room" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        <!-- Filter buttons -->
        <div class="button-container mb-4">
            <button class="btn btn-light filter-btn" data-filter="all">ALL</button>
            <button class="btn btn-light filter-btn" data-filter="bstm">BSTM</button>
            <button class="btn btn-light filter-btn" data-filter="bsoa">BSOA</button>
        </div>
         
        <!-- Search bar for filtering schedules -->
        <input type="text" id="searchFaculty" placeholder="Search by Faculty" class="form-control mb-4" style="width: 200px; height: 35px;">

        <!-- Table displaying class schedules -->
        <table class="table table-striped" id="scheduleTable">
        <thead class="thead-success">
                <tr>
                    <th>Day</th>
                    <th>Teachers</th>
                    <th>Subjects</th>
                    <th>Time</th>
                    <th>Room</th>
                    <th>Semester</th>
                    <th>Course Year Section</th>
                    <th>Description</th>
                    <th>Action</th> <!-- For editing -->
                    <th>Action</th> <!-- For deleting -->
                </tr>
            </thead>
            <tbody>
                <!-- Loop through schedules and display each entry -->
                <?php foreach ($schedules as $schedule): ?>
                    <?php $days = explode(",", $schedule['days_of_week']); ?>
                    <?php foreach ($days as $day): ?>
                        <tr data-id="<?= esc($schedule['id']) ?>" data-schedule-type="<?= esc($schedule['schedule_type']) ?>">
                            <td><?= esc(trim($day)) ?></td>
                            <td><?= esc($schedule['faculty_name']) ?></td>
                            <td><?= esc($schedule['title']) ?></td>
                            <td><?= esc($schedule['time_from']) ?> - <?= esc($schedule['time_to']) ?></td>
                            <td><?= esc($schedule['room']) ?></td>
                            <td><?= esc($schedule['sem']) ?></td>
                            <td><?= esc($schedule['schedule_type']) ?></td>
                            <td><?= esc($schedule['description']) ?></td>
                            <td>
                                <button class="btn btn-light" data-toggle="modal" data-target="#editScheduleModal-<?= esc($schedule['id']) ?>">Edit</button>
                            </td>
                            <td>
                                <button class="btn btn-light btn-delete" data-id="<?= esc($schedule['id']) ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php foreach ($schedules as $schedule): ?>
            <div class="modal fade" id="editScheduleModal-<?= esc($schedule['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel-<?= esc($schedule['id']) ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form to edit the schedule -->
                            <form action="/schedule/update/<?= esc($schedule['id']) ?>" method="post">
                                <div class="form-group">
                                    <label for="faculty_name">Faculty</label>
                                    <input type="text" name="faculty_name" value="<?= esc($schedule['faculty_name']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="days_of_week">Days of Week</label>
                                    <input type="text" name="days_of_week" value="<?= esc($schedule['days_of_week']) ?>" class="form-control" required>
                                </div>
                                <div class form-group">
                                    <label for="title">Subjects</label>
                                    <input type="text" name="title" value="<?= esc($schedule['title']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time_from">Time From</label>
                                    <input type="time" name="time_from" value="<?= esc($schedule['time_from']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time_to">Time To</label>
                                    <input type="time" name="time_to" value="<?= esc($schedule['time_to']) ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label for="sem">Semester</label>
                                    <input type="text" name="sem" value="<?= esc($schedule['sem']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="schedule_type">Course Year Section</label>
                                    <select name="schedule_type" class="form-control" required>
                                        <option value="bstm" <?= ($schedule['schedule_type'] === "bstm") ? 'selected' : '' ?>>BSTM</option>
                                        <option value="bsoa" <?= ($schedule['schedule_type'] === "bsoa") ? 'selected' : '' ?>>BSOA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="room">Room</label>
                                    <input type="text" name="room" value="<?= esc($schedule['room']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="<?= esc($schedule['description']) ?>" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Schedule</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Update Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Schedule updated successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

    <!-- Modal for delete confirmation -->
    <div class="modal fade" id="deleteScheduleModal" tabindex="-1" role="dialog" aria-labelledby="deleteScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteScheduleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this schedule?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to filter the table based on the selected schedule type
            function filterTable(filterType) {
                $('#scheduleTable tbody tr').each(function() {
                    var scheduleType = $(this).data('schedule-type').toLowerCase();
                    if (filterType === 'all' || scheduleType === filterType) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Handle filter button clicks
            $('.filter-btn').click(function() {
                var filterType = $(this).data('filter').toLowerCase();
                filterTable(filterType);
            });

            // Search functionality
            $('#searchFaculty').on('input', function() {
                var searchQuery = $(this).val().toLowerCase();
                $('#scheduleTable tbody tr').each(function() {
                    var facultyName = $(this).find('td:nth-child(2)').text().toLowerCase();
                    if (facultyName.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // Handle delete button clicks
            var deleteId;
            $('.btn-delete').click(function() {
                deleteId = $(this).data('id');
                $('#deleteScheduleModal').modal('show');
            });

            // Confirm delete in the modal
            $('#confirmDelete').click(function() {
                $.ajax({
                    url: '/schedule/delete/' + deleteId,
                    type: 'DELETE',
                    success: function() {
                        // Remove the corresponding row from the table
                        $('#scheduleTable tbody tr[data-id="' + deleteId + '"]').remove();
                        $('#deleteScheduleModal').modal('hide');
                    },
                    error: function() {
                        console.log('An error occurred while deleting.');
                    }
                });
            });
        });
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Check if the 'update_success' flash data is set
    <?php if (session()->has('update_success')): ?>
        // Show the success modal
        $('#successModal').modal('show');
    <?php endif; ?>
});
</script>
</body>
</html>