<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['taikhoan'])) {
	 header('Location: login.php');
}
?>
<html>
<head>
    <title>Trang người dùng</title>
    <meta charset="utf-8">
   <style>
        .khung{
            width:950px;
            margin: auto;
            background:#CCC;
            min-height: 1000px;
        }
        .tieude{
            height: 100px;
            border-bottom: 2px #CCC solid ;
        }
        .tieude h2{
            margin: 0px;
            color: #600;
            padding: 10px;
            padding-top: 50px;
        }
        .menu{
            background: #CCC;
            height: 30px;
            padding-top: 0px;
            
        }
        .menu a{
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 5px;
            
        }
        .noidung{
            min-height: 800px;
        }
        .footer{
            height: 100px;
            background: #CCC;
            border-top: 2px #fff solid;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="cssmenu/styles.css">
</head>
<body>
    <div class="khung">
            <div class="tieude">
                <h2> TRANG QUẢN LÍ SINH VIÊN</h2>
            </div>
            <div class="menu">
                <div id='cssmenu'>
		<ul>
		   
		   <li class=''><a href='#'><span>Thông tin người dùng</span></a>
		      <ul>
			 <li class=''><a href='?url=doimk.php'><span>Đổi mật khẩu </span></a>    
			 </li>
			 <li class=''><a href='?url=ttsv.php'><span>Thông tin cá nhân</span></a>    
			 </li>
			<li class=''><a href='?url=suattsv.php'><span>Sửa thông tin cá nhân</span></a>    
			 </li>
		      </ul>
		   </li>
	           <li class=''><a href='#'><span>Chương trình học</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=dsmhsv.php'><span>Danh sách môn học </span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=cthsv.php'><span>Chương trình học</span></a>	    
			 </li>
		      </ul>
		   </li>
                   <li class=''><a href='?url=dangki.php'><span>Đăng kí học tập</span></a>
		   </li>
                   
                   <li class=''><a href='#'><span>Tra cứu</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=timlop.php'><span>Danh sách lớp sinh viên</span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=timsv.php'><span>Tra cứu sinh viên</span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=timgv.php'><span>Tra cứu giảng viên</span></a>	    
			 </li>
		      </ul>
                   <li class=''><a href='logout.php'><span>Đăng xuất </span></a>
		   </li>
		   </li>
                      
		</ul>
	        </div>
            </div>
            <div class="noidung">
		<?php 
                 include($_GET['url']);
                ?>
            </div>
            <div class="footer">
                <h3>Phần mềm quản lí sinh viên</h3>
                <h4>Trường đại học Bách Khoa Hà Nội</h4>

            </div>
    </div>
</body>
</html>
