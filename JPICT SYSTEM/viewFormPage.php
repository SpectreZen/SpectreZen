<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'jpict_sts';

// Server is localhost with
// port number 3306
$servername = 'localhost:3306';
$mysqli = new mysqli(
	$servername,
	$user,
	$password,
	$database
);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
		$mysqli->connect_errno . ') ' .
		$mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM formpage where code='" . $_GET['code'] . "'";
$var_value = "SELECT * FROM item ";
//$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<!--===============================================================================================-->


	<title>View Form</title>
</head>

<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid col-md-10">
			<span class="navbar-brand mb-0 h1">JPICT STATUS TRACKING SYSTEM</span>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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

	<div class="container-fluid">
		<div class="row">
			<main role="main" class="col-md-9 mx-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Lihat Borang</h1>
				</div>
			</main>
		</div>
	</div>

	<!-- search name -->
	<input class="form-control col-md-10 mx-auto" type="text" id="search" onkeyup="searchSchoolRujukan();" placeholder="Cari No. Rujukan Surat Sekolah">
	<br>

	<table class="table table-bordered col-md-10 mx-auto" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col" style="text-align: center;vertical-align: middle;">No. Surat Rujukan Sekolah</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Senarai Perkakasan</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Kuantiti</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Kos Seunit</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Jumlah</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Sumber Peruntukan Sekolah</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Status Perkakasan</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Kemaskini Perkakasan</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">No. Tel. PIC</th>
				<th scope="col" style="text-align: center;vertical-align: middle;">Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// LOOP TILL END OF DATA
			while ($rows = $result2->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $rows['suratRujukan']; ?></td>
					<td>
						<?php

						$mysqli = new mysqli(
							$servername,
							$user,
							$password,
							$database
						);

						// Checking for connections
						if ($mysqli->connect_error) {
							die('Connect Error (' .
								$mysqli->connect_errno . ') ' .
								$mysqli->connect_error);
						}

						// SQL query to select data from database
						$sql = "SELECT * FROM item where suratRujukan='" . $rows['suratRujukan'] . "'";
						$result = $mysqli->query($sql);
						$r_array = [];
						$count = 0;
						while($r = $result->fetch_assoc()){
							$r_array[] = $r;
							$count++;
							echo $r['perkakasan'] . '<br>'. '<br>';
						}
						$mysqli->close();
						?> 
						<br>
					</td>
					<td><?php 
						for($i = 0; $i < $count ; $i++ ){
							echo $r_array[$i]['kuantiti'] . '<br>'. '<br>';
						}
					?><br>
					</td>
					<td><?php 
						for($i = 0; $i < $count ; $i++ ){
							echo $r_array[$i]['kosUnit'] . '<br>'. '<br>';
						}
					?>
					</td>
					<td><?php 
						for($i = 0; $i < $count ; $i++ ){
							echo $r_array[$i]['jumlahRM'] . '<br>'. '<br>';
						}
					?>
					</td>
					<td><?php 
						for($i = 0; $i < $count ; $i++ ){
							echo $r_array[$i]['sumberPeruntukan'] . '<br>';
						}
					?>
					</td>
					<td><?php 
						for($i = 0; $i < $count ; $i++ ){
							echo $r_array[$i]['statusBarang'] . '<br>'. '<br>';
						}
					?>
					</td>

					<td><?php 
						for($i = 0; $i < $count ; $i++ ){
							echo '<a href="updateItemSchool.php?itemID='. $r_array[$i]['itemID']. '">Kemaskini</a><br><br>';
						}
					?><br><a href="deleteItemSchool.php?suratRujukan=<?php echo $rows['suratRujukan'];?>"> Hapus Semua</a></td> 
						  </td>
					<td><?php echo $rows['noTel']; ?></td>
					<td><a href="formItemschool.php?suratRujukan=<?php echo $rows['suratRujukan'];?>">Tambah Perkakasan</a> &nbsp; 
					
				</tr>
			<?php } ?>
		</tbody>

	</table>

	<script>
		function searchSchoolRujukan() {
			// Declare variables
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("search");
			filter = input.value.toUpperCase();
			table = document.getElementById("table");
			tr = table.getElementsByTagName("tr");

			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
	</script>

	<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script>
	<script>
		// Shorthand for $( document ).ready()
		$(function() {
			var error = Cookies.get('error');
			if (typeof error !== 'undefined') {
				var message = Cookies.get('message').replace(/-/g, " ");
				if (error == 1) {
					$("#message-error").html(message);
					$("#error").modal("show");
				} else {
					$("#message-success").html(message);
					$("#success").modal("show");
				}
				Cookies.remove('error', {
					path: ''
				});
				Cookies.remove('message', {
					path: ''
				});
			}

		});
	</script>
</body>

</html>