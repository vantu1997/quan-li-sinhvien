
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách lớp </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách lớp </h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MÃ LỚP </td>
                <td>TÊN LỚP</td>
                <td>MÃ KHOA QUẢN LÍ</td>
                <td>MÃ GIÁO VIÊN </td>
		
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		            }
		$result = pg_query($conn, "SELECT * FROM lop order by(malop) ");
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
                    
                        <input onclick="window.location = 'quantri.php?url=dssvlop.php&malop=<?php echo $row[0]; ?>'" type="button" value="dssv"/>
                        <input onclick="window.location = 'quantri.php?url=sualop.php&malop=<?php echo $row[0]; ?>'" type="button" value="Sửa"/>
                       
                </td>
            </tr>
            <?php } ?>
        </table>
	</div>	
         <br/> <br/>
    </body>
</html>
