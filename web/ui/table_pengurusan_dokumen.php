

<div class="col-md-12">
				
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
					
                        <div class="panel-heading">
                             Senarai Dokumen 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Penerima</th>
                                            <th>Tarikh</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Disahkan Oleh</th>
											<th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
<?php // Connects to your Database 

 $data = mysql_query("SELECT * FROM transaksi") 
 or die(mysql_error()); ?>
                                        
										<?php
										$i=1;
										while($info = mysql_fetch_array( $data )) {
											echo "<tr class='gradeA'>";
											echo "<td>".$i." </td>";


											$data1 = mysql_query("SELECT max(nama) AS nama FROM maklumat_pengguna WHERE ic_pengguna='".$info['doc_acceptby']."' ORDER BY ic_pengguna") 
											or die(mysql_error());	
											$info1 = mysql_fetch_array( $data1 );
                                            echo "<td>".$info1['nama'] . " </td>";
											
										   echo "<td>".$info['tarikh'] . " </td>";
                                            echo "<td>".$info['jumlah'] . " </td>";
                                            echo "<td>".$info['status_dokumen'] . " </td>";

											
											$data2 = mysql_query("SELECT max(nama) AS nama FROM maklumat_pengguna WHERE ic_pengguna='".$info['doc_giveby']."' ORDER BY ic_pengguna") 
											or die(mysql_error());	
											$info2 = mysql_fetch_array( $data2 );
                                            echo "<td>".$info2['nama'] . " </td>";

                                            ?>
											<td>
											<a class="btn btn-primary" href="read.php?id='.$row['id_kodtransaksi'].'">Info</a>
                                
										 <!--<a class="edit" title="Edit" data-toggle="tooltip"><button type="button" class="btn btn-info " onClick="updateId('<?php echo $list['id']; ?>')">Kemaskini</button></a>-->
										 <button class="btn btn-info" data-toggle="modal" data-target="#myModal<?echo $info['id_jenistransaksi'];?>">Kemaskini</button>
										<!--<a href="../web/controller/jenis_transaksi_delete_exec.php?id_jenistransaksi=<?echo $info['id_jenistransaksi']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Anda pasti untuk padam data ini?');">Padam</button></a>-->
										 </td>
										 
	<!-- Modal -->
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
													<input class="form-control" id="jabatan" name="jabatan" value="<?php echo $info['jabatan']; ?>" required autocomplete="" >
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
	