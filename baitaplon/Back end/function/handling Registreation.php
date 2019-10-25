<?php	
//Khai báo sử dụng session
session_start();
	//Khai báo utf-8 để hiển thị được tiếng việt
	header('Content-Type: text/html; charset=UTF-8');
   
	// Nếu không phải là sự kiện đăng ký thì không xử lý
	if (isset($_POST["btn_dangky"])){
        //kết nối database
        $conn = mysqli_connect('localhost', 'root', '', 'project') or die("không thể kết nối tới database");

        // Lấy thông tin
        $username   = $_POST['txtUser'];
        $email      = $_POST['txtEmail'];
        $password   = $_POST['txtPass'];
        $confirmpassword   = $_POST['txtPass2'];

        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($password != $confirmpassword) {
            echo "Mật khẩu không khớp. Vui lòng nhập lại. <a href='javascript: history.go(-1)'> Come back</a>";
        }else{   
            //Mã hóa mật khẩu
            $password = md5($password);
            $sql = "SELECT users_name, users_email, users_password, user_level FROM users WHERE  users_email='$email' ";
            $query = mysqli_query($conn,$sql);	
            
            //Kiểm tra tên đăng nhập này đã có người dùng chưa
            if (mysqli_num_rows($query) > 0){
                echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'> Come back</a>";
            }else{                
                    //thực hiện việc lưu trữ dữ liệu vào db
                    $sql3 = "INSERT INTO users(
                        users_name,
                        users_password,
                        users_email
                        ) VALUES (
                        '$username',
                        '$password',
                        '$email'
                        )";
                    // thực thi câu $sql với biến conn lấy từ file connection.php
                    if(mysqli_query($conn,$sql3)){
                        echo "chúc mừng bạn đã đăng ký thành công. <a href = '../login/login.php'> Về trang chủ </a>";
                    }else {
                        echo"chua dang ky thanh cong";
                    }
                   
                }
            } 
        }
        
    
?>

