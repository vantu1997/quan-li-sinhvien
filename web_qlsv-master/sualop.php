<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$malop = isset($_GET['malop']) ? (string)$_GET['malop'] : '';

	$query = pg_query($conn, "SELECT * from lop where malop = '$malop' ");
	$data = array();
	if (pg_num_rows($query) > 0){
        	$row = pg_fetch_assoc($query);
        	$data = $row;
    	}
        
if (!empty($_POST['sualop']))
{
    // Lay data
    $data['malop']         = isset($_POST['malopn']) ? $_POST['malopn'] : '';
    $data['tenlop']        = isset($_POST['tenlopn']) ? $_POST['tenlopn'] : '';
    $data['makhoaquanli']  = isset($_POST['makhoaquanlin']) ? $_POST['makhoaquanlin'] : '';
    $data['magv']          = isset($_POST['magvn']) ? $_POST['magvn'] : '';
   
    // Validate thong tin
    $errors = array();
    if (empty($data['malop'])){
        $errors['malop'] = 'Chưa nhập mã lớp';
    }
    if (empty($data['tenlop'])){
        $errors['tenlop'] = 'Chưa nhập tên lớp';
    }
    if (empty($data['makhoaquanli'])){
        $errors['makhoaquanli'] = 'Chưa nhập mã khoa';
    }
    if (empty($data['magv'])){
   	$errors['magv'] = 'Chưa nhập mã giáo viên';
    }
     
    
    
    // Neu ko co loi thi insert
    if (!$errors){
        $query = pg_query($conn, " UPDATE lop SET malop = '$data[malop]', tenlop = '$data[tenlop]', makhoaquanli = '$data[makhoaquanli]', magv = '$data[magv]' WHERE malop = '$malop' ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dslop.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin lớp</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Sửa thông tin lớp </h1>
	
        <form method="post" action="quantri.php?url=sualop.php&malop=<?php echo $data['malop']; ?>">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MÃ LỚP</td>
                    <td>
                        <input type="text" name="malopn" value="<?php echo $data['malop']; ?>"/>
                        <?php if (!empty($errors['malop'])) echo $errors['malop']; ?>
                    </td>
                </tr>
                <tr>
                    <td>TÊN Lớp</td>
                    <td>
                        <input type="text" name="tenlopn" value="<?php echo $data['tenlop']; ?>"/>
                        <?php if (!empty($errors['tenlop'])) echo $errors['tenlop']; ?>
                    </td>
                </tr>
		<tr>
                    <td>MÃ KHOA</td>
                    <td>
                        <input type="text" name="makhoaquanlin" value="<?php echo $data['makhoaquanli']; ?>"/>
                        <?php if (!empty($errors['makhoaquanli'])) echo $errors['makhoaquanli']; ?>
                    </td>
                </tr>
		<tr>
                    <td>MÃ GIÁO VIÊN</td>
                    <td>
                        <input type="text" name="magvn" value="<?php echo $data['magv']; ?>"/>
                        <?php if (!empty($errors['magv'])) echo $errors['magv']; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="malop" value="<?php echo $data[0]; ?>"/>
                        <input type="submit" name="sualop" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>
    </body>
</html>
