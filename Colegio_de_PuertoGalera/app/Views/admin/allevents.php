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
	<link rel="stylesheet" href="assets1/css/style.css"> 

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wCz5sflITx2au2+SS+OgPbifvzI/q0fMxzCGVoN6NsdEhQ9x5PVnIC1tgsz7O1f6PCiDjUr14GV2N8Z9BZZGyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--color css-->
    <link rel="stylesheet" id="triggerColor" href="assets/css/triggerplate/color-0.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
	<!-- topbar -->
<?= $this->include('include/topbar.php') ?>


<!-- sidebar -->
<?= $this->include('include/sidebar.php') ?>

<div class="event-area pt--120 pb--80">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="section-title-style2 black-title text-center">
                
                    <h1>Events</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-12">
                    <div class="media align-items-center mb-5">
                        <div class="media-head primary-bg">
                            <span><?= date('M d', strtotime($event['event_date'])) ?></span>
                            <p><?= date('Y', strtotime($event['event_date'])) ?></p>
                        </div>
                        <div class="media-body">
                            <h4><a href="#"><?= $event['event_name'] ?></a></h4>
                            <p><?= $event['event_description'] ?></p>
                            <p>
                                <i class="fa fa-clock-o"></i>
                                <?= date('h:i A', strtotime($event['event_start_time'])) ?> - <?= date('h:i A', strtotime($event['event_end_time'])) ?>
                            </p>
                        </div>
                    </div> <!-- media -->
                </div><!-- col-md-12 -->
            <?php endforeach; ?>
        </div><!-- row -->
    </div><!-- container -->
</div>


	<script src="assets1/js/jquery-3.5.1.min.js"></script>
	<script src="assets1/js/popper.min.js"></script>
	<script src="assets1/js/bootstrap.min.js"></script>
	<script src="assets1/js/moment.min.js"></script>
	<script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets1/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets1/js/script.js"></script>
	<script>S
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});
	</script>
</body>

</html>