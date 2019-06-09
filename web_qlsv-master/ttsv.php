<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
        $mssv = $_SESSION['taikhoan'];
	$query = pg_query($conn, "SELECT * from sinhvien where mssv = '$mssv' ");
	$data = array();
	if (pg_num_rows($query) > 0){
        	$row = pg_fetch_assoc($query);
        	$data = $row;
    	}       
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thông tin sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
	   body {
		  background-color: #CCC ;
		}
	</style>
    </head>
    <body> 
	<div align="center">
        <h1>Thông tin cá nhân </h1>	
        
            <table bgcolor=#CCC width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MSSV</td>
                    <td>
                         <?php echo $data['mssv']; ?>
                        
                    </td>
                </tr>
                <tr>
                    <td>HỌ TÊN</td>
                    <td>
                        <?php echo $data['hoten']; ?>
                        
                    </td>
                </tr>
		<tr>
                    <td>NGÀY SINH </td>
                    <td>
                        <?php echo $data['ngaysinh']; ?>
			
                    </td>
                </tr>
                <tr>
                    <td>GIỚI TÍNH</td>
                    <td>
                        <?php echo $data['gioitinh']; ?>
                    </td>
                </tr>
                <tr>
                    <td>QUÊ QUÁN</td>
                    <td>
                        <?php echo $data['quequan']; ?>
                    </td>
                </tr>
                <tr>
                    <td> LỚP </td>
                    <td>
                        <?php echo $data['malop']; ?>
                       
                    </td>
                </tr>
		<tr>
                    <td>KHOA</td>
                    <td>
                        <?php echo $data['makhoaquanli']; ?>
                        
                    </td>
                </tr>
            </table>
       </div>
    </body>
</html>
