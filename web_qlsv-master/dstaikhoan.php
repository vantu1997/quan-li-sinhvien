
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách tài khoản </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách tài khoản </h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>TÀI KHOẢN </td>
                <td>MẬT KHẨU </td>
        
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		            }
		$result = pg_query($conn, "SELECT * FROM taikhoan order by(taikhoan) ");
		if (!$result) {
		echo "Cannot find database\n";
		exit;
		}

		while ($row = pg_fetch_row($result)) {?>
		 
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
               
                <td>
                   
                    <form method="post" action="xoataikhoan.php">
                        <input type="hidden" name="taikhoan" value="<?php echo $row[0]; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="xoataikhoan" value="Xóa"/>
                    </form>
                       
                </td>
            </tr>
            <?php } ?>
        </table>
	</div>	
         <br/> <br/>
    </body>
</html>
