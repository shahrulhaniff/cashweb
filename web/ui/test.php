<?
session_start();
include "../../server.php";

if (empty($_SESSION['user'])) {
	header('Location:login.php'); }
?>
<? include "header.php"; ?>
<? include "menu.php"; ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Pengurusan Dokumen</b></h5>
  </header>




  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
	<div class="col-md-12">
	 <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             TEST
                        </div>
						                        <div class="panel-body">
 <div class="table-responsive">
<table  class="table table-striped table-bordered table-hover" border="2" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th width="5%">Bil.</th>
											<th width="15%">Nombor Rujukan</th>
											<th width="30%">Keterangan</th>
											<th width="15%">Tarikh Buka</th>
											<th width="15%">Tarikh Tutup</th>
											<th width="10%">Harga</th>
											<th width="10%">Tindakan</th>
										</tr>
                                    </thead>
									<body>
<?  $sql1="SELECT id_jenistransaksi FROM kod_jenistransaksi WHERE jabatan='JPP'";
	$result1=mysql_query($sql1);
		while($row1 = mysql_fetch_array( $result1 )) {
			
			$id_jenistransaksi=$row1['id_jenistransaksi'];
			
			$sql="SELECT * FROM kod_transaksi WHERE id_jenistransaksi='$id_jenistransaksi'";
			$result=mysql_query($sql);// or die(mysql_error());
				$i=1;
				while($row = mysql_fetch_array( $result )) {
						echo "<tr class='gradeA'>";
							echo '<td>'. $i . '</td>';
							echo '<td>'. $row['no_sb'] . '</td>';
							echo '<td>'. $row['description'] . '</td>';
							echo '<td>'. $row['tarikhbuka'] . '</td>';
							echo '<td>'. $row['tarikhtutup'] . '</td>';
							echo '<td>'. $row['harga'] . '</td>';
							echo '<td></td>';
							
						echo "</tr>";
	$i++;}
}
?>
</body>
</table>
</div>
</div>
</div>
</div>

<? include "footer.php"; ?>
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