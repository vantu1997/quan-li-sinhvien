
 
<!DOCTYPE html>
<html>
    <head>
        <title>Chương trình học </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Chương trình học  </h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MÃ MÔN HỌC </td>
                <td>TÊN MÔN HỌC </td>
                <td>TÍN CHỈ </td>
                <td> KÌ HỌC</td>
                <td>MÃ KHOA </td>
		
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
                exit;
                }
		$mssv = $_SESSION['taikhoan'];          
		$result = pg_query($conn, "SELECT c.* from chuongtrinhhoc c,sinhvien s where s.mssv = '$mssv' and s.makhoaquanli = c.vien order by(kihoc) ");
		if (!$result) {
		echo "Cannot find database\n";
		exit;
		}

		while ($row = pg_fetch_row($result)) {?>
		 
            <tr>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
		
            </tr>
            <?php } ?>
        </table>
	</div>
         <br/> <br/>
    </body>
</html>
