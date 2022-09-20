<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>JPICT STATUS TRACKING SYSTEM: Admin Homepage</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	

</head>

<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid col-md-10">
			<span class="navbar-brand mb-0 h1">JPICT STATUS TRACKING SYSTEM</span>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
				<div
					class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Sempadan JPN Pahang</h1>
					<div class="btn-toolbar mb-2 mb-md-0">
						<button type="button" class="btn btn-sm btn-outline-secondary" id="modalButton"
							data-toggle="modal" data-target="#registerSchool">Daftar Sekolah Baru</button>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<img src="pahangmaps.png" usemap="#image-map">

						<map name="image-map">
							<area target="" alt="Cameron Highlands" title="Cameron Highlands"
								href="ListSchoolAdmin.php?district=Cameron%20Highlands"
								coords="23,56,31,51,38,53,44,57,50,52,57,52,64,59,69,67,70,78,72,88,69,100,58,100,53,103,48,105,42,106,37,100,41,92,32,93,25,92,19,86,29,69,23,67"
								shape="poly">
							<area target="" alt="Lipis" title="Lipis" href="ListSchoolAdmin.php?district=Lipis"
								coords="70,60,82,58,96,48,108,20,117,29,126,40,130,49,137,35,140,21,158,26,170,22,181,38,192,46,187,54,194,63,193,76,195,83,187,94,192,104,195,117,198,127,197,138,199,145,206,147,204,156,197,158,192,159,191,166,181,162,174,152,167,154,168,163,172,169,162,172,153,170,145,176,140,182,133,175,142,167,137,162,141,154,132,152,124,156,120,163,112,160,106,153,99,147,95,154,84,154,68,151,53,144,52,130,44,126,41,107,59,105,72,97,73,76"
								shape="poly">
							<area target="" alt="Jerantut" title="Jerantut" href="ListSchoolAdmin.php?district=Jerantut"
								coords="194,45,204,41,212,46,219,35,236,32,245,39,254,31,265,33,264,19,274,23,288,35,309,37,317,50,312,60,315,73,326,77,337,78,345,90,342,103,333,112,327,122,326,135,321,142,328,149,326,162,317,171,311,180,304,176,297,180,292,187,288,195,283,201,271,196,261,195,247,198,244,188,239,189,239,203,228,217,219,205,208,206,205,198,196,200,194,190,186,197,171,201,164,196,167,185,162,176,175,166,168,154,178,155,192,166,201,158,210,149,198,143,201,127,195,113,189,97,197,86,195,75,198,67,192,56"
								shape="poly">
							<area target="" alt="Kuantan" title="Kuantan" href="ListSchoolAdmin.php?district=Kuantan"
								coords="331,150,343,144,354,147,364,152,374,162,388,166,396,177,403,189,407,179,405,167,404,157,400,149,404,139,403,129,422,134,417,146,417,155,421,166,425,175,415,178,413,202,406,208,404,224,411,235,419,247,393,244,376,244,362,241,346,238,326,234,315,223,308,228,306,218,296,215,285,202,303,175,311,181,320,168,328,161"
								shape="poly">
							<area target="" alt="Raub" title="Raub" href="ListSchoolAdmin.php?district=Raub"
								coords="68,154,85,154,100,150,110,157,118,164,129,151,139,154,140,166,134,176,140,183,147,180,154,173,161,180,165,190,167,200,165,213,159,224,158,237,151,244,152,252,142,251,136,233,129,233,121,227,124,236,116,238,111,242,106,233,98,225,88,223,79,216,74,208,69,203,68,190,65,181,65,168,62,160"
								shape="poly">
							<area target="" alt="Temerloh" title="Temerloh" href="ListSchoolAdmin.php?district=Temerloh"
								coords="171,203,186,199,193,193,194,203,204,202,205,207,217,208,227,218,238,223,239,234,239,248,241,261,245,274,241,279,241,290,231,291,221,288,215,288,208,292,200,291,193,286,173,293,168,282,171,272,161,266,156,254,154,242,162,238,159,226,167,216,167,207"
								shape="poly">
							<area target="" alt="Maran" title="Maran" href="ListSchoolAdmin.php?district=Maran"
								coords="232,217,239,205,241,191,246,199,258,199,283,202,293,215,306,218,308,228,314,224,324,234,323,245,320,256,313,265,304,271,297,273,306,289,291,287,285,299,273,291,267,286,266,277,259,274,246,274,242,264,241,240,239,220"
								shape="poly">
							<area target="" alt="Pekan" title="Pekan" href="ListSchoolAdmin.php?district=Pekan"
								coords="299,275,309,273,317,262,324,250,326,236,346,240,360,243,386,246,399,247,421,249,432,260,431,270,424,279,422,293,426,310,427,322,425,339,424,357,424,372,413,370,399,369,389,369,374,370,366,364,360,353,353,343,361,337,365,324,358,313,355,302,344,307,335,308,328,302,325,311,308,296,307,287"
								shape="poly">
							<area target="" alt="Bentong" title="Bentong" href="ListSchoolAdmin.php?district=Bentong"
								coords="113,244,124,239,123,229,131,236,137,241,141,254,150,255,160,266,169,272,167,283,171,295,191,289,203,293,211,299,204,305,204,321,200,326,205,334,181,329,173,324,166,326,160,329,157,318,145,317,143,309,136,306,132,311,125,310,114,305,107,296,103,288,108,280,106,272,102,264,111,253"
								shape="poly">
							<area target="" alt="Bera" title="Bera" href="ListSchoolAdmin.php?district=Bera"
								coords="210,294,217,289,228,292,240,292,244,284,247,276,264,278,266,288,282,299,283,308,290,317,303,328,291,332,291,346,298,354,294,360,292,377,290,387,297,399,285,396,280,385,237,359,225,342,206,336,204,320,207,305"
								shape="poly">
							<area target="" alt="Rompin" title="Rompin" href="ListSchoolAdmin.php?district=Rompin"
								coords="286,300,291,289,304,292,323,312,329,305,340,309,353,303,357,313,364,325,359,336,351,342,363,363,371,370,421,373,442,407,461,427,460,461,455,467,432,455,409,440,371,455,333,438,301,400,292,388,295,364,299,353,293,346,292,335,304,328,290,315,284,308"
								shape="poly">
						</map>
						<!-- end map (test) -->
					</div>
					<div class="col">
						<div class="card">
							<div class="card-header">Daerah Pahang</div>
							<div class="card-body">
								<h5 class="card-title">Klik pada peta maya untuk melihat sekolah mengikut daerah</h5>
								<p style="color:#FF1616 ;font-size:15px" class="card-text">1. Cameron Highlands</p>
								<p style="color:#5E17EB ;font-size:15px" class="card-text">2. Lipis</p>
								<p style="color:#D64DFF ;font-size:15px" class="card-text">3. Jerantut</p>
								<p style="color:#F6853D ;font-size:15px" class="card-text">4. Kuantan</p>
								<p style="color:#000000 ;font-size:15px" class="card-text">5. Raub</p>
								<p style="color:#38B6FF ;font-size:15px" class="card-text">6. Maran</p>
								<p style="color:#FF66C4 ;font-size:15px" class="card-text">7. Temerloh</p>
								<p style="color:#2D8FC8 ;font-size:15px" class="card-text">8. Bentong</p>
								<p style="color:#03989E ;font-size:15px" class="card-text">9. Pekan</p>
								<p style="color:#008037 ;font-size:15px" class="card-text">10. Bera</p>
								<p style="color:#FF5757 ;font-size:15px" class="card-text">11. Rompin</p>
							</div>
						</div>
					</div>
				</div>

			</main>
		</div>
	</div>

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
						<input type="hidden" name="mo_username" value="<c:out value= "${username}" />
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="username">Nama Pengguna</label> <input type="text" class="form-control"
									id="username" name="username" pattern="^[\S][a-zA-Z\s]*" title="Alphabet Only!"
									required><span class="text-danger" id="result"></span>
							</div>
							<div class="form-group col-md-6">
								<label for="category">Lokasi</label> <select id="category" class="form-control" placeholder="Lokasi Sekolah"
									name="category">
									<option value="Bandar">Bandar</option>
									<option value="Luar Bandar">Luar Bandar</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="name">Nama Skolah</label> <input type="text" class="form-control"
									id="schoolname" name="name" placeholder="Sila Gerakkan Tetikus Anda Ke Tempat Menaip Sebelum Menaip" 
									title="SK = Sekolah Kebangsaan, SMK = Sekolah Menengah Kebangsaan, SMA = Sekolah Menengah Agama, SJK Cina/Tamil = Sekolah Jenis Kebangsaan (C) / (T), Kolej Vokasional, SMKA = Sekolah Menengah Kebangsaan Agama" required>
							</div>
							<div class="form-group col-md-6">
								<label for="headmasterName">Nama Guru Besar</label> <input type="text"
									class="form-control" id="headmasterName" name="headmasterName" placeholder="Nama Guru Besar"
									pattern="^[\S][a-zA-Z\s]*" title="Alphabet Only!" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="noPhone">Nombor Telefon Guru Besar</label> <input type="text" class="form-control"
									id="noPhone" name="noPhone" pattern="^0[1-9]{1,2}[\s|-]*\d*"
									placeholder="Example: 01112345678 or 0123456789" title="Proper Phone Number!" 
									required><span class="text-danger" id="resultPhone"></span>
							</div>
							<div class="form-group col-md-6">
								<label for="district">Daerah</label> <select id="district" class="form-control"
									name="district">
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
							<textarea class="form-control" id="test" rows="3" name="address" placeholder="Alamat Penuh Sekolah" required></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="code">Kod Sekolah</label> <input type="text" class="form-control" id="code"
									name="code" pattern="^[A-Za-z]{3}[0-9]{4}$" placeholder="Example: ABA0001" title="Example: ABA0001" required>
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

	<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
		crossorigin="anonymous"></script>
	<script>
		var validUsername = true;
		var validPhone = true;
		$(document).ready(function () {
			$('#username').change(function () {
				var username = $('#username').val();

				$.ajax({
					type: 'POST',
					data: {
						username: username
					},
					url: 'UserNameCheck',
					success: function (result) {
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
		$(document).ready(function () {
			$('#noPhone').blur(function () {
				var phone = $('#noPhone').val();

				$.ajax({
					type: 'POST',
					data: {
						phone: phone
					},
					url: 'NoPhoneCheck',
					success: function (result) {
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

		schoolname.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Name!");
			}
		};

		schoolname.oninput = function (e) {
			e.target.setCustomValidity("");
		};

		var username = document.getElementById('username');

		username.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Username!");
			}
		};

		username.oninput = function (e) {
			e.target.setCustomValidity("");
		};

		var password = document.getElementById('password');

		password.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Password!");
			}
		};

		password.oninput = function (e) {
			e.target.setCustomValidity("");
		};

		var headmastername = document.getElementById('headmasterName');

		headmastername.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill Headmaster Name!");
			}
		};

		headmastername.oninput = function (e) {
			e.target.setCustomValidity("");
		};

		var noPhone = document.getElementById('noPhone');

		noPhone.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Phone!");
			}
		};
		var re = new RegExp('^0[1-9]{1,2}(-|\s)\d{7,8}$', 'g');
		noPhone.oninput = function (e) {
			e.target.setCustomValidity("");
		};
		var code = document.getElementById('code');

		code.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Code!");
			}
		};

		code.oninput = function (e) {
			e.target.setCustomValidity("");
		};

		var code = document.getElementById('code');

		code.oninvalid = function (e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("Fill School Code!");
			}
		};

		code.oninput = function (e) {
			e.target.setCustomValidity("");
		};
	</script>
	<script>
		// Script to disable space in username
		$("#username").bind("input propertychange", function () {
			//Get
			var input = $(this).val().replace(/\s/g, "");
			//Set
			$(this).val(input);
		});
	</script>
</body>

</html>