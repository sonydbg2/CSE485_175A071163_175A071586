
<?php
	session_start(); 
 ?>
<?php require_once("ketnoi.php");?>
	<form action="manage.php" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa thông tin thành viên</h3>
					<input type="hidden" name="id" value="">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap"> ID :</td>
				<td><input name="fullname" id="fullname" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap"> Tên :</td>
				<td><input type="text" id="email" name="email" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap"> Email :</td>
				<td><input type="text" id="email" name="email" value=""></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Quyền :</td>
				<td>
					<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="0" > Quản Trị</option>
						<option value="1" > Thành Viên</option>
						
					</select>
				</td>
			</tr>
			
			<tbody id="data"></tbody>
		</table>
	</form>
