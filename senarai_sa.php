<?
session_start();
include "../app/server.php";

if (empty($_SESSION['user'])) {
	header('Location:login.php'); }
?>
<!DOCTYPE html>
<html>
<title>Laman Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}


</style>
<body class="w3-light-grey">
<? include "ui/menu.php"; ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Utama</b></h5>
  </header>


  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Senarai Sub-Admin mengikut Jenis Jabatan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>ID</th>
                                            <th>Jenis Transaksi</th>
                                            <th>Kod-QR</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php // Connects to your Database 
 $id = $_POST['id_jenistransaksi'];
 $data = mysql_query("SELECT * FROM kod_jenistransaksi") 
 or die(mysql_error()); ?>
                                        
										<?php
										while($info = mysql_fetch_array( $data )) {
											echo "<tr class='gradeA'>";
											echo '<td><i class="fa fa-user w3-text-blue w3-large"></i></td>';
                                            echo "<td>".$info['id_jenistransaksi'] . " </td>";
                                            echo "<td>".$info['jenistransaksi'] . " </td>";
?><td>
<form action="QRLogo.php" method="POST" target="_blank"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="submit" value="Jana Kod QR"></form>
<form action="senarai_sa.php" method="POST" target="_blank"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="submit" value="Senarai Sub-Admin"></form>
</td><?
                                            echo "<td>sini abeley buat add, update, delete</td>";
											echo "</tr>";
										}
										?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
  </div>
  </div>
  
<? include "ui/footer.php"; ?>
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
	
<!-- End page content -->
</div>
</body>
</html>
