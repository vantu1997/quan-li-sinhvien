
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách sinh viên</h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MSSV</td>
                <td>HỌ TÊN</td>
                <td>NGÀY SINH</td>
                <td>GIỚI TÍNH</td>
		<td>QUÊ QUÁN</td>
		<td>LỚP</td>
		<td>KHOA</td>
                <td>Options</td>
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		            }
		$result = pg_query($conn, "SELECT * FROM sinhvien order by(mssv) ");
		if (!$result) {
		echo "Cannot find database\n";
		exit;
		}

		while ($row = pg_fetch_row($result)) {?>
		 
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
		<td><?php echo $row[4]; ?></td>
		<td><?php echo $row[5]; ?></td>
		<td><?php echo $row[6]; ?></td>
                <td>
                    <form method="post" action="xoasvdssv.php">
                        <input onclick="window.location = 'quantri.php?url=suasvdssv.php&mssv=<?php echo $row[0]; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="mssv" value="<?php echo $row[0]; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="xoasv" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
	</div>	
         <br/> <br/>
    </body>
</html>
