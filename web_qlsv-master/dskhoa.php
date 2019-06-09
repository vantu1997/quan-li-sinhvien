
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách khoa </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách khoa </h1>
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MÃ KHOA </td>
                <td>TÊN KHOA </td>
        
            </tr>
		<?php
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		            }
		$result = pg_query($conn, "SELECT * FROM khoa order by(makhoa) ");
		if (!$result) {
		echo "Cannot find database\n";
		exit;
		}

		while ($row = pg_fetch_row($result)) {?>
		 
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
               
                <td>
                   
                        <input onclick="window.location = 'quantri.php?url=suakhoa.php&makhoa=<?php echo $row[0]; ?>'" type="button" value="Sửa"/>
                       
                </td>
            </tr>
            <?php } ?>
        </table>
	</div>	
         <br/> <br/>
    </body>
</html>
