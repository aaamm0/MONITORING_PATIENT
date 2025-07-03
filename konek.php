
<?php
date_default_timezone_set("Asia/Jakarta");
$servername = "localhost";   
$username = "aam";         
$password = "aam123";            
$dbname = "aam_monitor";    
// $servername = "localhost";   
// $username = "root";         
// $password = "";            
// $dbname = "perawat_db";    

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
