<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "jpict_sts");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$suratRujukan = $mysqli->real_escape_string($_REQUEST['suratRujukan']);
$mesyuarat = $mysqli->real_escape_string($_REQUEST['mesyuarat']);
$suratDiterima = $mysqli->real_escape_string($_REQUEST['suratDiterima']);
$permohonanDiterima = $mysqli->real_escape_string($_REQUEST['permohonanDiterima']);
$lulusJpict = $mysqli->real_escape_string($_REQUEST['lulusJpict']);
$status = $mysqli->real_escape_string($_REQUEST['status']);
$noTel = $mysqli->real_escape_string($_REQUEST['noTel']);
$code = $mysqli->real_escape_string($_REQUEST['code']);

 
// Attempt insert query execution
$sql = "INSERT INTO formpage (suratRujukan, mesyuarat, suratDiterima, permohonanDiterima, lulusJpict, status, noTel, code ) 
VALUES ('$suratRujukan', '$mesyuarat', '$suratDiterima', '$permohonanDiterima', '$lulusJpict', '$status', '$noTel', '$code')";
if($mysqli->query($sql) === true){
    echo "<script>alert('Records inserted successfully.'); window.location.href='AdminHome.php';</script>";

} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 

// Close connection
$mysqli->close();


?>