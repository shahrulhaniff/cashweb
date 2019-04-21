<?
session_start();
include "../server.php";

if (empty($_SESSION['user'])) {
	header('Location:login.php'); }

// baru tambah
if (empty($_SESSION['id']))  {
$id_kodtransaksi = $_POST['id_kodtransaksi'];

//session_regenerate_id();
//$_SESSION['ID-JENISTRANSAKSI'] =$id;
//session_write_close();

$_SESSION['id']=$_POST['id_kodtransaksi']; 
}
else {
	$id_kodtransaksi = $_SESSION['id'];
}
?>
<? include "ui/header.php"; ?>
<? include "ui/menu.php"; ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><a href="senarai_ptj.php"><i class="fa fa-dashboard"></i>Jenis Bayaran</a> / <b><i class="fa fa-laptop"></i>Senarai Pelawat Tapak</b></h5>
  </header>

<!-- Modal Add Sub-Admin -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" align="left" id="myModalLabel">Tambah Sub-Admin</h4>
                    </div>
                
                <div class="modal-body">
                
                <form method="post" action="../web/controller/subadmin_tambah_exec.php?jabatan=<?echo $_POST['jabatan'];?>">     
                         <div class="form-group" align="left">
                            
							<label><font color="red">** Maklumat Wajib Diisi.</font></label>
							<br>
								 
								 <input type="hidden" name="id_kodtransaksi" id="id_kodtransaksi" class="form-control" value="<? echo $id_kodtransaksi;?>" readonly />
							
							 
							<div class="form-group">
								<label for="comment">Nama<font color="red">**</font></label>
								<input type="text" class="form-control" name="nama" id="nama" size="20" required>
							</div> 
							
							<div class="form-group">
								<label for="comment">Nombor Kad Pengenalan<font color="red">**</font></label>
								<input type="text" class="form-control" name="ic_pengguna" id="ic_pengguna" size="20" required>
							</div> 
							
							<div class="form-group">
								<label for="comment">Emel<font color="red">**</font></label>
								<input type="text" class="form-control" name="email" id="email" size="20"required>
							</div> 
							
							<div class="form-group">
								<label for="comment">Nombor Telefon<font color="red">**</font></label>
								<input type="text" class="form-control" name="no_telefon" id="no_telefon" size="20"required>
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
							<button class="btn btn-primary" data-toggle="modal"  data-target="#myModal">Tambah Pelawat Tapak</button></a> <br>
			</div>
								<!-- Advanced Tables -->
								<div class="panel panel-default">
									<div class="panel-heading">
										 Senarai Pelawat Tapak
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
			 
			 $data = mysql_query("SELECT sv.ic_pengguna AS ic_site_visit, mp.* 
									FROM site_visit sv, maklumat_pengguna mp
									WHERE sv.ic_pengguna = mp.ic_pengguna AND sv.id_kodtransaksi = '$id_kodtransaksi'") 
			?>
													
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
								<h4 class="modal-title" align="left" id="myModalLabel">Kemaskini Maklumat Sub-Admin</h4>
								</div>
							
							<div class="modal-body">
							
							<form method="post" action="../web/controller/subadmin_kemaskini_exec.php">     
									 <div class="form-group" align="left">
										
										<label><font color="red">** Maklumat Wajib Diisi.</font></label>
										<br>
											 
											 <input type="hidden" name="ic_lama_pengguna" id="ic_lama_pengguna" class="form-control" value="<? echo $info['ic_pengguna'];?>" readonly />
										
										 
										<div class="form-group">
											<label for="comment">Nama<font color="red">**</font></label>
											<input type="text" class="form-control" name="nama" id="nama" size="20" value="<?php echo $info['nama']; ?>" required>
										</div> 
										
										<div class="form-group">
											<label for="comment">Nombor Kad Pengenalan</label>
											<input type="text" class="form-control" name="ic_pengguna" id="ic_pengguna" size="20" value="<?php echo $info['ic_pengguna']; ?>" readonly>
										</div> 
										
										<div class="form-group">
											<label for="comment">Emel<font color="red">**</font></label>
											<input type="text" class="form-control" name="email" id="email" size="20" value="<?php echo $info['email']; ?>" required>
										</div> 
										
										<div class="form-group">
											<label for="comment">Nombor Telefon<font color="red">**</font></label>
											<input type="text" class="form-control" name="no_telefon" id="no_telefon" size="20" value="<?php echo $info['no_telefon']; ?>" required>
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
