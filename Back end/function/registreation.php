
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Dang ky </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="limiter">
	<div class="container-login100" style=" background: black ">
		<div class="wrap-login100" >
			<div class="login100-pic js-tilt" data-tilt>
				<img src="images/LOGO.jpg" alt="IMG">
			</div>

			<form class="login100-form validate-form" action ="handling Registreation.php" method='POST'>
				<span class="login100-form-title">
					Sign Up
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="txtUser" placeholder="UsersName">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
                    <i class="fa fa-user"></i>
					</span>
                </div>
                
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="txtEmail" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
                </div>
                
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="txtPass" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="txtPass2" placeholder="Confirm Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				
				<?php
					if (isset($_POST["btn_dangky"])) {
					//kết nối tới mySQL
					$conn = mysql_connect("localhost", "root", "") or die("không thể kết nối tới DataBase");
					mysql_select_db("project", $conn);

					//lấy thông tin từ các form bằng phương thức POST
					$password2 = $_POST["txtPass2"];
					$password1 = $_POST["txtPass"];
					$name = $_POST["txtUser"];
					$email = $_POST["txtEmail"];

						//kiểm tra email
						if (mysql_num_rows($query) == 0) {
							$sql2 = "INSERT INTO users( users_name, users_email, users_pass) 
									VALUES (N'$name', '$email', '$password')";

							// thực thi câu $sql với biến conn lấy từ file connection.php
							if (mysql_query($sql2)) {
								$_SESSION['namedk'] = $_POST["txtUser"];
								$_SESSION['emaildk'] = $_POST["txtEmail"];
								header('Location:../function/sendmails.php');
							} else {
								echo "Error: " . $sql2 . "<br>" . mysql_error($conn);
							} 
						}else {
							echo "Email này đã đăng ký tài khoản.<br/> Vui lòng sử dụng Email khác!";
						}		
					}	
				?>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="btn_dangky" >
                        Registration
					</button>
				</div>
				<div class="container-login100-form-btn">
						<a class="txt" href="../Login/login.php">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
			</form>
		</div>
	</div>
</div>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script src="js/main.js"></script>
<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="../js/main.js"></script>
</body>
</html>