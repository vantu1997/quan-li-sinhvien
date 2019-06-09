<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
$mssv = isset($_POST[mssv]) ? (string)$_POST[mssv] : '';
$query = pg_query($conn, "SELECT * from sinhvien where mssv = '$mssv' ");
$data = array();
$row = pg_fetch_assoc($query);
$data = $row;
if ($mssv){
    $query = pg_query($conn, " DELETE FROM sinhvien
            WHERE mssv = '$mssv' ");
}
 
// Trở về trang danh sách
header("location: quantri.php?url=dssvlop.php&malop=$data[malop]");
?>
