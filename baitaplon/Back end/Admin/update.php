
<?php
	require_once '../function/ketnoi.php';
	
	if(ISSET($_POST['id'])){
		$id = $_POST['id'];
		$Ten = $_POST['Ten'];
		$Emai = $_POST['Email'];
		$Quyen = $_POST['Quyen'];
		
		$conn->query("UPDATE `student` set `Ten` = '$Ten', `Email` = '$Emai ', `Quyen` = '$Quyen' WHERE `mem_id` = '$id'");
	}
	
?>