<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
$magv = isset($_POST[magv]) ? (string)$_POST[magv] : '';

if ($magv){
    $query = pg_query($conn, " DELETE FROM giangvien
            WHERE magv = '$magv' ");
}
 
// Trở về trang danh sách
header("location: quantri.php?url=dsgv.php");
?>
