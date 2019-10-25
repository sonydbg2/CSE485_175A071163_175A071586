<?php
	require_once 'ketnoi.php';

	$id = $_POST['id'];
	
	$conn->query("DELETE FROM `student` WHERE `mem_id` = '$id'");
	
?>
