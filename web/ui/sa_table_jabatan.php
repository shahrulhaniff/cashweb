

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
                                            <th>Jabatan</th>
                                            <th>Kod-QR</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<tr class='gradeA'>
									<form method="post" action="../web/controller/sa_jenis_transaksi_add_exec.php">
									<td><i class="fa fa-user w3-text-blue w3-large"></i></td>
									<td><input type="text" class="form-control" name="id_jenistransaksi" id="id_jenistransaksi" size="20" required onkeyup=" var start = this.selectionStart;var end = this.selectionEnd; this.value = this.value.toUpperCase();this.setSelectionRange(start, end);"></td>
									<td><input type="text" class="form-control" name="jenistransaksi" id="jenistransaksi" size="20" required></td>
									<?
									 $jabatan2=$_SESSION['JABATAN'];
									?>
									<td><input type="text" class="form-control" name="jabatan" id="jabatan" size="20" value="<?echo $jabatan2;?>" readonly></td>
									<td><!--<input type="text" name="no_telefon" id="no_telefon" size="20">--></td>
									<td><a><button type="submit" class="btn btn-primary">Tambah</button></a></td>
									</tr>
<?php // Connects to your Database 

 $data = mysql_query("SELECT * FROM kod_jenistransaksi WHERE jabatan='$jabatan2'") 
 or die(mysql_error()); ?>
                                        
										<?php
										$i=1;
										while($info = mysql_fetch_array( $data )) {
											echo "<tr class='gradeA'>";
											echo "<td>".$i." </td>";
                                            echo "<td>".$info['id_jenistransaksi'] . " </td>";
                                            echo "<td>".$info['jenistransaksi'] . " </td>";
                                            echo "<td>".$info['jabatan'] . " </td>";
?><td>
<form action="QRLogo.php" method="POST" target="_blank"><input type="hidden" name="id_jenistransaksi" value="<?echo $info['id_jenistransaksi'];?>"><input type="submit" value="Jana Kod QR"></form>
<!--<form action="senarai_sa.php" method="POST"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="hidden" name="jabatan" value="<?=$info['jabatan']?>"><input type="submit" class="btn btn-warning" value="Senarai Sub-Admin"></form>-->
</td><?
                                            ?>
											<td>
										 <!--<a class="edit" title="Edit" data-toggle="tooltip"><button type="button" class="btn btn-info " onClick="updateId('<?php echo $list['id']; ?>')">Kemaskini</button></a>-->
										 <button class="btn btn-info" data-toggle="modal" data-target="#myModal<?echo $info['id_jenistransaksi'];?>">Kemaskini</button>
										<a href="../web/controller/jenis_transaksi_delete_exec.php?id_jenistransaksi=<?echo $info['id_jenistransaksi']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Anda pasti untuk padam data ini?');">Padam</button></a>
										 </td>
										 
	<!-- Modal Kemaskini-->
											<div class="modal fade" id="myModal<?php echo $info['id_jenistransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" align="left" id="myModalLabel">Kemaskini</h4>
												</div>
												
											 <div class="modal-body">
												<form method="post" action="../web/controller/jenis_transaksi_kemaskini_exec.php?id_jenistransaksi=<?php echo $info['id_jenistransaksi'];?>" >

											
													
												<div class="form-group" align="left">
													<label>ID</label>
													<input class="form-control" id="id_jenistransaksi" name="id_jenistransaksi" value="<?php echo $info['id_jenistransaksi']; ?>" readonly >
												</div>

												<div class="form-group" align="left">
													<label>Jenis Transaksi</label>
													<input class="form-control" id="jenistransaksi" name="jenistransaksi" value="<?php echo $info['jenistransaksi']; ?>" required autocomplete="" >
												</div>
												
												<div class="form-group" align="left">
													<label>Jabatan</label>
													<input class="form-control" id="jabatan" name="jabatan" value="<?php echo $info['jabatan']; ?>" readonly >
												</div>
												
											
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Kemaskini Maklumat</button></a>
												</div>  
												</form>
											</div><!--modal-body-->
											</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
										 <?
											echo "</tr>";
										$i++;}
										?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
	