<?php

	
        
if (!empty($_POST['add_giangvien']))
{
    // Lay data
    $data['magiangvien']         = isset($_POST['magiangvienn']) ? $_POST['magiangvienn'] : '';
    $data['hoten']        = isset($_POST['hotenn']) ? $_POST['hotenn'] : '';
    $data['gioitinh']         = isset($_POST['sexn']) ? $_POST['sexn'] : '';
    $data['mail']         = isset($_POST['mailn']) ? $_POST['mailn'] : '';
    $data['makhoa']         = isset($_POST['makhoan']) ? $_POST['makhoan'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['magiangvien'])){
        $errors['magiangvien'] = 'Chưa nhập mã số giảng viên ';
    }
    if (empty($data['hoten'])){
        $errors['hoten'] = 'Chưa nhập họ tên giảng viên ';
    }
     
    if (empty($data['mail'])){
        $errors['mail'] = 'Chưa nhập email giảng viên ';
    }
    if (empty($data['makhoa'])){
        $errors['makhoa'] = 'Chưa nhập khoa quản lí giảng viên ';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
        $query = pg_query($conn, " INSERT INTO giangvien( magv, tengv, gioitinh, mail, makhoa ) VALUES( '$data[magiangvien]', '$data[hoten]', '$data[gioitinh]', '$data[mail]',  '$data[makhoa]' ) ");
        // Trở về trang danh sách
         header("location: quantri.php?url=dsgv.php");
    }
}
?>
<!DOCTYPE html>	 	
<html>
    <head>
        <title>Thêm giảng viên </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Thêm giảng viên  </h1>
        <a href="quantri.php?url=dsgv.php">Trở về</a> <br/> <br/>
	
        <form method="post" action="quantri.php?url=themgv.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mã giảng viên </td>
                    <td>
                        <input type="text" name="magiangvienn" value="<?php echo !empty($data['magiangvien']) ? $data['magiangvien'] : ''; ?>"/>
                        <?php if (!empty($errors['magiangvien'])) echo $errors['magiangvien']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Họ tên </td>
                    <td>
                        <input type="text" name="hotenn" value="<?php echo !empty($data['hoten']) ? $data['hoten'] : ''; ?>"/>
                        <?php if (!empty($errors['hoten'])) echo $errors['hoten']; ?>
                    </td>
                </tr>
		<tr>
                    <td>Giới tính </td>
                    <td>
                        <select name="sexn">
                            <option value="Nam">Nam</option>
                            <option value="Nữ" <?php if (!empty($data['gioitinh']) && $data['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nu</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Email  </td>
                    <td>
                        <input type="text" name="mailn" value="<?php echo !empty($data['mail']) ? $data['mail'] : ''; ?>"/>
                        <?php if (!empty($errors['mail'])) echo $errors['mail']; ?>
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
                        <input type="submit" name="add_giangvien" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>	
    </body>
</html>
