
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách môn học </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách môn học </h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MÃ MÔN HỌC </td>
                <td>TÊN MÔN HỌC </td>
                <td>TÍN CHỈ </td>
                <td>MÃ KHOA </td>
		
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		            }
		$result = pg_query($conn, "SELECT * FROM monhoc order by(tinchi) ");
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
		
                <td>
                    <form method="post" action="xoamonhoc.php">
                        <input onclick="window.location = 'quantri.php?url=suamonhoc.php&mamh=<?php echo $row[0]; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="mamh" value="<?php echo $row[0]; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="xoamonhoc" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
	</div>
         <br/> <br/>
    </body>
</html>
