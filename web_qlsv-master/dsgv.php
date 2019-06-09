
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách giảng viên </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách giảng viên </h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MÃ GIẢNG VIÊN  </td>
                <td>HỌ TÊN </td>
                <td>GIỚI TÍNH</td>
		<td>EMAIL </td>
		<td>KHOA</td>
                <td>Options</td>
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		            }
		$result = pg_query($conn, "SELECT * FROM giangvien order by(magv) ");
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
                <td>
                    <form method="post" action="xoagv.php">
                        <input onclick="window.location = 'quantri.php?url=suagv.php&magv=<?php echo $row[0]; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="magv" value="<?php echo $row[0]; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="xoagv" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
	</div>	
         <br/> <br/>
    </body>
</html>
