<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
$mssv = isset($_POST[mssv]) ? (string)$_POST[mssv] : '';

if ($mssv){
    $query = pg_query($conn, " DELETE FROM sinhvien
            WHERE mssv = '$mssv' ");
}
 
// Trở về trang danh sách
header("location: quantri.php?url=dssv.php");
?>
