
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets1/img/favicon.png">
	<link rel="stylesheet" href="assets1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets1/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets1/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets1/css/feathericon.min.css">
	<link rel="stylesheet" href="assets1/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="assets1/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets1/css/style.css"> </head>

<body>
	<!-- topbar -->
<?= $this->include('include/topbar.php') ?>


<!-- sidebar -->
<?= $this->include('include/sidebar.php') ?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Add Event</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="/eventStore" enctype="multipart/form-data">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Event Name</label>
                                <input class="form-control" type="text" name="event_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="cal-icon">
                                    <input type="date" class="form-control" name="event_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Time Range</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="time-icon">
                                            <input type="time" class="form-control" name="event_start_time" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="time-icon">
                                            <input type="time" class="form-control" name="event_end_time" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="5" name="event_description" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Add Event</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



	<script src="assets1/js/jquery-3.5.1.min.js"></script>
	<script src="assets1/js/popper.min.js"></script>
	<script src="assets1/js/bootstrap.min.js"></script>
	<script src="assets1/js/moment.min.js"></script>
	<script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets1/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets1/js/script.js"></script>
	<script>
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});
	</script>
</body>

</html>