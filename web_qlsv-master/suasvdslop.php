<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$mssv = isset($_GET[mssv]) ? (string)$_GET[mssv] : '';

	$query = pg_query($conn, "SELECT * from sinhvien where mssv = '$mssv' ");
	$data = array();
	if (pg_num_rows($query) > 0){
        	$row = pg_fetch_assoc($query);
        	$data = $row;
    	}
        
if (!empty($_POST['suasv']))
{
    // Lay data
    $data['mssv']         = isset($_POST['mssvn']) ? $_POST['mssvn'] : '';
    $data['hoten']        = isset($_POST['namen']) ? $_POST['namen'] : '';
    $data['ngaysinh']    = isset($_POST['ngaysinhn']) ? $_POST['ngaysinhn'] : '';
    $data['gioitinh']         = isset($_POST['sexn']) ? $_POST['sexn'] : '';
    $data['quequan']         = isset($_POST['quequann']) ? $_POST['quequann'] : '';
    //$data['malop']         = isset($_POST['malopn']) ? $_POST['malopn'] : '';
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
    
    
    // Neu ko co loi thi insert
    if (!$errors){
        $query = pg_query($conn, " UPDATE sinhvien SET mssv = '$data[mssv]', hoten = '$data[hoten]',gioitinh = '$data[gioitinh]', ngaysinh = '$data[ngaysinh]', quequan = '$data[quequan]'  WHERE mssv = '$mssv' ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dssvlop.php&malop=$data[malop]");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body> 
	<div align="center">
        <h1>Sửa sinh viên </h1>	
        <form bgcolor=#CCC method="post" action="quantri.php?url=suasvdslop.php&mssv=<?php echo $data['mssv']; ?>">
            <table bgcolor=#CCC width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MSSV</td>
                    <td>
                        <input type="text" name="mssvn" value="<?php echo $data['mssv']; ?>"/>
                        <?php if (!empty($errors['mssv'])) echo $errors['mssv']; ?>
                    </td>
                </tr>
                <tr>
                    <td>HỌ TÊN</td>
                    <td>
                        <input type="text" name="namen" value="<?php echo $data['hoten']; ?>"/>
                        <?php if (!empty($errors['hoten'])) echo $errors['hoten']; ?>
                    </td>
                </tr>
		<tr>
                    <td>NGÀY SINH</td>
                    <td>
                        <input type="text" name="ngaysinhn" value="<?php echo $data['ngaysinh']; ?>"/>
			<?php if (!empty($errors['ngaysinh'])) echo $errors['ngaysinh']; ?>
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
                    <td>QUÊ QUÁN</td>
                    <td>
                        <input type="text" name="quequann" value="<?php echo $data['quequan']; ?>"/>
 			<?php if (!empty($errors['quequan'])) echo $errors['quequan']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="mssv" value="<?php echo $data['mssv']; ?>"/>
                        <input type="submit" name="suasv" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>
    </body>
</html>
