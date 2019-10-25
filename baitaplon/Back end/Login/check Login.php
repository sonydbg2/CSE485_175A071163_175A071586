<?php

//Khai báo sử dụng session
session_start();

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST["btn_dangnhap"])) {
    //Lấy dữ liệu nhập vào
    $email = addslashes($_POST['txtEmail']);
    $password = addslashes($_POST['txtPassword']);
    //kết nối database
    $conn = mysqli_connect('localhost', 'root', '', 'project') or die("không thể kết nối tới database");
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$email || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'> Come back </a>";
    } else {
         // mã hóa pasword
        $password = md5($password);
        $sql = "SELECT users_name, users_email, users_password, user_level FROM users WHERE  users_email='$email' ";
        $query = mysqli_query($conn,$sql);
        //kiểm tra email
        if (mysqli_num_rows($query) == 0) {
            echo "Tài khoản này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'> Come back </a>";
        } else {
            //Lấy mật khẩu trong database ra
            $row = mysqli_fetch_array($query);

            //So sánh 2 mật khẩu có trùng khớp hay không
            if ($password != $row['users_password']) {
                echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'> Come back </a>";
            } else {
                 $_SESSION['users_email'] = $email;
                 $id = $row['users_id'];
                 $_SESSION['users_id'] = $id;
                    $level = $row['user_level'];
                    if ($level == 1) {
                        header('location: ../admin/manage.php');
                    } else {
                        header('location:../admin/News.php');
                    }
                }
                            
            }
        }
    } 
?>