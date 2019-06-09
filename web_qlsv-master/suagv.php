<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$magv = isset($_GET[magv]) ? (string)$_GET[magv] : '';

	$query = pg_query($conn, "SELECT * from giangvien where magv = '$magv'");
	$data = array();
	if (pg_num_rows($query) > 0){
        	$row = pg_fetch_assoc($query);
        	$data = $row;
    	}
        
if (!empty($_POST['suagv']))
{
    // Lay data
    $data['magv']         = isset($_POST['magvn']) ? $_POST['magvn'] : '';
    $data['tengv']        = isset($_POST['tengvn']) ? $_POST['tengvn'] : '';
    $data['gioitinh']         = isset($_POST['sexn']) ? $_POST['sexn'] : '';
    $data['mail']         = isset($_POST['mailn']) ? $_POST['mailn'] : '';
    $data['makhoa']         = isset($_POST['makhoan']) ? $_POST['makhoan'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['magv'])){
        $errors['magv'] = 'Chưa nhập mã giảng viên ';
    }
    if (empty($data['tengv'])){
        $errors['tengv'] = 'Chưa nhập họ tên giảng viên ';
    }
     
    if (empty($data['mail'])){
        $errors['mail'] = 'Chưa nhập email giảng viên ';
    }
    if (empty($data['makhoa'])){
        $errors['makhoa'] = 'Chưa nhập khoa quản lí giảng viên ';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        $query = pg_query($conn, " UPDATE giangvien SET magv = '$data[magv]', tengv = '$data[tengv]',gioitinh = '$data[gioitinh]', mail = '$data[mail]',  makhoa = '$data[makhoa]'  WHERE magv = '$magv'");
        // Trở về trang danh sách
        header("location: quantri.php?url=dsgv.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa giảng viên </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Sửa giảng viên  </h1>
	
        <form method="post" action="quantri.php?url=suagv.php&magv=<?php echo $data['magv']; ?>">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MÃ GIẢNG VIÊN</td>
                    <td>
                        <input type="text" name="magvn" value="<?php echo $data['magv']; ?>"/>
                        <?php if (!empty($errors['magv'])) echo $errors['magv']; ?>
                    </td>
                </tr>
                <tr>
                    <td>HỌ TÊN </td>
                    <td>
                        <input type="text" name="tengvn" value="<?php echo $data['tengv']; ?>"/>
                        <?php if (!empty($errors['tengv'])) echo $errors['tengv']; ?>
                    </td>
                </tr>
		
                <tr>
                    <td>GIỚI TÍNH</td>
                    <td>
                        <select name="sexn">
                            <option value="Nam">Nam</option>
                            <option value="Nữ" <?php if ($row['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nu</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>EMAIL</td>
                    <td>
                        <input type="text" name="mailn" value="<?php echo $data['mail']; ?>"/>
                        <?php if (!empty($errors['mail'])) echo $errors['mail']; ?>
                    </td>
                </tr>
		<tr>
                    <td>KHOA</td>
                    <td>
                        <input type="text" name="makhoan" value="<?php echo $data['makhoa']; ?>"/>
                        <?php if (!empty($errors['makhoa'])) echo $errors['makhoa']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="magv" value="<?php echo $data[0]; ?>"/>
                        <input type="submit" name="suagv" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>	
    </body>
</html>
