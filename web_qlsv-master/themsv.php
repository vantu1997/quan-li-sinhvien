<?php

	
        
if (!empty($_POST['add_student']))
{
    // Lay data
    $data['mssv']         = isset($_POST['mssvn']) ? $_POST['mssvn'] : '';
    $data['hoten']        = isset($_POST['hotenn']) ? $_POST['hotenn'] : '';
    $data['ngaysinh']    = isset($_POST['ngaysinhn']) ? $_POST['ngaysinhn'] : '';
    $data['gioitinh']         = isset($_POST['sexn']) ? $_POST['sexn'] : '';
    $data['quequan']         = isset($_POST['quequann']) ? $_POST['quequann'] : '';
    $data['malop']         = isset($_POST['malopn']) ? $_POST['malopn'] : '';
    //$data['makhoaquanli']         = isset($_POST['makhoaquanlin']) ? $_POST['makhoaquanlin'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['mssv'])){
        $errors['mssv'] = 'Chưa nhập mã số sinh viên';
    }
    if (empty($data['hoten'])){
        $errors['hoten'] = 'Chưa nhập tên sinh viên';
    }
     
    if (empty($data['ngaysinh'])){
        $errors['ngaysinh'] = 'Chưa nhập ngày sinh sinh viên';
    }
    if (empty($data['quequan'])){
        $errors['quequan'] = 'Chưa nhập quê quán sinh viên';
    }
    if (empty($data['malop'])){
        $errors['malop'] = 'Chưa nhập mã lớp sinh viên';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$result = pg_query($conn, "SELECT makhoaquanli from lop where malop = '$data[malop]'");
	$data1 = array();
	$row1 = pg_fetch_assoc($result);
        $data1 = $row1;
        $query = pg_query($conn, " INSERT INTO sinhvien( mssv, hoten, gioitinh, ngaysinh, quequan, malop, makhoaquanli ) VALUES( '$data[mssv]', '$data[hoten]', '$data[gioitinh]', '$data[ngaysinh]', '$data[quequan]', '$data[malop]', '$data1[makhoaquanli]' ) ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dssv.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Thêm sinh viên</h1>
        <a href="quantri.php?url=dssv.php">Trở về</a> <br/> <br/>
	
        <form method="post" action="quantri.php?url=themsv.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MSSV</td>
                    <td>
                        <input type="text" name="mssvn" value="<?php echo !empty($data['mssv']) ? $data['mssv'] : ''; ?>"/>
                        <?php if (!empty($errors['mssv'])) echo $errors['mssv']; ?>
                    </td>
                </tr>
                <tr>
                    <td>HỌ TÊN</td>
                    <td>
                        <input type="text" name="hotenn" value="<?php echo !empty($data['hoten']) ? $data['hoten'] : ''; ?>"/>
                        <?php if (!empty($errors['hoten'])) echo $errors['hoten']; ?>
                    </td>
                </tr>
		<tr>
                    <td>NGÀY SINH</td>
                    <td>
                        <input type="text" name="ngaysinhn" value="<?php echo !empty($data['ngaysinh']) ? $data['ngaysinh'] : ''; ?>"/>
			<?php if (!empty($errors['ngaysinh'])) echo $errors['ngaysinh']; ?>
                    </td>
                </tr>
                <tr>
                    <td>GIỚI TÍNH</td>
                    <td>
                        <select name="sexn">
                            <option value="Nam">Nam</option>
                            <option value="Nữ" <?php if (!empty($data['gioitinh']) && $data['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>QUÊ QUÁN</td>
                    <td>
                        <input type="text" name="quequann" value="<?php echo !empty($data['quequan']) ? $data['quequan'] : ''; ?>"/>
 			<?php if (!empty($errors['quequan'])) echo $errors['quequan']; ?>
                    </td>
                </tr>
                <tr>
                    <td>LỚP</td>
                    <td>
                        <input type="text" name="malopn" value="<?php echo !empty($data['malop']) ? $data['malop'] : ''; ?>"/>
                        <?php if (!empty($errors['malop'])) echo $errors['malop']; ?>
                    </td>
                </tr>
		
                <tr>
                    <td></td>
                    <td>                    
                        <input type="submit" name="add_student" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>	
    </body>
</html>
