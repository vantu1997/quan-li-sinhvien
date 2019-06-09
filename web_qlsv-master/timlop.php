<html>
    <head>
        <title>Tìm kiếm danh sách lớp  </title>
    </head>
    <body>
	<br/>
	<form action="user.php?url=timlop.php" method="post">
		<br/>
                Nhập mã lớp hoặc tên lớp : <input type="text" name="timkiem" />
                <input type="submit" name="ok" value="search" />
            </form>
        <div align="center">
	<?php
		if (!empty($_POST['ok']))
		{
		require './connect.php';
		connect_db();
		if (!$conn) {
		echo "Cannot connect database\n";
		exit;
		}
		   $data['timkiem']    = isset($_POST['timkiem']) ? $_POST['timkiem'] : '';
		if($data['timkiem'] != null){
		   $query = pg_query($conn,"select * from sinhvien where malop = '$data[timkiem]' or malop in (select malop from lop where tenlop  = '$data[timkiem]') ");
		if (pg_num_rows($query) > 0){		
		 echo'<table width="100%" border="1" cellspacing="0" cellpadding="10">';
            echo'<tr>';
                echo'<td>MSSV</td>';
                echo'<td>HỌ TÊN</td>';
                echo'<td>NGÀY SINH </td>';
                echo'<td>GIỚI TÍNH </td>';
		echo'<td>QUÊ QUÁN </td>';
		echo'<td>LỚP </td>';
		echo'<td>KHOA</td>';
            echo'</tr>';
		while ($row = pg_fetch_row($query)) {
		echo'<tr>';
                echo'<td>'; echo $row[0]; echo'</td>';
                echo'<td>'; echo $row[1]; echo'</td>';
                echo'<td>'; echo $row[2]; echo'</td>';
                echo'<td>'; echo $row[3]; echo'</td>';;
		echo'<td>'; echo $row[4]; echo'</td>';
		echo'<td>'; echo $row[5]; echo'</td>';
		echo'<td>'; echo $row[6]; echo'</td>';
		echo'</tr>';
		}
		echo'</table>' ;  
		} 	
		else{echo"Không tìm thấy lớp sinh viên !";}
	}
	}
	?>        
        </div>
	
    </body>
</html>
