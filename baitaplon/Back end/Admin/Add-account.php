

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary"> Thêm tài khoản </h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<form method="POST">
			<div class="form-inline">
                <label> ID  </label>
				<input type="text" id="mem_id" class="form-control"/>
				<label> Tên </label>
				<input type="text" id=" users_name " class="form-control"/>
				<label> Email </label>
				<input type="text" id="Email" class="form-control"/>
			</div>
			<br />
			<div class="form-inline">
				<label> Quyền </label>
				<input type="text" id="Quyen " class="form-control"/>
			</div>
			<br />
			<button type="button" id="update" class="btn btn-primary">
            <a href = "manage.php"></a>
            <span class="glyphicon glyphicon-save"></span>Thêm vào
			</button>
			
		</form>
		<br />      
	</div>
</body>
<script src="jquery-3.2.1.min.js"></script>
<script src="script.js"></script>
</html>