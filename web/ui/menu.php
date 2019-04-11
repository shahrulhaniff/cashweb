
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Cashless UniSZA</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="imgs/nopic.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
	
	<?
	$nokpSession=$_SESSION['user'];
	$qryNama="SELECT nama FROM maklumat_pengguna WHERE ic_pengguna='$nokpSession'";
			$resultNama=mysql_query($qryNama) or die(mysql_error());
			$dataNama = mysql_fetch_assoc($resultNama);
	?>
    <div class="w3-col s8 w3-bar">
	<?if ($_SESSION['USER_TYPE']=='admin') {?>  
      <span>Selamat Datang, <strong><?echo $dataNama['nama'];?></strong></span><br>
	  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="change_password.php" class="w3-bar-item w3-button"><i class="fa fa-lock"></i></a>
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
	  <?}
	if ($_SESSION['USER_TYPE']=='sub-admin') {?>  
	<span>Selamat Datang, <strong><?echo $dataNama['nama'];?></strong></span><br>
	<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="sa_change_password.php" class="w3-bar-item w3-button"><i class="fa fa-lock"></i></a>
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>
	<?}?>
      
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
  <?if ($_SESSION['USER_TYPE']=='') {?>
		<a href="../login.php"></a>
  <?}
	if ($_SESSION['USER_TYPE']=='admin') {?>  
	<a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <!--<a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw active"></i>  Utama</a>-->
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw active"></i>  Utama</a>
    <a href="senarai_transaksi.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw active"></i>  Senarai Transaksi</a>
    <a href="senarai_ptj.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw active"></i>  Senarai PTj</a>
    <!--<a href="index.php" data-toggle="pill"class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Utama</a>-->
    <a href="sebut_harga.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-folder-open fa-fw"></i>  Jenis Bayaran</a>
    <a href="pengurusan_dokumen.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Pengurusan Dokumen</a>
    <!--<a href="change_password.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-lock fa-fw"></i>  Tukar Kata Laluan</a>-->
  <?}
	if ($_SESSION['USER_TYPE']=='sub-admin') {?>  
	<a href="sa_sebut_harga.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Utama</a>
	<a href="index_sa.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw active"></i>  Jenis Bayaran</a>
	<a href="sa_pengurusan_dokumen.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-folder-open fa-fw"></i> Pengurusan Dokumen</a>
	
	 <!--<a href="sa_change_password.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-lock fa-fw"></i>  Tukar Kata Laluan</a>
	
   <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-folder-open fa-fw"></i> Sebut Harga</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Derma</a>
	-->
	<?}?>  
	<br>
	<a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Log Keluar</a><br><br>
  
  </div>
</nav>