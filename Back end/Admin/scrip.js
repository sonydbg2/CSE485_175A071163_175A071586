
$(document).ready(function(){
	$('#List').hide();
    $('#addtk').click(function () {
        $('#update').hide();
        $('#nameNew').val('');
        $('#emailNew').val('');
        $('#mkNew').val('');
        $('#cvNew').val('');
        $('#save').show();
        $('#List').show();
    })
    $('#cancel').click(function () {
        $('#List').hide();
	})
	
	var mem_id;
	
	DisplayData();
	
	$('#update').hide();
	
	$('#save').on('click', function(){
		if($('#mem_id').val() == "" ||$('#users_name').val() == "" || $('#Email').val() == "" || $('#Quyen').val() == ""){
			alert("Vui lòng nhập đầy đủ thông tin ");
		}else{
			var mem_id= $('#mem_id').val();
			
			var users_name = $('#users_name').val();
		
			var Email = $('#Email').val();
			
			var Quyen= $('#Quyen').val();
			
			
			$.ajax({
				url: 'save.php',
				type: 'POST',
				data: {
					mem_id: mem_id,
                    users_name:  users_name,
					Email: Email,
                    Quyen: Quyen
				},
				success: function(data){
					
					$('#mem_id').val('');
					 $('#users_name').val('');
					 $('#Email').val('');
					 $('#Quyen').val('');
					 DisplayData();
				}
			});
		}
		
	});
	
	function DisplayData(){
		$.ajax({
			url: 'data.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr('name');
	
		 
		$.ajax({
			url: 'delete.php',
			type: 'POST',
			data: {
				id: id
			},
			success: function(data){
				DisplayData();
				$('#update').hide();
				$('#save').show();	
				$('#mem_id').val('');
				$('#users_name').val('');
				$('#Email').val('');
				$('#Quyen').val('');
			}
		});
	})

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('name');
		$.ajax({
			url: 'edit.php',
			type: 'POST',
			data: {
				id: id
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				mem_id = getArray.mem_id;
				$('#mem_id').val(getArray.firstname);
				$('#users_name').val(getArray.firstname);
				$('#Email').val(getArray.lastname);
				$('#Quyen').val(getArray.address);				
				$('#update').show();
				$('#save').hide();	
			}
		})
	});
	
	$('#update').on('click', function(){
		var mem_id= $('#mem_id').val();
		var users_name= $('#users_name').val();
		var Email = $('#Email ').val();
		var Quyen = $('#Quyen').val();
		
		
		$.ajax({
			url: 'update.php',
			type: 'POST',
			data: {
				mem_id: mem_id,
                users_name: users_name,
                Email: Email,
                Quyen: Quyen
			},
			success: function(){
				DisplayData();
				
				$('#users_name').val('');
				$('#Email').val('');
				$('#Quyen').val('');
				
				alert("Successfully Updated!");
				
				$('#update').hide();
				$('#save').show();	
				
				mem_id = "";
			}
		});
	});
});