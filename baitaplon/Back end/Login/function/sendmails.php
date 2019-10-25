<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['namedk']) || !isset($_SESSION['emaildk'])) {
	header('Location: ..login/login.php');
} else {
	$username = $_SESSION['namedk'];
	$to = $_SESSION['emaildk'];
	$subject = "Send Email from Localhost";
	$message = "<form action='localhost/funtion/confirm email.php' method='post'>" .
		"Hello " . $username . "!" .
		"<h5 style='color: black;'>Vui lòng click vào dưới để xác nhận tài khoản đăng ký</h5>" .
		"<div class='container-login100-form-btn'>" .
		"<button class='login100-form-btn' name='btn_xacnhan'>" .
		"Xác nhận" .
		"</button>" .
		"</div>" .
		"</form>";
	$header  =  "From:myemail@exmaple.com\r\n";
	$header .=  "Cc:other@exmaple.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	$success = mail($to, $subject, $message, $header);
	if($success == true ){
		echo "oke";
	}else{
		echo"no";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Send Mail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css” />
	
</head>

<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method='POST'>
					<span class="login100-form-title">
						Vui lòng kích hoạt email bạn vừa đăng ký!
					</span>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
