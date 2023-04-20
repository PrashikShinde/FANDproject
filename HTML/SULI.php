<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<link href="CSS/SULI.css" rel="stylesheet">
	<title>FAND</title>
	<meta Access-Control-Allow-Origin="*">
</head>

<body id="logsign">
	<div class="logosect">
		<img class="logo" src="CSS/Images/FAND Logo.png" alt="FAND" width="200px">
	</div>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<form id="logsign" action="login.php" method="get">
											<div class="section text-center" id="loginform">
												<h4 class="mb-4 pb-3">Log In</h4>
												<div class="form-group">
													<input type="email" name="logemail" class="form-style"
														placeholder="Your Email" id="logemail" required><br>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style"
														placeholder="Your Password" id="logpass" required>
												</div>
												<button type="submit" class="btn mt-4" id="logbut">Log
													In</button><br>
												<p class="mb-0 mt-4 text-center"><a class="link" href='./forgotpass.php'
														id="fgp">Forgot your
														password?</a></p>
											</div>
										</form>
									</div>

								</div>
								<div class="card-back">
									<div class="center-wrap">
										<form id="logsign2" action="signup.php" method="post">
											<div class="section text-center" id="signupform">
												<h4 class="mb-4 pb-3">Sign Up</h4>
												<!-- <div class="form-group mt-2">
												<h6>User Type:</h6>
												<label for="signtypeo" class="form-check-label">Owner/Author</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" name="signtype" id="signtypeo" value="1" class="form-check-input" placeholder="Owner/Author" required>
												<label for="signtypeu">Common User</label>
												<input type="radio" name="signtype" id="signtypeu" value="2"  placeholder="Common User" required>
											</div> -->
												<div class="form-group">
													<input type="text" name="signfname" class="form-style"
														placeholder="Your First Name" id="signfname" required>
												</div>
												<div class="form-group mt-2">
													<input type="text" name="signlname" class="form-style"
														placeholder="Your Last Name	" id="signlname" required>
												</div>
												<div class="form-group mt-2">
													<input type="email" name="signemail" class="form-style"
														placeholder="Your Email" id="signemail" required>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="signpass" class="form-style"
														placeholder="Your Password" id="signpass" required
														pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
														title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
												</div>
												<div class="form-group mt-2">
													<input type="password" name="signconpass" class="form-style"
														placeholder="Confirm Password" id="signconpass" required>
												</div>
												<button type="submit" class="btn mt-4" id="sub">Sign
													Up</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
    error_reporting(E_ERROR | E_PARSE);

if ($_SESSION['sus'] == 1) {
	echo '<script>
            swal("Registration Successful!", "Kindly Log In!!", "success");
            </script>';
			$_SESSION['sus'] = 0;
			
} else if ($_SESSION['sus'] == 2) {
	echo '<script>
	swal("Password Mismatched!", "Use same password for confirmation!!", "warning");
	</script>';
	$_SESSION['sus'] = 0;
} else if ($_SESSION['sus']==3){
	echo  '<script>
	swal("User Already Exist!", "Kindly Login Using Same Credentials!!", "warning");
	</script>';
	$_SESSION['sus'] = 0;
}

if($_SESSION['lis']==2){
	echo  '<script>
	swal("Log In Failed!", "Kindly Login Using Same Credentials!!", "error");
	</script>';
	$_SESSION['lis'] = 0;
}
?>