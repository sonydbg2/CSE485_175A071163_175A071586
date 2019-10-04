<!DOCTYPE html>
<html lang="en">
<head>
	<title> Dang ky </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
	<div class="container-login100" style=" background: black ">
		<div class="wrap-login100" >
			<div class="login100-pic js-tilt" data-tilt>
				<img src="images/LOGO.jpg" alt="IMG">
			</div>

			<form class="login100-form validate-form">
				<span class="login100-form-title">
					Sign Up
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="usersname" placeholder="UsersName">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
                    <i class="fa fa-user"></i>
					</span>
                </div>
                
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
                </div>
                
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="pass" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="pass" placeholder="Confirm Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
                <?php
					$Username = "abc"; // Khai báo username
					$Password = "abc123";      // Khai báo password
					$Email =" ";  // Khai báo email
					$server   = "localhost";   // Khai báo server
					$dbname   = "btl";      // Khai báo database

					// Kết nối database tintuc
					$connect = new mysqli($server, $Username, $Password,$Email, $dbname);

					//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
					if ($connect->connect_error) {
						die("Không kết nối :" . $conn->connect_error);
						exit();
					}

					//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
					$user_name = "";
					$email = "";
					$password = "";

					//Lấy giá trị POST từ form vừa submit
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if(isset($_POST["user_name"])) { $title = $_POST['user_name']; }
						if(isset($_POST["email"])) { $date = $_POST['email']; }
						if(isset($_POST["password"])) { $description = $_POST['password']; }

						//Code xử lý, insert dữ liệu vào table
						$sql = "INSERT INTO user ( user_name, email, password )
						VALUES ('$user_name', '$email', '$password')";

						if ($connect->query($sql) === TRUE) {
							echo "Thêm dữ liệu thành công";
						} else {
							echo "Error: " . $sql . "<br>" . $connect->error;
						}
					}
					//Đóng database
					$connect->close();
					?>		
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
                        Registration
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
	
	
</body>
</html>