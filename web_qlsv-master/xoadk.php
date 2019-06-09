<?php
require './connect.php';
	connect_db();
	if (!$conn) {
	echo "Cannot connect database\n";
	exit;
	}
$mamh = isset($_POST[mamh]) ? (string)$_POST[mamh] : '';

if ($mamh){
    $query = pg_query($conn, " DELETE FROM dangki
            WHERE mamh = '$mamh' ");
}
 
// Trở về trang danh sách
header("location: user.php?url=dangki.php");
?>
