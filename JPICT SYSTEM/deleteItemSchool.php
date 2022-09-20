<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jpict_sts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM item WHERE suratRujukan='" . $_GET['suratRujukan'] . "'";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Records deleted successfully.'); window.location.href='AdminHome.php';</script>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>