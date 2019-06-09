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
    <title>Trang quản trị</title>
    <meta charset="utf-8">
   <style>
        .khung{
            width:953px;
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
		   <li class=''><a href='#'><span>Tài khoản</span></a>
		      <ul>
                         <li class='has-sub'><a href='?url=doimk.php'><span>Đổi mật khẩu</span></a>	    
			 </li>
			 <li class=''><a href='?url=dstaikhoan.php'><span>Danh sách</span></a>    
			 </li>
			 <li class=''><a href='?url=themtaikhoan.php'><span>Thêm </span></a>    
			 </li>
		      </ul>
		   </li>
	           <li class=''><a href='#'><span>Sinh viên</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=dssv.php'><span>Danh sách</span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=themsv.php'><span>Thêm </span></a>	    
			 </li>
		      </ul>
		   </li>
                   <li class=''><a href='#'><span>Giảng viên</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=dsgv.php'><span>Danh sách</span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=themgv.php'><span>Thêm </span></a>	    
			 </li>
		      </ul>
		   </li>
                   <li class=''><a href='#'><span>Khoa/Viện</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=dskhoa.php'><span>Danh sách</span></a>    
			 </li>
			 
		      </ul>
		   </li>
                   <li class=''><a href='#'><span>Lớp</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=dslop.php'><span>Danh sách</span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=themlop.php'><span>Thêm </span></a>	    
			 </li>
		      </ul>
		   </li>
                   <li class=''><a href='#'><span>Môn học</span></a>
		      <ul>
			 <li class='has-sub'><a href='?url=dsmonhoc.php'><span>Danh sách</span></a>	    
			 </li>
			 <li class='has-sub'><a href='?url=themmonhoc.php'><span>Thêm </span></a>			    
			 </li>
		      </ul>
		   </li>
                   <li class=''><a href='logout.php'><span>Đăng xuất</span></a>
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
