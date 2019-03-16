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
<!-- DATATABLE STYLE  -->
<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
<?php /*To calculate participant list*/ $datacount4badge = mysql_query("SELECT count(jenistransaksi) as myCount from kod_jenistransaksi;") or die(mysql_error()); $infobadge = mysql_fetch_array( $datacount4badge ); $countptcp = $infobadge['myCount']; ?>

<?php /*To calculate participant list*/ $cntuser = mysql_query("SELECT count(ic_pengguna) as myCount from akaun_pengguna;") or die(mysql_error()); $infobil = mysql_fetch_array( $cntuser ); $cntuser = $infobil['myCount']; ?>
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?=$countptcp?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Jenis Sub-Admin</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?=$cntuser?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Jumlah Pengguna</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      
        <h5>Senarai Sub-Admin mengikut Jenis Jabatan</h5>
        <table class="w3-table w3-striped w3-white">
<?php
$data = mysql_query("SELECT * from kod_jenistransaksi") or die(mysql_error()); 
while($info = mysql_fetch_array( $data )) { ?>

          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td><?=$info['jenistransaksi']?></td>
            <td><i><?=$info['id_jenistransaksi']?></i></td>
			<td><form action="QRLogo.php" method="POST" target="_blank"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="submit" value="Jana Kod QR"></form></td>
			<td><form action="QRLogo.php" method="POST" target="_blank"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="submit" value="Senarai Pengguna"></form></td>
          </tr>
<?}?>
        </table>
    </div>
  </div>
  
<? include "table.php"; ?>
 
<? //include "ui/footer.php"; ?>
	<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
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
