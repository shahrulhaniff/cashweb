<?
session_start();
include "../server.php";

if (empty($_SESSION['user'])) {
	header('Location:login.php'); }

// baru tambah
$id = $_POST['id_jenistransaksi'];
$jabatan = $_GET['jabatan'];

	
session_regenerate_id();
		$_SESSION['ID-JENISTRANSAKSI'] =$id;
		session_write_close();
		
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
    <h5><a href="index.php"><i class="fa fa-dashboard"></i>Utama</a> / <b><i class="fa fa-laptop"></i>Senarai Sub-Admin</b></h5>
  </header>

  <?
		
  ?>
<!-- Modal Add Sub-Admin -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="left" id="myModalLabel">Tambah Sub-Admin</h4>
                    </div>
                
                <div class="modal-body">
                
                <form method="post" action="../web/controller/subadmin_tambah_exec.php?jabatan=<?echo $jabatan;?>">     
                         <div class="form-group" align="left">
                            
							<label><font color="red">** Maklumat Wajib Diisi.</font></label>
							<br>
								 
								 <input type="hidden" name="id_jenistransaksi" id="id_jenistransaksi" class="form-control" value="<? echo $id;?>" readonly />
							
							 
							<div class="form-group">
								<label for="comment">Nama</label>
								<input type="text" class="form-control" name="nama" id="nama" size="20">
							</div> 
							
							<div class="form-group">
								<label for="comment">Nombor Kad Pengenalan</label>
								<input type="text" class="form-control" name="ic_pengguna" id="ic_pengguna" size="20">
							</div> 
							
							<div class="form-group">
								<label for="comment">Emel</label>
								<input type="text" class="form-control" name="email" id="email" size="20">
							</div> 
							
							<div class="form-group">
								<label for="comment">Nombor Telefon</label>
								<input type="text" class="form-control" name="no_telefon" id="no_telefon" size="20">
							</div>		
									
                  
                             <div class="modal-footer">
                                   <button type="submit" class="btn btn-primary" >Simpan</button>
                                   <button type="reset" class="btn btn-info">Tetapan Semula</button>
                             </div>
         
         </form>
                </div><!--modal-body-->
        
                </div>
        <!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
		</div>
        </div><!-- /.modal -->
		
		
			  <div class="w3-panel">
			 
				<div class="w3-row-padding" style="margin:0 -16px">
				 
			<div class="col-md-12">
			<div align="right">
							<button class="btn btn-primary" data-toggle="modal"  data-target="#myModal">Tambah Sub-Admin</button></a> <br>
			</div>
								<!-- Advanced Tables -->
								<div class="panel panel-default">
									<div class="panel-heading">
										 Senarai Sub-Admin <?echo $jabatan;?>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>Bil</th>
														<th>Nama</th>
														<th>Email</th>
														<th>Nombor Telefon</th>
														<th>Tindakan</th>
													</tr>
												</thead>
												<tbody>
												
												
			<?php // Connects to your Database 
			 
			 // $data = mysql_query("SELECT * FROM akaun_pengguna AP, maklumat_pengguna MP, kod_jenistransaksi KJ, kod_jenispengguna KJP WHERE KJ.id_jenistransaksi ='".$id."' AND KJP.jabatan = KJ.jabatan AND AP.kod_pengguna=KJP.kod_pengguna AND MP.ic_pengguna = AP.ic_pengguna") 
			 $data = mysql_query("SELECT * FROM akaun_pengguna AP, maklumat_pengguna MP, kod_jenistransaksi KJ, kod_jenispengguna KJP 
									WHERE KJ.id_jenistransaksi ='".$id."'
									AND KJP.jenis_pengguna = 'sub-admin'
									AND KJP.jabatan = KJ.jabatan
									AND AP.kod_pengguna=KJP.kod_pengguna 
									AND MP.ic_pengguna = AP.ic_pengguna") 
			 
					
			 or die(mysql_error()); ?>
													
													<?php
													$i= 1;
													while($info = mysql_fetch_array( $data )) {
														echo "<tr class='gradeA'>";
														echo "<td>".$i."</td>";
														echo "<td>".$info['nama'] . " </td>";
														echo "<td>".$info['email'] . " </td>";
														echo "<td>".$info['no_telefon'] . " </td>";
														?><td>
													  <button class="btn btn-info" data-toggle="modal" data-target="#myModal<?echo $i;?>">Kemaskini</button>
													<a href="../web/controller/subadmin_delete_exec.php?ic_pengguna=<?echo $info['ic_pengguna']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Anda pasti untuk padam data ini?');">Padam</button></a>
													 </td>
			<!-- Modal update Sub-Admin -->
			<div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			 
							<div class="modal-dialog">
							
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" align="left" id="myModalLabel">Kemaskini</h4>
								</div>
							
							<div class="modal-body">
							
							<form method="post" action="../web/controller/subadmin_kemaskini_exec.php">     
									 <div class="form-group" align="left">
										
										<label><font color="red">** Maklumat Wajib Diisi.</font></label>
										<br>
											 
											 <input type="hidden" name="ic_lama_pengguna" id="ic_lama_pengguna" class="form-control" value="<? echo $info['ic_pengguna'];?>" readonly />
										
										 
										<div class="form-group">
											<label for="comment">Nama</label>
											<input type="text" class="form-control" name="nama" id="nama" size="20" value="<?php echo $info['nama']; ?>">
										</div> 
										
										<div class="form-group">
											<label for="comment">Nombor Kad Pengenalan</label>
											<input type="text" class="form-control" name="ic_pengguna" id="ic_pengguna" size="20" value="<?php echo $info['ic_pengguna']; ?>" readonly>
										</div> 
										
										<div class="form-group">
											<label for="comment">Emel</label>
											<input type="text" class="form-control" name="email" id="email" size="20" value="<?php echo $info['email']; ?>">
										</div> 
										
										<div class="form-group">
											<label for="comment">Nombor Telefon</label>
											<input type="text" class="form-control" name="no_telefon" id="no_telefon" size="20" value="<?php echo $info['no_telefon']; ?>">
										</div>		
												
							  
										 <div class="modal-footer">
											   <button type="submit" class="btn btn-primary" >Simpan</button>
											   <button type="reset" class="btn btn-info">Tetapan Semula</button>
										 </div>
					 
					 </form>
                </div><!--modal-body-->
        
                </div>
        <!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
		</div>
        </div><!-- /.modal -->
														
														
													 <?
														echo "</tr>";
														
													 $i++;
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