
<?php
	require_once 'ketnoi.php';	
	if(ISSET($_POST['id'])){
		$id = $_POST['id'];
		
		$query = $conn->query("SELECT * FROM `studet` WHERE `mem_id` ='$id'");
		$fetch = $query->fetch_array();
		
		$array = array(
			'mem_id' => $fetch['mem_id'],
			'users_name' => $fetch['users_name'],
			'Email' => $fetch['Email'],
			'Quyen' => $fetch['Quyen']
		);
		
		echo json_encode($array);
	}
?>