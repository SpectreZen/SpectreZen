<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name is geeksforgeeks
$database = 'jpict_sts';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = "SELECT * FROM item where itemID='" . $_GET['itemID'] . "'";

$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

<title>Form Item</title>
</head>

<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid col-md-10">
			<span class="navbar-brand mb-0 h1">JPICT STATUS TRACKING SYSTEM</span>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a htype="button" class="btn btn-sm btn-outline-secondary; fa fa-home" href="AdminHome.php"> Home </a>
				</div>
			</div>
			<ul class="navbar-nav px-3">
				<a htype="button" class="btn btn-sm btn-outline-secondary; fa fa-sign-out" href="logout.php"> Log Keluar </a>
			</ul>
		</div>
	</nav>

	<div class="row d-flex justify-content-center align-items-center center">
		<div class="col-md-6" style="padding: 20px;">
			<div class="card">
				<div class="card-header">Borang Perolehan Peralatan ICT Sekolah</div>
				<div class="card-body">
					<form action="updateProcessItemSchool.php" method="post" >
						<?php
                		// LOOP TILL END OF DATA
               			 while($rows=$result->fetch_assoc()){
						?>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="perkakasan">Perkakasan</label> 
                                <input type="text" class="form-control" id="perkakasan" name="perkakasan" placeholder="Dua Patah Perkataan Sahaja">
							</div>
							<div class="form-group col-md-6">
								<label for="kuantiti">Kuantiti Barang</label> <input type="text" class="form-control" id="kuantiti" name="kuantiti" placeholder="Nombor Sahaja">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="kosUnit">Kos Seunit (RM)</label> <input type="text" class="form-control" id="kosUnit" name="kosUnit" placeholder="Nombor Sahaja">
							</div>
							<div class="form-group col-md-6">
								<label for="jumlahRM">Jumlah (RM)</label> <input type="text" class="form-control" id="jumlahRM" name="jumlahRM" placeholder="Nombor Sahaja">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="sumberPeruntukan">Sumber Peruntukan </label> <input type="text" class="form-control" id="sumberPeruntukan" 
								placeholder="Tiga Patah Perkataan Sahaja" name="sumberPeruntukan">
							</div>
							<div class="form-group col-md-6">
							<label for="statusBarang">Status Barang</label> 
									<select id="statusBarang" class="form-control" name="statusBarang">
										<option value="Diterima">Diterima</option>
										<option value="Tidak Lengkap">Tidak Lengkap</option>
										<option value="Angkat Semula">Angkat Semula</option>
										<option value="Diluluskan">Diluluskan</option>
										<option value="Tidak Diluluskan">Tidak Lulus</option>
										<option value="Tidak Berkaitan">Tidak Berkaitan</option>
										<option value="Diproses">Diproses</option>
									</select>
							</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="itemID">Item ID</label> <input type="text" class="form-control" id="itemID" name="itemID"
								value="<?php echo $rows['itemID']?>" readonly>
							</div>
						</div>	
						<button type="submit" id="sub" class="btn btn-block btn-primary">Kemaskini</button>
						<?php }?>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>