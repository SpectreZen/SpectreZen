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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $mesyuarat = $_POST['mesyuarat'];
    $suratDiterima = $_POST['suratDiterima'];
    $permohonanDiterima = $_POST['permohonanDiterima'];
    $lulusJpict = $_POST['lulusJpict'];
    $status = $_POST['status'];
    $noTel = $_POST['noTel'];

    $sql = "UPDATE formpage SET 
        mesyuarat='".$mesyuarat."',
        suratDiterima='".$suratDiterima."',
        permohonanDiterima='".$permohonanDiterima."',
        lulusJpict='".$lulusJpict."',
        status='".$status."',
        noTel='".$noTel."' where suratRujukan='" . $_POST['suratRujukan'] . "'";

        if ($conn->multi_query($sql) == TRUE) {
            echo "<script>alert('Records updated successfully.'); window.location.href='AdminHome.php'; </script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
           
  }
  $conn->close();

?>