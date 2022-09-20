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
    $code = $_POST['code'];
    $headmasterName = $_POST['headmasterName'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $noPhone = $_POST['noPhone'];
    $address = $_POST['address'];
    $district = $_POST['district'];
    $type = $_POST['type'];
    $category = $_POST['category'];

    $sql = "UPDATE school SET 
        code='".$code."',
        headmasterName='".$headmasterName."',
        password='".$password."',
        name='".$name."',
        noPhone='".$noPhone."',
        address='".$address."',
        district='".$district."',
        type='".$type."', 
        category='".$category."' where username='" . $_POST['username'] . "'";

        if ($conn->multi_query($sql) == TRUE) {
            echo "<script>alert('Records updated successfully.'); window.location.href='AdminHome.php';</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
           
  }
  $conn->close();

?>