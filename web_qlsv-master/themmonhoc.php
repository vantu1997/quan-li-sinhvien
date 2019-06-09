<?php

	
        
if (!empty($_POST['add_monhoc']))
{
    // Lay data
    
    $data['mamh'] 	 = isset($_POST['mamhn']) ? $_POST['mamhn'] : '';
    $data['tenmh']        = isset($_POST['tenmhn']) ? $_POST['tenmhn'] : '';
    $data['tinchi']         = isset($_POST['tinchin']) ? $_POST['tinchin'] : '';
    $data['makhoa']         = isset($_POST['makhoan']) ? $_POST['makhoan'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['mamh'])){
    	$errors['mamh'] = 'Chưa nhập mã môn học';
    }
    if (empty($data['tenmh'])){
        $errors['tenmh'] = 'Chưa nhập tên môn học ';
    }
     
    if (empty($data['tinchi'])){
        $errors['tinchi'] = 'Chưa nhập số tín chỉ ';
    }
    if (empty($data['makhoa'])){
        $errors['makhoa'] = 'Chưa nhập khoa quản lí  ';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
        $query = pg_query($conn, " INSERT INTO monhoc( mamh, tenmh,tinchi, makhoa ) VALUES( '$data[mamh]', '$data[tenmh]', '$data[tinchi]',  '$data[makhoa]' ) ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dsmonhoc.php");
    }
}
?>
<!DOCTYPE html>	 	
<html>
    <head>
        <title>Thêm môn học </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Thêm môn học  </h1>
        <a href="quantri.php?url=dsmonhoc.php">Trở về</a> <br/> <br/>
	
        <form method="post" action="quantri.php?url=themmonhoc.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mã môn học </td>
                    <td>
                        <input type="text" name="mamhn" value="<?php echo !empty($data['mamh']) ? $data['mamh'] : ''; ?>"/>
                        <?php if (!empty($errors['mamh'])) echo $errors['mamh']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tên môn học </td>
                    <td>
                        <input type="text" name="tenmhn" value="<?php echo !empty($data['tenmh']) ? $data['tenmh'] : ''; ?>"/>
                        <?php if (!empty($errors['tenmh'])) echo $errors['tenmh']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tín chỉ  </td>
                    <td>
                        <input type="text" name="tinchin" value="<?php echo !empty($data['tinchi']) ? $data['tinchi'] : ''; ?>"/>
                        <?php if (!empty($errors['tinchi'])) echo $errors['tinchi']; ?>
                    </td>
                </tr>
		<tr>
                    <td>Khoa</td>
                    <td>
                        <input type="text" name="makhoan" value="<?php echo !empty($data['makhoa']) ? $data['makhoa'] : ''; ?>"/>
                        <?php if (!empty($errors['makhoa'])) echo $errors['makhoa']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>                    
                        <input type="submit" name="add_monhoc" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>
    </body>
</html>
