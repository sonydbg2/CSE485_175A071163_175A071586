<?php

$user = $_POST["userid"];
$user = $_POST["password"];
$conn =myspli_connect('localhost', 'root','abc', 'btl');
if($conn){
    die('khong the ket noi')
}
$sql = "SELECT * FROM users WHERE email ='#user'";
if (mysqli_query($conn,$sql)){
    #result = mysqli_query(#conn,$sql)
}
?> 