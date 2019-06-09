<?php
require './connect.php';
connect_db();
  if (!$conn) {
	echo "Cannot connect database\n";
        exit;
   }
$mssv = $_SESSION['taikhoan']; 
$result1 = pg_query($conn,"select sum(tinchi) from dangki where mssv = '$mssv' ");
$tin1 = array();
$row1  = pg_fetch_assoc($result1);
$tin1 = $row1;
if (!empty($_POST['dk']))
{
   $data['mamhn']    = isset($_POST['mamhn']) ? $_POST['mamhn'] : '';
   $result2 = pg_query($conn,"select tinchi from monhoc where mamh = '$data[mamhn]' ");
   $tin2 = array();
   $row2 = pg_fetch_assoc($result2);
   $tin2 = $row2;
   $tongtin = $tin1['sum'] + $tin2['tinchi'];
   if($tongtin > 12)
      {
         $errors['1'] = 'Không được đăng kí quá 12 tín chỉ !';
      }
   else{
   $query = pg_query($conn," with test as ( select s.mssv, m.tenmh, m.mamh, m.tinchi, m.makhoa from sinhvien s,    monhoc m where s.mssv = '$mssv' and m.mamh = '$data[mamhn]') INSERT INTO dangki(select * from test) ");

   header("location: user.php?url=dangki.php");
   }
}
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách đăng kí </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
	<div align="center">
        <h1>Danh sách đăng kí</h1>
        <form method="post" action="user.php?url=dangki.php">
        <tr>
             <td> Mã môn học đăng kí:
	     </td>
             <td>
		  <input type="text" name="mamhn" />
   	     </td>
             <td>
		  <input type="submit" name ="dk" value="Đăng kí"/>
             </td>
	</tr>
        <br></br><br></br>
        </form>
          
        
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>MÃ MÔN HỌC </td>
                <td>TÊN MÔN HỌC </td>
                <td>TÍN CHỈ </td>
		<td>KHOA </td>
            </tr>
		<?php
		       
		$result = pg_query($conn, "SELECT * from dangki  where mssv = '$mssv' ");
		if (!$result) {
		echo "Cannot find database\n";
		exit;
		}

		while ($row = pg_fetch_row($result)) {?>
		 
            <tr>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[3]; ?></td>
		<td><?php echo $row[4]; ?></td>
		<td>
                    <form method="post" action="xoadk.php">
                        <input type="hidden" name="mamh" value="<?php echo $row[2]; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="xoadk" value="Xóa"/>
                    </form>
                </td>
		
            </tr>
            <?php } ?>
        </table></br>
        <tr>
		<?php
		    if (!empty($errors['1'])) echo $errors['1'];			
		?>
	</tr>
      <br/><br/>
     Tổng tín chỉ: <?php echo $tin1['sum'] ; ?>
         <br/> <br/>
     </div>
    </body>
</html>
