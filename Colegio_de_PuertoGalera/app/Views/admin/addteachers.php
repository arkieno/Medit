<!DOCTYPE html>
<html lang="en">
<head>
	<title>add teach</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets1/fonts1/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets1/fonts1/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets1/css1/util.css">
	<link rel="stylesheet" type="text/css" href="assets1/css1/main.css">
</head>
<body>
<div class="limiter">
		<div class="container-login100" style="background-image: url('assets1/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Add Teachers
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">
        <form method="post" action="/addteacher" enctype="multipart/form-data">
        <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="name" placeholder="name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
          <div class="wrap-input100 validate-input" data-validate="Designation">
						<input class="input100" type="designation" name="designation" placeholder="designation">
            <span class="focus-input100" data-placeholder="&#xf0c8;"></span>

					</div>
          <div class="col-md-6 mx-auto" style="max-width: 300px; margin-left: auto; margin-right: auto;">
                    <div class="form-group">
                        <label for="image"></label>
                        <input id="image" name="image" class="form-control" type="file" required>
                    </div>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="description">
						<input class="input100" type="description" name="description" placeholder="description">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
          <div class="container-login100-form-btn m-t-32">
    <button class="login100-form-btn custom-button">
        Submit
    </button>
</div>

      </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js1/main.js"></script>

</body>
</html>