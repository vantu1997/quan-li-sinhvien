<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
$taikhoan = isset($_POST[taikhoan]) ? (string)$_POST[taikhoan] : '';

if ($taikhoan){
    $query = pg_query($conn, " DELETE FROM taikhoan
            WHERE taikhoan = '$taikhoan' ");
}
 
// Trở về trang danh sách
header("location: quantri.php?url=dstaikhoan.php");
?>
