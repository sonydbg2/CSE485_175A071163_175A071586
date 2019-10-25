
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Admin </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avant">
    <meta name="author" content="The Red Team">

    <link rel="stylesheet" href="assets/css/styles.minc726.css?=140">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>


    <link href='assets/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='styleswitcher'>

    <link href='assets/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='headerswitcher'>

    <link rel='stylesheet' type='text/css' href='assets/plugins/datatables/dataTables.css' />
    <link rel='stylesheet' type='text/css' href='assets/plugins/codeprettifier/prettify.css' />
    <link rel='stylesheet' type='text/css' href='assets/plugins/form-toggle/toggles.css' />
</head>

<body class="">


    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right"
            title="Toggle Sidebar"></a>
            <div class="navbar-header pull-left">
                <a class="navbar-brand" href="../Home page/home.php"> Đại học nguyễn tất thành </a>
            </div>

        <ul class="nav navbar-nav pull-right toolbar">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs"> Admin
                        <i class="fa fa-caret-down"></i></span><img src="assets/img/LOGO.jpg"
                        alt="Dangerfield" /></a>
                <ul class="dropdown-menu userinfo arrow">
                    <li class="username">
                        <a href="#">
                            <div class="pull-left"><img src="assets/img/LOGO.jpg"
                                    alt="Jeff Dangerfield" /></div>
                            <div class="pull-right">
                                <h5>Hello, Admin !</h5>
                            </div>
                        </a>
                    </li>
                    <li class="userlinks">
                        <ul class="dropdown-menu">
                            <li><a href="">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                            <li class="divider"></li>
                            <li><a href="../Login/login.php" class="text-right">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </header>

    <div id="page-container">
        <!-- BEGIN SIDEBAR -->
        <nav id="page-leftbar" role="navigation">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
                <li class="divider"></li>
                <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="News.php"><i class="fa fa-th"></i> <span> Tin tức </span></a></li>
                <li><a href="manage.php"><i class="fa fa-table"></i> <span>  Quản trị </span></a>
                </li>
            </ul>
        </nav>

        <!-- BEGIN RIGHTBAR -->
        <div id="page-content">
            <div id='wrap'>                            
                <div id="page-heading">
                    <h1> <a href="News.php"> Manage </a> </h1>                   
                </div>
                <?php
                    //kết nối database
	                 $conn = mysqli_connect('localhost', 'root', '', 'project') or die("không thể kết nối tới database");
                     mysqli_set_charset($conn, "utf8");
                    // query students table
                    $sql = 'SELECT * FROM `student`';

                    $result = mysqli_query($conn, $sql);

                    if(!$result) {
                        die('Query error: [' . $db->error . ']');
                    }

                        echo mysqli_num_rows($result);
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-sky">
                                <h4> <a  id=" Add account"> Add account </a></h4>
                                <form method="POST">
                                    <div class="form-inline">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th> ID </th>
                                                <th> Tên </th>
                                                <th> Email </th>
                                                <th> Quyền </th>				
                                            </tr>
                                            <tr>
                                                <th><input type="text" id="mem_id" class="form-control" style="width: 100%"/></th>
                                                <th><input type="text" id="users_name" class="form-control" style="width: 100%"/></th>
                                                <th><input type="text" id="Email" class="form-control" style="width: 100%"/></th>
                                                <th>
                                                <input type="text" id="Quyen" class="form-control" style="width: 100%"/>                                                 
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <br />
                                        <center><button type="button" id="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Thêm vào</button><button type="button" id="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Sửa thông tin</button></center>
                                </form>
	                            	<br />
                                </div>                               

                                <div id="noidung">
                                        
                                    </div>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#Add account').click(function(e) {
                                            e.preventDefault();
                                            $('#noidung').load('Add-account.php');
                                        });
                                    });
                                    </script>

                                </div>
                                <div class="panel-body collapse in">
                                    <table cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Tên </th>
                                                <th> Email </th>                                            
                                                <th> Quyền </th>
                                                <th colspan = 2> Hành động </th>
                                            </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- page-content -->
    </div> <!-- page-container -->


    <script type='text/javascript' src='assets/js/jquery-1.10.2.min.js'></script>
    <script type='text/javascript' src='assets/js/jqueryui-1.10.3.min.js'></script>
    <script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.nicescroll.min.js'></script>
    <script type='text/javascript' src='assets/js/application.js'></script>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="scrip.js"></script>

</body>

</html>