<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register Sistem Informasi Peminjaman Toolkit</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('images/icons/favicon.ico'); ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/animate/animate.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/css-hamburgers/hamburgers.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/select2/select2.min.css'); ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<br><br><br><img src="<?php echo base_url('images/img-01.png" alt="IMG'); ?>">
				</div>

				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('Login/register'); ?>">
					<span class="login100-form-title">
						Member Register
					</span>
					<?php if ($this->session->flashdata('xwu')) { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><?php echo $this->session->flashdata('xwu'); ?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php } ?>

					<div class="wrap-input100 validate-input" data-validate="nim">
						<input class="input100" type="text" name="nim" placeholder="NIM">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="nama lengkap">
						<input class="input100" type="text" name="nama" placeholder="NAMA">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Nomor HP">
						<input class="input100" type="text" name="nomor_hp" placeholder="Nomor HP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-book" aria-hidden="true"></i>
						</span>
					</div>



					<div class="wrap-input100 validate-input" data-validate="Alamat Domisili">
						<input class="input100" type="text" name="alamat" placeholder="Alamat Domisili">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<input type="file" name="ktm" id="ktm" accept="image/png, image/jpeg, image/jpg, image/gif" size="500">

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>
					<div class="text-center p-t-126">
						<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						<a class="txt2" href="<?php echo base_url(''); ?>">
							Login

						</a>
					</div>

				</form>

			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('vendor/tilt/tilt.jquery.min.js'); ?>"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('js/main.js'); ?>"></script>

</body>

</html>