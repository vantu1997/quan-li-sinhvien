<?php 
function connect_db()
{
    global $conn;
     
    if (!$conn){
        $conn = pg_connect("host=localhost dbname=mydb user=postgres password='123'");
    }
}
?>
	
