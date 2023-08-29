<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" >
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Sistem Informasi Akademik</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand" >
						<img src="assets/img/logo.png" alt="logo" >
					</div>
					<div class="jdl">
						<center>	
							<h4>SD NEGERI BATURAN 1</h4>
						</center>
					</div>
					<br>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<p></p>
							<form action="prosesLogin.php" method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="Username">Username</label>
									<input id="Username" type="text" class="form-control" name="username" value="" required autofocus autocomplete="off">
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
									</label>
									<input id="password" type="password" class="form-control" name="password" required >
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>
								<div class="form-group m-0">
									<button type="submit" name="login" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									@Copyright By SD Negeri Baturan 1 2022
								</div>
							</form>

						</div>
					</div>
					<br><br>
				</div>
			</div>
		</div>
	</section>
	<script src="assets/js/my-login.js"></script>
</body>
</html>
