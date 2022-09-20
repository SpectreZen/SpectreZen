<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "jpict_sts");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$username = $mysqli->real_escape_string($_REQUEST['username']);
$headmasterName = $mysqli->real_escape_string($_REQUEST['headmasterName']);
$name = $mysqli->real_escape_string($_REQUEST['name']);
$noPhone = $mysqli->real_escape_string($_REQUEST['noPhone']);
$address = $mysqli->real_escape_string($_REQUEST['address']);
$district = $mysqli->real_escape_string($_REQUEST['district']);
$code = $mysqli->real_escape_string($_REQUEST['code']);
$type = $mysqli->real_escape_string($_REQUEST['type']);
$category = $mysqli->real_escape_string($_REQUEST['category']);

 
// Attempt insert query execution
$sql = "INSERT INTO school (username, headmasterName, name, noPhone, address, district, code, type, category) 
VALUES ('$username', '$headmasterName', '$name', '$noPhone', '$address', '$district', '$code', '$type','$category')";
if($mysqli->query($sql) === true){
    echo "<script>alert('Records inserted successfully.'); window.location.href='AdminHome.php';</script>";

} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 

// Close connection
$mysqli->close();


?>