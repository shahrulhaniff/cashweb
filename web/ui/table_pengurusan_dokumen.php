

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
											 <th>Jabatan</th>
                                            <th>Penerima</th>
                                            <th>Harga (RM)</th>
                                            <th>Disahkan Oleh</th>
											<th>Status</th>
											<th>Tarikh</th>
											<th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
<?php // Connects to your Database 

 $data = mysql_query("SELECT * FROM transaksi"); ?>
                                        
										<?php
										$i=1;
										while($info = mysql_fetch_array( $data )) {
											echo "<tr class='gradeA'>";
											echo "<td>".$i." </td>";

											
											$data3 = mysql_query("SELECT * FROM kod_jenistransaksi WHERE id_jenistransaksi='".$info['id_jenistransaksi']."'");	
											$info3 = mysql_fetch_array( $data3 );
                                            echo "<td>".$info3['jabatan'] . " </td>";
											

											
                                            echo "<td>".$info['doc_acceptby_nama'] . " </td>";
											echo "<td>".$info['jumlah'] . " </td>";
                                           

											
											$data2 = mysql_query("SELECT max(nama) AS nama FROM maklumat_pengguna WHERE ic_pengguna='".$info['doc_giveby']."' ORDER BY ic_pengguna");	
											$info2 = mysql_fetch_array( $data2 );
                                            echo "<td>".$info2['nama'] . " </td>";

											

											 echo "<td>".$info['status_dokumen'] . " </td>";
											 echo "<td>".$info['tarikh'] . " </td>";
                                            ?>
											<td>
											<button class="btn btn-info" data-toggle="modal" data-target="#myModalInfo<?echo $info['id_jenistransaksi'];?>">Papar</button>
                                
										 <!--<a class="edit" title="Edit" data-toggle="tooltip"><button type="button" class="btn btn-info " onClick="updateId('<?php echo $list['id']; ?>')">Kemaskini</button></a>-->
										 <!--<button class="btn btn-info" data-toggle="modal" data-target="#myModal<?echo $info['id_jenistransaksi'];?>">Kemaskini</button>
										<!--<a href="../web/controller/jenis_transaksi_delete_exec.php?id_jenistransaksi=<?echo $info['id_jenistransaksi']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Anda pasti untuk padam data ini?');">Padam</button></a>-->
										 </td>
										 </tr>
	<!-- Modal Kemaskini-->
											<div class="modal fade" id="myModal<?php echo $info['id_jenistransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" align="left" id="myModalLabel">Kemaskini</h4>
												</div>
												
											 <div class="modal-body">
												<form method="post" action="../web/controller/pengurusan_dokumen_kemaskini_exec.php?id=<?php echo $info['id_transaksi'];?>" >

												<div class="form-group">
													<label for="comment">Tarikh</label>
													<span> : <? echo $info['tarikh'];?></span>
												</div> 
												
												<div class="form-group">
													<label for="comment">Harga</label>
													<span> : RM <? echo $info['jumlah'];?></span>
													
												</div>
													
												<div class="form-group" align="left">
													<label>Daripada</label>
												<?
													$data1 = mysql_query("SELECT max(nama) AS nama FROM maklumat_pengguna WHERE ic_pengguna='".$info['doc_giveby']."' ORDER BY ic_pengguna");	
													$info1 = mysql_fetch_array( $data1 );
												?>
													<span> : <? echo $info1['nama'];?> (<? echo $info['doc_giveby'];?>)</span>
												</div>

												<div class="form-group" align="left">
													<label>Nama Penerima</label>
													<?										
													$datas = mysql_query("SELECT max(nama) AS nama FROM maklumat_pengguna WHERE ic_pengguna='".$info['kepada']."' ORDER BY ic_pengguna");	
													$infos = mysql_fetch_array( $datas );
													
												?>
													<input class="form-control" id="doc_acceptby_nama" name="doc_acceptby_nama" value="<?=$infos['nama']?>" required >
												</div>
												
												<div class="form-group" align="left">
													<label>Nombor Kad pengenalan Penerima</label>
													<input class="form-control" id="doc_acceptby" name="doc_acceptby" value="<? echo $info['kepada'];//value ni utk penerima tu sendiri yang datang ambil. data drp attr "kepada" akan di update dalam attr "doc_acceptby"?>" required >
												</div>
												
												
												<div class="form-group" align="left">
												<label for="comment">Status Dokumen</label>
															<select required class="form-control" name="status_dokumen" value="" style="width: 270px">
															<option value="<? echo $info['status_dokumen'];?>"><? echo $info['status_dokumen'];?></option>	
															<?
																if ($info['status_dokumen']=="YES"){
															?>
															<option value="NO">NO</option>
															<?
																}if ($info['status_dokumen']=="NO"){
															?>
															<option value="YES">YES</option>
															<?}?>
															
															</select>
															</div>
											
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Kemaskini Maklumat</button></a>
												</div>  
												</form>
											</div><!--modal-body-->
											</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
			<!--/tamat modal kemaskini-->
			
			<!-- Modal Papar Maklumat-->
											<div class="modal fade" id="myModalInfo<?echo $info['id_jenistransaksi'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" align="left" id="myModalLabel">Paparan Maklumat</h4>
												</div>
												
												<div class="modal-body">												
												<div class="form-group">
													<label for="comment">Jenis Transaksi</label>
													<?
														$data3 = mysql_query("SELECT jenistransaksi FROM kod_jenistransaksi WHERE id_jenistransaksi='".$info['id_jenistransaksi']."' order by id_jenistransaksi");	
														$info3 = mysql_fetch_array( $data3 );
													?>
													<span> : <? echo $info3['jenistransaksi'];?></span>
												</div>	
											
												<div class="form-group">
													<label for="comment">Tarikh</label>
													<span> : <? echo $info['tarikh'];?></span>
												</div> 
												
												<div class="form-group">
													<label for="comment">Harga</label>
													<span> : RM <? echo $info['jumlah'];?></span>
													
												</div>
												
												<div class="form-group" align="left">
													<label>Daripada</label>
													<span> : <? echo $info1['nama'];?> (<? echo $info['doc_giveby'];?>)</span>
												</div>
												
												<div class="form-group" align="left">
													<label>Kepada</label>
													<?
														$data2 = mysql_query("SELECT max(nama) AS nama FROM maklumat_pengguna WHERE ic_pengguna='".$info['kepada']."' ORDER BY ic_pengguna");	
														$info2 = mysql_fetch_array( $data2 );
													?>
													<span> : <? echo $info2['nama'];?> (<? echo $info['kepada'];?>)</span>
												</div>
												
												<div class="form-group" align="left">
													<label for="comment">Status Transaksi</label>
													<span> : <? echo $info['statustransaction'];?></span>
												</div>
												
												<div class="form-group" align="left">
													<label>Status Dokumen</label>
													<span> : <? echo $info['status_dokumen'];?></span>
												</div>
													
												 <div class="modal-footer">
													  <button type="button" class="btn btn-success" data-dismiss="modal">Kembali</button>
												 </div>
											
							 
											</div><!--modal-body-->
											</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
										 <?
											
										$i++;}
										?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
	