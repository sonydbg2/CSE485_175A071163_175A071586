<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
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
	<div class="container-login100" style=" background: black " >
		<div class="wrap-login100" >
			<div class="login100-pic js-tilt" data-tilt>
				<img src="images/LOGO.jpg" alt="IMG">
			</div>

			<div class="login100-form validate-form">
				<span class="login100-form-title">
					LOGIN
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" name="pass" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<form action="dangky.php" method="post">
					<div class="container-login100-form-btn">
					<p id='demo'></p>
						<button class="login100-form-btn" >
							Login
						</button>
					</div>
				</form>
				<?php
					$username = "user_tintuc"; // Khai báo username
					$password = "abc123";      // Khai báo password
					$server   = "localhost";   // Khai báo server
					

					// Kết nối database 
					$conn = mysql_connect("localhost", "root", "") or die("Không thể kết nối tới Database");
					mysql_select_db('btl', $conn);

					//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
					if (!$connect) {
						die("Không kết nối :" . mysqli_connect_error());
						exit();
					}

					//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
					$user_id = "";
					$user_name = "";
					$email = "";
					$password = "";
					$user_level = "";

					//Lấy giá trị POST từ form vừa submit
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if(isset($_POST["title"])) { $title = $_POST['title']; }
						if(isset($_POST["date"])) { $date = $_POST['date']; }
						if(isset($_POST["description"])) { $description = $_POST['description']; }
						if(isset($_POST["content"])) { $content = $_POST['content']; }

						//Code xử lý, insert dữ liệu vào table
						$sql = "INSERT INTO user (user_id, user_name,email, password, user_level)
						VALUES ('$title', '$date', '$description', '$content')";

						if (mysqli_query($connect, $sql)) {
							echo "Thêm dữ liệu thành công";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($connect);
						}
					}

					//Đóng database
					mysqli_close($connect);
				?>
			

				<div class="text-center p-t-12">
					<span class="txt1">
						Forgot
					</span>
					<a class="txt2" href="#">
						Username / Password?
					</a>
				</div>
				<div class="text-center p-t-136">
					<a class="txt2" href="#">
						Create your Account
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</div>
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



  
//Kiểm tra điều kiểm tra khi field rỗng
						if ($name == "" || $email == "" || $password1 == "" || $password2 == ""){
							echo " Thông tin chưa đầy đủ ";
						}elseif($password1 != $password2) {
							echo " Mật khẩu không khớp";
						}else{
							$md5Pass = password_hash('$password1', PASSWORD_DEFAULT);
							$sql = "INSERT INTO user (usersName, usersEmail, usersPass )
									VALUES (N'$name', '$email', '$md5Pass')";

						}

					}