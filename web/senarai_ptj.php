<?
session_start();
include "../server.php";

if (empty($_SESSION['user'])) {
	header('Location:login.php'); }
	
unset($_SESSION['id']);
unset($_SESSION['jabatan']);
	
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
    <h5><b><i class="fa fa-dashboard"></i> Senarai Pusat Tanggungjawab</b></h5>
  </header>
<?php 
/*To calculate participant list*/ $datacount4badge = mysql_query("SELECT count(jenistransaksi) as myCount from kod_jenistransaksi;"); $infobadge = mysql_fetch_array( $datacount4badge ); $countptcp = $infobadge['myCount']; 

 /*To calculate participant list*/ $cntuser = mysql_query("SELECT count(ic_pengguna) as myCount from akaun_pengguna;") ; $infoBilUser = mysql_fetch_array( $cntuser ); $cntuser = $infoBilUser['myCount']; 
 
 /*To calculate participant list*/ $count_document = mysql_query("SELECT count(id_transaksi) as myCount from transaksi;"); $infoBilDoc = mysql_fetch_array( $count_document ); $count_document = $infoBilDoc['myCount']; 
 
 /*To calculate participant list*/ $count_bayaran = mysql_query("SELECT count(id_kodtransaksi) as myCount from kod_transaksi;"); $infoBilBayaran = mysql_fetch_array( $count_bayaran ); $count_bayaran = $infoBilBayaran['myCount']; 
 ?>
  
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">

   
<? include "ui/table.php"; ?>
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