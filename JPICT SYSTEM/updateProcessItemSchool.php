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
    $perkakasan = $_POST['perkakasan'];
    $kuantiti = $_POST['kuantiti'];
    $kosUnit = $_POST['kosUnit'];
    $jumlahRM = $_POST['jumlahRM'];
    $sumberPeruntukan = $_POST['sumberPeruntukan'];
    $statusBarang = $_POST['statusBarang'];

    $sql = "UPDATE item SET 
        perkakasan='".$perkakasan."',
        kuantiti='".$kuantiti."',
        kosUnit='".$kosUnit."',
        jumlahRM='".$jumlahRM."',
        sumberPeruntukan='".$sumberPeruntukan."',
        statusBarang='".$statusBarang."' where itemID='" . $_POST['itemID'] . "'";

        if ($conn->multi_query($sql) == TRUE) {
            echo "<script>alert('Records updated successfully.'); window.location.href='AdminHome.php'; </script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
           
  }
  $conn->close();

?>