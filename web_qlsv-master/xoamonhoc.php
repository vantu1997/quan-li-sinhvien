<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
$mamh = isset($_POST[mamh]) ? (string)$_POST[mamh] : '';

if ($mamh){
    $query = pg_query($conn, " DELETE FROM monhoc
            WHERE mamh = '$mamh' ");
}
 
// Trở về trang danh sách
header("location: quantri.php?url=dsmonhoc.php");
?>
