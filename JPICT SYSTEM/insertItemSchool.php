<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "jpict_sts");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$perkakasan = $mysqli->real_escape_string($_REQUEST['perkakasan']);
$kuantiti = $mysqli->real_escape_string($_REQUEST['kuantiti']);
$kosUnit = $mysqli->real_escape_string($_REQUEST['kosUnit']);
$jumlahRM = $mysqli->real_escape_string($_REQUEST['jumlahRM']);
$sumberPeruntukan = $mysqli->real_escape_string($_REQUEST['sumberPeruntukan']);
$statusBarang = $mysqli->real_escape_string($_REQUEST['statusBarang']);
$suratRujukan = $mysqli->real_escape_string($_REQUEST['suratRujukan']);

 
// Attempt insert query execution
$sql = "INSERT INTO item (perkakasan, kuantiti, kosUnit, jumlahRM, sumberPeruntukan, statusBarang, suratRujukan ) 
VALUES ('$perkakasan', '$kuantiti', '$kosUnit', '$jumlahRM', '$sumberPeruntukan' , '$statusBarang' , '$suratRujukan' )";
if($mysqli->query($sql) === true){
    echo "<script>alert('Records inserted successfully.'); window.location.href='AdminHome.php';</script>";

} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 

// Close connection
$mysqli->close();

?>