<?php
// Khai báo sử dụng session
session_start();

// Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type:text/html; charset+UTF-8');
if(isset($_POST["btn_dangnhap"]))
{
    // Lấy dữ liệu nhập vào
    $email = addcslashes($_POST['txtEmail']);
    $password = addcslashes($_POST['txtPassword']);

    // Kết nối tới MYSQL
    $conn = mysql_connect("localhost", "root", "") or die("Không thể kết nối tới Database");
    mysql_select_db('btl', $conn);

    // Kiểm tra đã đăng nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$email || !$password){
        echo " Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu ";
    }elseƠ
    $sql = "SELECT usersEmail, usersPass, usersName, usersLevel FROM users WHERE usersEmail = '$email' ";
    $query = mysql_query($sql);

        // Kiểm tra email
        if (mysql_num_rows($query) == 0) {
            echo "Tài khoản này không tồn tại ";
        }else{
            // Lấy lại mật khẩu trong database 
            $row = mysql_fetch_array($query);

            // So sánh mật khẩu có trùng khớp hay không
            if (password_verify($password, $row['usersPass'])){
                echo "Mật khẩu không đúng";
            }else{
                $name = $row['usersName'];
                $_SESSION['name'] = $name;
                $level = $row['usersLevel'];
                if ($level == 1) {
                    header('Location: quanlys.php');
                }elseif($level == 2){
                    header('Location:    ');
                }else{
                    header('Location:    ');
                }
            }
        }
    }
}