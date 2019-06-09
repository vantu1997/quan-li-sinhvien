<?php

	
        
if (!empty($_POST['add_taikhoan']))
{
    // Lay data
    
    $data['taikhoan'] 	 = isset($_POST['taikhoann']) ? $_POST['taikhoann'] : '';
    $data['matkhau']        = isset($_POST['matkhaun']) ? $_POST['matkhaun'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['taikhoan'])){
    	$errors['taikhoan'] = 'Chưa nhập tên tài khoản';
    }
    if (empty($data['matkhau'])){
        $errors['matkhau'] = 'Chưa nhập mật khẩu';
    }
     
    
    
    // Neu ko co loi thi insert
    if (!$errors){
        require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
        $query = pg_query($conn, " INSERT INTO taikhoan( taikhoan,matkhau ) VALUES( '$data[taikhoan]', '$data[matkhau]' ) ");
        // Trở về trang danh sách
        header("location: quantri.php?url=dstaikhoan.php");
    }
}
?>
<!DOCTYPE html>	 	
<html>
    <head>
        <title>Thêm tài khoản </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Thêm tài khoản  </h1>
        <a href="quantri.php?url=dstaikhoan.php">Trở về</a> <br/> <br/>
	
        <form method="post" action="quantri.php?url=themtaikhoan.php">
            <table width="70%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td> Tên tài khoản </td>
                    <td>
                        <input type="text" name="taikhoann" value="<?php echo !empty($data['taikhoan']) ? $data['taikhoan'] : ''; ?>"/>
                        <?php if (!empty($errors['taikhoan'])) echo $errors['taikhoan']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu </td>
                    <td>
                        <input type="text" name="matkhaun" value="<?php echo !empty($data['matkhau']) ? $data['matkhau'] : ''; ?>"/>
                        <?php if (!empty($errors['matkhau'])) echo $errors['matkhau']; ?>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>                    
                        <input type="submit" name="add_taikhoan" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
	</div>	
    </body>
</html>
