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
$sql = "SELECT * FROM school where username='" . $_GET['username'] . "'";
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
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Update School</title>
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
				<div class="card-header">Kemaskini Sekolah</div>
				<div class="card-body">
					<form action="updateProcess.php" method="POST">
						<?php
                		// LOOP TILL END OF DATA
               			 while($rows=$result->fetch_assoc()){
						?>
						<input type="hidden" name="MOUsername" value="${username}" />
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="username">Nama Pengguna</label> 
								<input type="text" class="form-control" id="username" name="username" value="<?php echo $rows['username']?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="category">Lokasi</label> <select id="category" class="form-control" name="category">
									<option value="Bandar">Bandar</option>
									<option value="Luar Bandar">Luar Bandar</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="schoolname">Nama Sekolah</label> <input type="text" class="form-control" id="schoolname" name="name" pattern="^[\S][a-zA-Z\s]*"
								value="<?php echo $rows['name']?>" title="Alphabet Only!" readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="headmasterName">Nama Guru Besar</label> <input type="text" class="form-control" id="headmasterName"
									name="headmasterName" pattern="^[\S][a-zA-Z\s]*" placeholder="Nama Guru Besar" title="Alphabet Only!">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="noPhone">Nombor Telefon</label> <input type="text" class="form-control" id="noPhone" name="noPhone"
									pattern="^0[1-9]{1,2}[\s|-]*\d*" placeholder="Example: 01112345678 or 0123456789" title="Proper Phone Number!"><span class="text-danger" id="resultPhone"></span>
							</div>
							<div class="form-group col-md-6">
								<label for="district">Daerah</label> <select id="district" class="form-control" name="district">
									<option value="Cameron Highlands">Cameron Highlands</option>
									<option value="Lipis">Lipis</option>
									<option value="Jerantut">Jerantut</option>
									<option value="Kuantan">Kuantan</option>
									<option value="Raub">Raub</option>
									<option value="Maran">Maran</option>
									<option value="Temerloh">Temerloh</option>
									<option value="Bentong">Bentong</option>
									<option value="Pekan">Pekan</option>
									<option value="Bera">Bera</option>
									<option value="Rompin">Rompin</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="address">Alamat Sekolah</label> <input type="text" class="form-control" id="address" name="address" 
							value="<?php echo $rows['address']?>" readonly>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="code">Kod Sekolah</label> <input type="text" class="form-control" id="code" name="code" pattern="^[A-Za-z]{3}[0-9]{4}$"
								placeholder="Example: ABA0001" title="Example: ABA0001">
							</div>
							<div class="form-group col-md-6">
								<label for="type">Jenis</label> <select id="type" name="type" class="form-control">
									<option value="Sekolah Kebangsaan">Sekolah Kebangsaan</option>
									<option value="Sekolah Menengah Kebangsaan">Sekolah Menengah Kebangsaan</option>
									<option value="Sekolah Jenis Kebangsaan Cina">Sekolah Jenis Kebangsaan Cina</option>
									<option value="Sekolah Jenis Kebangsaan Tamil">Sekolah Jenis Kebangsaan Tamil</option>
									<option value="Kolej Vokasional">Kolej Vokasional</option>
									<option value="Sekolah Rendah Agama">Sekolah Rendah Agama</option>
									<option value="Sekolah Menengah Agama">Sekolah Menengah Agama</option>
									<option value="Sekolah Agama">Sekolah Agama</option>
									<option value="Sekolah Menengah Kebangsaan Agama">Sekolah Menengah Kebangsaan Agama</option>
									<option value="Sekolah Sains">Sekolah Sains</option>
									<option value="Sekolah Menengah Sains">Sekolah Menengah Sains</option>
									<option value="Sekolah Berasrama Penuh Integrasi">Sekolah Berasrama Penuh Integrasi</option>
									<option value="Madrasah">Madrasah</option>
									<option value="Madrasah">Sekolah Menengah Teknik</option>
									<option value="Madrasah">Maahad Tahfiz</option>
									<option value="Madrasah">Sekolah Menengah</option>
									<option value="Madrasah">Sekolah Menengah Pendidikan Khas Vokasional</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-block btn-primary">Kemaskini</button>
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
	<script>
		$(function() {
			$("#type").val(' "${scs.type}"/>').change();
			$("#district").val(' "${scs.district}"/>').change();
			$("#category").val(' "${scs.category}"/>').change();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#noPhone').blur(function() {
				var phone = $('#noPhone').val();

				$.ajax({
					type : 'POST',
					data : {
						phone : phone
					},
					url : 'NoPhoneCheck',
					success : function(result) {
						$('#resultPhone').html(result);
						if (result == "Phone Number Already Exists") {
							$("#sub").prop('disabled', true);
						}
						if (result != "Phone Number Already Exists") {
							$("#sub").prop('disabled', false);
						}
					}
				});
			});
		});

		var schoolname = document.getElementById('schoolname');

		schoolname.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Name!");
			}
		};

		schoolname.oninput = function(e) {
			e.target.setCustomValidity("");
		};

		var username = document.getElementById('username');

		username.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Username!");
			}
		};

		username.oninput = function(e) {
			e.target.setCustomValidity("");
		};

		var password = document.getElementById('password');

		password.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Password!");
			}
		};

		password.oninput = function(e) {
			e.target.setCustomValidity("");
		};

		var headmastername = document.getElementById('headmasterName');

		headmastername.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill Headmaster Name!");
			}
		};

		headmastername.oninput = function(e) {
			e.target.setCustomValidity("");
		};

		var noPhone = document.getElementById('noPhone');

		noPhone.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Phone!");
			}
		};
		var re = new RegExp('^0[1-9]{1,2}(-|\s)\d{7,8}$', 'g');
		noPhone.oninput = function(e) {
			e.target.setCustomValidity("");
		};
		var code = document.getElementById('code');

		code.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Code!");
			}
		};

		code.oninput = function(e) {
			e.target.setCustomValidity("");
		};

		var code = document.getElementById('code');

		code.oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Code!");
			}
		};

		code.oninput = function(e) {
			e.target.setCustomValidity("");
		};
	</script>
</body>

</html>