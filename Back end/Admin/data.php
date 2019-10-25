
<?php
	require_once 'ketnoi.php';
	mysqli_set_charset($conn, "utf8");
	if(ISSET($_POST['res'])){
		$query = $conn->query("SELECT * FROM `student`");
		while($fetch = $query->fetch_array()){
			echo
				"
					<tr>
						<td> ".$fetch['mem_id']."</td><td> ".$fetch['users_name']."</td><td>".$fetch['Email']."</td>
						<td>".$fetch['Quyen']."</td>
						<td><center><button class='btn btn-warning edit' name='".$fetch['mem_id']."'><span class='glyphicon glyphicon-edit'></span> Sửa </button> | <button class='btn btn-danger delete' name='".$fetch['mem_id']."'><span class='glyphicon glyphicon-trash'></span>Xóa</button></center></td>
					</tr>
				";
			
		}
	}
	
?> 
