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
$sql = "SELECT * FROM school where code='" . $_GET['code'] . "'";
$var_value = "SELECT * FROM formpage where code='" . $_GET['code'] . "'";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($var_value);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>JPICT Status Tracking System</title>
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
                    <h1 class="h2">Informasi Sekolah</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
						<div class="btn-group mr-2">
                            <a htype="button" class="btn btn-sm btn-outline-secondary" href="formAdmin.php?code=<?php echo $_GET['code'];?>">Tambah Halaman Borang</a> &nbsp;&nbsp;&nbsp;
							<a htype="button" class="btn btn-sm btn-outline-secondary" href="viewFormPage.php?code=<?php echo $_GET['code'];?>">Lihat Halaman Borang</a>
						</div>
					</div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card" style="height: 37rem;">
                            <div class="card-header">Informasi Sekolah</div>
                            <div class="card-body">
                                <table class="table table-striped" style="border: none;">
                                <?php
                                    // LOOP TILL END OF DATA
                                    while($rows=$result->fetch_assoc())
                                    {
            	                    ?>
                                    <tr>
                                        <th>Kod Sekolah</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['code'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Sekolah</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['name'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Guru Besar</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['headmasterName'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nombor Telefon</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['noPhone'];?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Daerah</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['district'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['address'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['type'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td>:</td>
                                        <td>
                                            <?php echo $rows['category'];?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="height: 37rem;">
                            <div class="card-header">Senarai Dokumentasi Sekolah</div>
                            <div class="card-body" style="overflow-y: auto">
                                <table class="table table-striped" style="border: none;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">No. Rujukan Surat Sekolah</th>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">Bilangan & Tahun Mesyuarat</th>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">Tarikh Surat Diterima</th>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">Tarikh Terima Permohonan</th>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">Tarikh Kelulusan JPICT</th>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">Status Permohonan</th>
                                            <th scope="col" style="text-align: center;vertical-align: middle;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                // LOOP TILL END OF DATA
                                                while($rows=$result2->fetch_assoc()){
                                            ?>
                                            <tr>
                                            <td><?php echo $rows['suratRujukan'];?></td>
                                            <td><?php echo $rows['mesyuarat'];?></td>
                                            <td><?php echo $rows['suratDiterima'];?></td>
                                            <td><?php echo $rows['permohonanDiterima'];?></td>
                                            <td><?php echo $rows['lulusJpict'];?></td>
                                            <td><?php echo $rows['status'];?></td>
                                            <td><a href="updateFormAdmin.php?suratRujukan=<?php echo $rows['suratRujukan'];?>">Kemaskini</a> &nbsp; <a href="deleteFormAdmin.php?suratRujukan=<?php echo $rows['suratRujukan'];?>"> Hapus</a></td>
                                            </tr>
                                            <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script>
        // Shorthand for $( document ).ready()
        $(function () {
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
