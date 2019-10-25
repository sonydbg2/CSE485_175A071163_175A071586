
<?php
	require_once 'ketnoi.php';
	
	$mem_id = $_POST['mem_id'];
	$users_name = $_POST['users_name'];
    $Email = $_POST['Email'];
    $Quyen = $_POST['Quyen'];

	$conn->query("INSERT INTO `student` VALUES('$mem_id ', '$users_name','  $Email', ' $Quyen')");
	
?>
