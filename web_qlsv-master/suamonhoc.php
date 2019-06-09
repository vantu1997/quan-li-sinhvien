<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$mamh = isset($_GET['mamh']) ? (string)$_GET['mamh'] : '';

	$query = pg_query($conn, "SELECT * from monhoc  where mamh = '$mamh' ");
	$data = array();
	if (pg_num_rows($query) > 0){
        	$row = pg_fetch_assoc($query);
        	$data = $row;
    	}
        
if (!empty($_POST['suamonhoc']))
{
    // Lay data
    $data['mamh']         = isset($_POST['mamhn']) ? $_POST['mamhn'] : '';
    $data['tenmh']        = isset($_POST['tenmhn']) ? $_POST['tenmhn'] : '';
    $data['tinchi']  = isset($_POST['tinchin']) ? $_POST['tinchin'] : '';
    $data['makhoa']          = isset($_POST['makhoan']) ? $_POST['makhoan'] : '';
   
    // Validate thong tin
    $errors = array();
    if (empty($data['mamh'])){
        $errors['mamh'] = 'Chưa nhập mã môn học ';
    }
    if (empty($data['tenmh'])){
        $errors['tenmh'] = 'Chưa nhập tên môn học ';
    }
    
    if (empty($data['makhoa'])){
   	$errors['makhoa'] = 'Chưa nhập mã khoa quản lí ';
    }
     
    
    
    // Neu ko co loi thi insert
    if (!$errors){
        $query = pg_query($conn, " UPDATE monhoc SET mamh = '$data[mamh]', tenmh = '$data[tenmh]', tinchi = '$data[tinchi]', makhoa = '$data[makhoa]' WHERE mamh = '$mamh' ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dsmonhoc.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin môn học </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Sửa thông tin môn học  </h1>
	
        <form method="post" action="quantri.php?url=suamonhoc.php&mamh=<?php echo $data['mamh']; ?>">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MÃ MÔN HỌC</td>
                    <td>
                        <input type="text" name="mamhn" value="<?php echo $data['mamh']; ?>"/>
                        <?php if (!empty($errors['mamh'])) echo $errors['mamh']; ?>
                    </td>
                </tr>
                <tr>
                    <td>TÊN MÔN HỌC</td>
                    <td>
                        <input type="text" name="tenmhn" value="<?php echo $data['tenmh']; ?>"/>
                        <?php if (!empty($errors['tenmh'])) echo $errors['tenmh']; ?>
                    </td>
                </tr>
		<tr>
                    <td>TÍN CHỈ</td>
                    <td>
                        <input type="text" name="tinchin" value="<?php echo $data['tinchi']; ?>"/>
                        
                    </td>
                </tr>
		<tr>
                    <td>MÃ KHOA</td>
                    <td>
                        <input type="text" name="makhoan" value="<?php echo $data['makhoa']; ?>"/>
                        <?php if (!empty($errors['makhoa'])) echo $errors['makhoa']; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="mamh" value="<?php echo $data[0]; ?>"/>
                        <input type="submit" name="suamonhoc" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>
    </body>
</html>
