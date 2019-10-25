$(document).ready(function(){
    $("#login").hide();
    $("#alogin").click(function(){
        $("#flogin").show();
    })
});

$("btnlogin").click(function(){
    var user = $("#txtuser".val());
    var pass = $("#txtpass".val());

    $.ajax({
        url:'check.php',
        type:'post',
        data:{userid:user, password:pass},
        success:function(dt){
            if(dt ="ok"){
                $('#flogin').hide();
                $('#alogin').hide();
                $('#alogout').show();
            }
            alert(dt)
                alert("login successfully");
        },
        erro:function(){
            alert("co loi");
        }  
    })
})
