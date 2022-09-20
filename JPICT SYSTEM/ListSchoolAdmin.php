<?php
 
// Username is root
$user = 'root';
$password = '';
 
// Database name
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
$district = $mysqli->real_escape_string($_GET['district']); 
$sql = " SELECT * FROM school where district='$district' order by code";
$var_value = "SELECT * FROM School";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->	
	
<title>Senarai Sekolah</title>
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
                    <a htype="button" class="btn btn-sm btn-outline-secondary; fa fa-undo" href="AdminHome.php"> Kembali </a>
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
					<h1 class="h2">Senarai Sekolah Di Daerah <?php echo $_GET['district'] ; ?> </h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group mr-2">
							<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#registerSchool">Daftar Sekolah Baru</button>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>

	<!-- search name -->
	<input class="form-control col-md-10 mx-auto" type="text" id="search" onkeyup="search();" placeholder="Cari Nama Sekolah atau Kod Sekolah">
	<br>


	<table class="table table-bordered col-md-10 mx-auto" id="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col" style="text-align: center;">Kod Sekolah</th>
				<th scope="col" style="text-align: center;">Nama Sekolah</th>
				<th scope="col" style="text-align: center;">Jenis</th>
				<th scope="col" style="text-align: center;">Lokasi</th>
				<th scope="col" style="text-align: center;">Tindakan</th>
			</tr>
		</thead>
		 <tbody>
				<?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $rows['code'];?></td>
					<td><?php echo $rows['name'];?></td>
					<td><?php echo $rows['type'];?></td>
					<td><?php echo $rows['category'];?></td>
					<td><a href="updateSchool.php?username=<?php echo $rows['username'];?>">Kemaskini</a> &nbsp; <a href="viewSchoolAdmin.php?code=<?php echo $rows['code'];?>">Papar</a> &nbsp; <a href="deleteProcess.php?code=<?php echo $rows['code'];?>"> Hapus</a></td>
				</tr>
				<?php }?>
		</tbody> 

	</table>

	<!-- Modal reg school -->
	<div class="modal fade" id="registerSchool" tabindex="-1" aria-labelledby="registerSchoolModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content" style="border-radius: 1px;">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Daftar Sekolah Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form" action="insertSchool.php" method="post" name="myForm">
						<input type="hidden" name="mo_username" value="<c:out value="${username}>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="username">Nama Pengguna</label> <input type="text" class="form-control" id="username" name="username"
									pattern="^[\S][a-zA-Z\s]*" title="Alphabet Only!" required><span class="text-danger" id="result"></span>
							</div>
							<div class="form-group col-md-6">
								<label for="category">Lokasi</label> <select id="category" class="form-control" name="category" placeholder="Lokasi Sekolah">
									<option value="Bandar">Bandar</option>
									<option value="Luar Bandar">Luar Bandar</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Nama Sekolah</label> <input type="text" class="form-control" id="schoolname"
								placeholder="Sila Gerakkan Tetikus Anda Ke Tempat Menaip Sebelum Menaip" 
								title="SK = Sekolah Kebangsaan, SMK = Sekolah Menengah Kebangsaan, SMA = Sekolah Menengah Agama, SJK Cina/Tamil = Sekolah Jenis Kebangsaan (C) / (T), Kolej Vokasional, SMKA = Sekolah Menengah Kebangsaan Agama" 
								name="name" required>
							</div>
							<div class="form-group col-md-6">
								<label for="headmasterName">Nama Guru Besar</label> <input type="text" class="form-control" id="headmasterName"
									name="headmasterName" pattern="^[\S][a-zA-Z\s]*" placeholder="Nama Guru Besar" title="Alphabet Only!" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="noPhone">Nombor Telefon</label> <input type="text" class="form-control" id="noPhone" name="noPhone"
									pattern="^0[1-9]{1,2}[\s|-]*\d*" placeholder="Example: 01112345678 atau 0123456789" title="Proper Phone Number!" required><span class="text-danger" id="resultPhone"></span>
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
							<label for="address">Alamat Sekolah</label>
							<textarea class="form-control" id="test" rows="3" name="address" placeholder="Alamat Sekolah" required></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="code">Kod Sekolah</label> <input type="text" class="form-control" id="code" name="code" pattern="^[A-Za-z]{3}[0-9]{4}$"
								placeholder="Example: ABA0001" title="Example: ABA0001" required>
							</div>
							<div class="form-group col-md-6">
								<label for="type">Jenis</label> <select id="type" class="form-control" name="type">
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
									<option value="Madrasah">Sekolah Sukan</option>
								</select>
							</div>
						</div>
						<button type="submit" id="sub" class="btn btn-block btn-primary">Daftar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Success -->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="Success" aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 360px;">
			<div class="modal-content border-0">
				<div class="modal-header p-0 border-0">
					<div class="alert alert-success alert-dismissible m-0 border-0 w-100" role="alert">
						<strong>Berjaya!</strong> <span id="message-success"></span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="Error" aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 360px;">
			<div class="modal-content border-0">
				<div class="modal-header p-0 border-0">
					<div class="alert alert-danger alert-dismissible m-0 border-0 w-100" role="alert">
						<strong>Error!</strong> <span id="message-error"></span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		function search() {
			// Declare variables
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("search");
			filter = input.value.toUpperCase();
			table = document.getElementById("table");
			tr = table.getElementsByTagName("tr");

			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
				school = tr[i].getElementsByTagName("td")[1];
				code = tr[i].getElementsByTagName("td")[0];
				if (school || code) {
					txtValueSchool = school.textContent || school.innerText;
					txtValueCode = code.textContent || code.innerText;
					if ((txtValueSchool + txtValueCode).toUpperCase().indexOf(filter) > -1) {
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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
					path : ''
				});
				Cookies.remove('message', {
					path : ''
				});
			}

		});
	</script>

	<script>
		var validUsername = true;
		var validPhone = true;
		$(document).ready(function() {
			$('#username').change(function() {
				var username = $('#username').val();

				$.ajax({
					type : 'POST',
					data : {
						username : username
					},
					url : 'UserNameCheck',
					success : function(result) {
						$('#result').html(result);
						if (result == "Username Already Exists") {
							$("#sub").prop('disabled', true);
							validUsername = false;
						}
						if (result != "Username Already Exists") {
							validUsername = true;
							if (validPhone) {
								$("#sub").prop('disabled', false);
							}
						}
					}
				});
			});
		});
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
							validPhone = false;
						}
						if (result != "Phone Number Already Exists") {
							validPhone = true;
							if (validUsername) {
								$("#sub").prop('disabled', false);
							}
						}
					}
				});
			});
		});
	</script>
	<script>
		function AvoidSpace(event) {
			var k = event ? event.which : window.event.keyCode;
			if (k == 32)
				return false;
		}
	</script>
	<script>
		$("#test").blur(validateTextarea);
		function validateTextarea() {
			var input = $(this).val().trim();
			//Set
			$(this).val(input);
		}
	</script>
	<script>
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
	<script>
		// Script to disable space in username
		$("#username").bind("input propertychange", function() {
			//Get
			var input = $(this).val().replace(/\s/g, "");
			//Set
			$(this).val(input);
		});
	</script>
</body>

</html>