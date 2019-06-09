<?php

	
        
if (!empty($_POST['add_lop']))
{
    // Lay data
    
    $data['malop'] 	 = isset($_POST['malopn']) ? $_POST['malopn'] : '';
    $data['tenlop']        = isset($_POST['tenlopn']) ? $_POST['tenlopn'] : '';
    $data['makhoaquanli']         = isset($_POST['makhoaquanlin']) ? $_POST['makhoaquanlin'] : '';
    $data['magv']         = isset($_POST['magvn']) ? $_POST['magvn'] : '';
    // Validate thong tin
    $errors = array();
    if (empty($data['malop'])){
    	$errors['malop'] = 'Chưa nhập mã lớp';
    }
    if (empty($data['tenlop'])){
        $errors['tenlop'] = 'Chưa nhập tên lớp ';
    }
     
    if (empty($data['makhoaquanli'])){
        $errors['makhoaquanli'] = 'Chưa nhập khoa ';
    }
    if (empty($data['magv'])){
        $errors['magv'] = 'Chưa nhập mã giảng viên  ';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
        $query = pg_query($conn, " INSERT INTO lop( malop, tenlop,makhoaquanli, magv ) VALUES( '$data[malop]', '$data[tenlop]', '$data[makhoaquanli]',  '$data[magv]' ) ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dslop.php");
    }
}
?>
<!DOCTYPE html>	 	
<html>
    <head>
        <title>Thêm lớp </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Thêm lớp  </h1>
        <a href="quantri.php?url=dslop.php">Trở về</a> <br/> <br/>
	
        <form method="post" action="quantri.php?url=themlop.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mã lớp </td>
                    <td>
                        <input type="text" name="malopn" value="<?php echo !empty($data['malop']) ? $data['malop'] : ''; ?>"/>
                        <?php if (!empty($errors['malop'])) echo $errors['malop']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tên lớp </td>
                    <td>
                        <input type="text" name="tenlopn" value="<?php echo !empty($data['tenlop']) ? $data['tenlop'] : ''; ?>"/>
                        <?php if (!empty($errors['tenlop'])) echo $errors['tenlop']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Khoa  </td>
                    <td>
                        <input type="text" name="makhoaquanlin" value="<?php echo !empty($data['makhoaquanli']) ? $data['makhoaquanli'] : ''; ?>"/>
                        <?php if (!empty($errors['makhoaquanli'])) echo $errors['makhoaquanli']; ?>
                    </td>
                </tr>
		<tr>
                    <td>Mã giảng viên</td>
                    <td>
                        <input type="text" name="magvn" value="<?php echo !empty($data['magv']) ? $data['magv'] : ''; ?>"/>
                        <?php if (!empty($errors['magv'])) echo $errors['magv']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>                    
                        <input type="submit" name="add_lop" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>
    </body>
</html>
