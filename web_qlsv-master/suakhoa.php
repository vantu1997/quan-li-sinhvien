<?php

	require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
	$makhoa = isset($_GET[makhoa]) ? (string)$_GET[makhoa] : '';

	$query = pg_query($conn, "SELECT * from khoa where makhoa = '$makhoa' ");
	$data = array();
	if (pg_num_rows($query) > 0){
        	$row = pg_fetch_assoc($query);
        	$data = $row;
    	}
        
if (!empty($_POST['suakhoa']))
{
    // Lay data
    $data['makhoa']         = isset($_POST['makhoan']) ? $_POST['makhoan'] : '';
    $data['tenkhoa']        = isset($_POST['tenkhoan']) ? $_POST['tenkhoan'] : '';
   
    // Validate thong tin
    $errors = array();
    if (empty($data['makhoa'])){
        $errors['makhoa'] = 'Chưa nhập mã khoa';
    }
    if (empty($data['tenkhoa'])){
        $errors['tenkhoa'] = 'Chưa nhập tên khoa';
    }
     
    
    
    // Neu ko co loi thi insert
    if (!$errors){
        $query = pg_query($conn, " UPDATE khoa SET makhoa = '$data[makhoa]', tenkhoa = '$data[tenkhoa]' WHERE makhoa = '$makhoa' ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dskhoa.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin khoa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Sửa thông tin khoa </h1>
	
        <form method="post" action="quantri.php?url=suakhoa.php&makhoa=<?php echo $data['makhoa']; ?>">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>MÃ KHOA</td>
                    <td>
                        <input type="text" name="makhoan" value="<?php echo $data['makhoa']; ?>"/>
                        <?php if (!empty($errors['makhoa'])) echo $errors['makhoa']; ?>
                    </td>
                </tr>
                <tr>
                    <td>TÊN KHOA</td>
                    <td>
                        <input type="text" name="tenkhoan" value="<?php echo $data['tenkhoa']; ?>"/>
                        <?php if (!empty($errors['tenkhoa'])) echo $errors['tenkhoa']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="makhoa" value="<?php echo $data[0]; ?>"/>
                        <input type="submit" name="suakhoa" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>	
    </body>
</html>
