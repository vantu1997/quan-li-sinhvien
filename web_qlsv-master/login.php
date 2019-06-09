<?php
session_start();
?>
<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
if (isset($_POST["dangnhap"])) {
    // lấy thông tin người dùng
    $taikhoan = $_POST["taikhoan"];
    $matkhau = $_POST["matkhau"];

    if ($taikhoan == "" || $matkhau =="") {
        echo "username hoặc password bạn không được để trống!";
    }else{
        $sql = "select * from users where username = '$username' and password = '$password' ";
        $query = pg_query($conn,"select * from taikhoan where taikhoan = '$taikhoan' and matkhau = '$matkhau'");//
        $num_rows = pg_num_rows($query);
        if ($num_rows!=0) {
                    
	//tiến hành lưu tên đăng nhập vào session 
            $_SESSION['taikhoan'] = $taikhoan;
            $_SESSION['matkhau'] = $matkhau;
               if($taikhoan=="admin" )
                  header('Location: quantri.php');
               else 
                  header('Location: user.php');        
            
        }
    }
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Trang đăng nhập</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
	<!--header-->
	<div class="header-w3l">
		<h1> Login </h1>
	</div>
	<div class="main-w3layouts-agileinfo">
	<!--form-stars-here-->
	   <div class="wthree-form">					
		<form method="POST" action="login.php">
		   <div class="form-sub-w3">
			<input type="text" name="taikhoan" placeholder="Username " required="" />
			<div class="icon-w3">
			   <i class="fa fa-user" aria-hidden="true"></i>
			</div>
		   </div>
		   <div class="form-sub-w3">
			<input type="password" name="matkhau" placeholder="Password" required="" />
			<div class="icon-w3">
			   <i class="fa fa-unlock-alt" aria-hidden="true"></i>
		        </div>
		   </div>								
		   <div class="clear"></div>
	           <div class="submit-agileits">
		        <input type="submit" name="dangnhap" value="Login">
	           </div>
		</form>
	   </div>				
	</div>
</body>
</html>
