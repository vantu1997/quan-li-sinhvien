<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$tk = $_SESSION['taikhoan'];
	$mk = $_SESSION['matkhau'];
	
if (!empty($_POST['doimk']))
{
    // Lay data
    $mkcu        = isset($_POST['mkcu']) ? $_POST['mkcu'] : '';
    $mkmoi      = isset($_POST['mkmoi']) ? $_POST['mkmoi'] : '';
    $mkxn = isset($_POST['mkxn']) ? $_POST['mkxn'] : '';

    $errors = array();    
    if(!$mkcu || !$mkmoi ||!$mkxn)
        {
            $errors['1'] ='Bạn phải nhập nhập đầy đủ thông tin!';
        }
    
     if($mkcu!=$mk)
        {
            $errors['2'] = ' Mật khẩu cũ nhập không đúng!';
        }
     if($mkmoi!=$mkxn)
        {
            $errors['3'] = 'Mật khẩu xác nhận sai!';
        }
     if (!$errors){
        $query = pg_query($conn, " UPDATE taikhoan SET matkhau = '$mkmoi' WHERE taikhoan = '$tk' ");
        $xacnhan['1'] = 'Đổi mật khẩu thành công!';
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đổi mật khẩu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div align="center">
        <h1>Đổi mật khẩu</h1>
	
        <form method="post" action="user.php?url=doimk.php">
            <table width="60%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tài khoản</td>
                    <td>
                         <?php echo  $tk; ?>
                        
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu cũ</td>
                    <td>
                        <input type="text" name="mkcu" "/>
                        
                    </td>
                </tr>
		<tr>
                    <td>Mật khẩu mới</td>
                    <td>
                        <input type="text" name="mkmoi" "/>
                        
                    </td>
                </tr>
		<tr>
                    <td>Nhập lại mật khẩu </td>
                    <td>
                        <input type="text" name="mkxn" "/>
                        
                    </td>
                </tr>
                
            </table><br/>
		<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="doimk" value="Lưu"/>
                    </td>
                </tr>
		<br/><br/>
            <tr>
		   <?php
			if (!empty($errors['1'])) echo $errors['1'];
			if (!empty($errors['2'])) echo $errors['2'];
			if (!empty($errors['3'])) echo $errors['3'];
			if (!empty($xacnhan['1'])) echo $xacnhan['1'];
		   ?>
		</tr>
        </form>
        </div>	
    </body>
</html>
