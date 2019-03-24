

						<!-- Modal Add Sebut Harga -->
					 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
									
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" align="left" id="myModalLabel">Tambah Sebut Harga</h4>
										</div>
									
									<div class="modal-body">
									
									<form method="post" action="../web/controller/sebut_harga_tambah_exec.php">     
											 <div class="form-group" align="left">
												
												<label><font color="red">** Maklumat Wajib Diisi.</font></label>
												<br>
													 
													<!-- <input type="hidden" name="id_kodtransaksi" id="id_kodtransaksi" class="form-control" value="<? echo $id;?>" readonly />-->
												
												 <div class="form-group" align="left">
												<label for="comment">Kod Pengguna</label>
															<select required class="form-control" name="kod_pengguna" value="" style="width: 270px">
															<? 
															$data = mysql_query("SELECT * FROM kod_jenispengguna") or die(mysql_error());
															while ($row = mysql_fetch_assoc( $data )){ ?>
																<option value="<? echo $row['kod_pengguna'];?>"><? echo $row['kod_pengguna'];?> ( <? echo $row['jenis_pengguna'];?> - <? echo $row['jabatan'];?> )</option>
															<?}?>
															</select>
															</div>
															
												<div class="form-group">
													<label for="comment">No Sebut Harga</label>
													<input type="text" class="form-control" name="no_sb" id="no_sb" size="20">
												</div> 
												
												<div class="form-group">
													<label for="comment">Keterangan</label>
													<textarea class="form-control" rows="5" name="description" id="description"></textarea>
												</div>
												
												<div class="form-group" align="left">
													<label>Tarikh Buka</label><br>
													<input name="tarikhbuka" type="datetime-local" class="form-control" required/>
												</div>
												
												<div class="form-group" align="left">
													<label>Tarikh Tutup</label><br>
													<input name="tarikhtutup" type="datetime-local" class="form-control" required/>
												</div>
												
												<div class="form-group" align="left">
													<label>Jam</label><br>
													<input name="jam" type="time" class="form-control" required/>
												</div>
												
												<div class="form-group">
													<label for="comment">Harga (RM)</label>
													<input type="Number" class="form-control" name="harga" id="harga" size="20">
												</div> 
												
												<div class="form-group" align="left">
												<label for="comment">Jenis Transaksi</label>
															<select required class="form-control" name="id_jenistransaksi" value="" style="width: 270px">
																														<? 
															$data1 = mysql_query("SELECT * FROM kod_jenistransaksi") or die(mysql_error());
															while ($row1 = mysql_fetch_assoc( $data1 )){ ?>
																<option value="<? echo $row1['id_jenistransaksi'];?>"><? echo $row1['jenistransaksi'];?> - <? echo $row1['jabatan'];?></option>
															<?}?>
															
															</select>
															</div>
															
												<div class="form-group">
													<label for="comment">Kelas</label>
													<input type="text" class="form-control" name="kelas" id="kelas" size="20">
												</div>		
															
												<div class="form-group">
													<label for="comment">Diisi Oleh</label>
													<? $ic_pengguna=$_SESSION['user'];
													$data2 = mysql_query("SELECT * FROM maklumat_pengguna WHERE ic_pengguna = '$ic_pengguna'") or die(mysql_error());
													$row2 = mysql_fetch_array( $data2 );
													?>
													<input type="text" class="form-control" name="keyin_by" id="keyin_by" size="20" value="<? echo $row2['nama'];?>" readonly>
													<!--<span> : <? echo $row2['nama'];?></span>-->
												</div>		
														
												<div class="form-group" align="left">
													<label>Diisi Pada</label><br>
													<input name="tarikh_keyin" type="datetime-local" class="form-control" required/>
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
							
<!---------------------------------------------------------------------------------------->							
<div class="col-md-12">
			<div align="right">
							<button class="btn btn-primary" data-toggle="modal"  data-target="#myModal">Tambah Sub-Admin</button></a> <br>
			</div>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Senarai Sebut Harga
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Bil.</th>
											<th>No Sebut Harga</th>
											<th>Keterangan</th>
											<th>Tarikh Buka</th>
											<th>Tindakan</th>
										</tr>
                                    </thead>
                                    <tbody>
									<?php
						$data = mysql_query("SELECT * FROM kod_transaksi ORDER BY kod_pengguna DESC") 
						or die(mysql_error());
						$i=1;
						while($row = mysql_fetch_array( $data )) {
							echo "<tr class='gradeA'>";
							echo '<td>'. $i . '</td>';
							echo '<td>'. $row['no_sb'] . '</td>';
							echo '<td>'. $row['description'] . '</td>';
							echo '<td>'. $row['tarikhbuka'] . '</td>';
						    echo '<td width=250>';
                            ?>
							<button class="btn btn-info" data-toggle="modal" data-target="#myModal<?echo $row['id_kodtransaksi'];?>">Papar</button>
							<?
							echo '  ';
								?>
								<button class="btn btn-info" data-toggle="modal" data-target="#myModal1<?echo $row['id_kodtransaksi'];?>">Kemaskini</button>
								<?
                                echo '  ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id_kodtransaksi'].'">Padam</a>';
                                echo '</td>';
						
					
					?>
                                        <!-- Modal Kemaskini-->
											<div class="modal fade" id="myModal1<?echo $row['id_kodtransaksi'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" align="left" id="myModalLabel">Kemaskini</h4>
												</div>
												
											 <div class="modal-body">
												<form method="post" action="../web/controller/subadmin_tambah_exec.php?jabatan=<?echo $jabatan;?>">     
											 <div class="form-group" align="left">
												
												<label><font color="red">** Maklumat Wajib Diisi.</font></label>
												<br>
													 
													 <input type="hidden" name="id_jenistransaksi" id="id_jenistransaksi" class="form-control" value="<? echo $id;?>" readonly />
												
												 
												<div class="form-group">
													<label for="comment">No Sebut Harga</label>
													<input type="text" class="form-control" name="no_sb" id="no_sb" size="20" value="<? echo $row['no_sb'];?>">
												</div> 
												
												<div class="form-group">
													<label for="comment">Keterangan</label>
													<textarea class="form-control" rows="5" name="description" id="description"><? echo $row['description'];?></textarea>
												</div>
												
												<div class="form-group" align="left">
													<label>Tarikh Buka</label><br>
													<input name="tarikhbuka" type="date" class="form-control" value="<? echo $row['tarikhbuka'];?>" required/>
												</div>
												
												<div class="form-group" align="left">
													<label>Tarikh Tutup</label><br>
													<input name="tarikhtutup" type="date" class="form-control" value="<? echo $row['tarikhtutup'];?>" required/>
												</div>
												
												<div class="form-group" align="left">
													<label>Jam</label><br>
													<input name="jam" type="time" class="form-control" value="<? echo $row['jam'];?>" required/>
												</div>
												
												<div class="form-group">
													<label for="comment">Harga (RM)</label>
													<input type="Number" class="form-control" name="harga" id="harga" size="20" value="<? echo $row['harga'];?>">
												</div> 
												
												<div class="form-group" align="left">
												<label for="comment">Jenis Transaksi</label>
															<select required class="form-control" name="id_jenistransaksi" value="" style="width: 270px">
															<option value="">--Pilih--</option>
															
															</select>
															</div>
															
												<div class="form-group">
													<label for="comment">Kelas</label>
													<input type="text" class="form-control" name="kelas" id="kelas" size="20" value="<? echo $row['kelas'];?>">
												</div>		
															
												<div class="form-group">
													<label for="comment">Diisi Oleh</label>
													<input type="text" class="form-control" name="keyin_by" id="keyin_by" size="20" value="<? echo $row['tarikhbuka'];?>">
												</div>		
														
												<div class="form-group" align="left">
													<label>Diisi Pada</label><br>
													<input name="tarikh_keyin" type="datetime" class="form-control" value="<? echo $row['tarikh_keyin'];?>" required/>
												</div>
												
												 <div class="modal-footer">
													   <button type="submit" class="btn btn-primary" >Simpan</button>
													   <button type="reset" class="btn btn-info">Tetapan Semula</button>
												 </div>
												 </div>
							 
											</form>
											</div><!--modal-body-->
											</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											
		
								<!-- Modal Papar Maklumat-->
											<div class="modal fade" id="myModal<?echo $row['id_kodtransaksi'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" align="left" id="myModalLabel">Paparan Maklumat</h4>
												</div>
												
											 <div class="modal-body">
												<div class="form-group">
													<label for="comment">No Sebut Harga</label>
													<span> : <? echo $row['no_sb'];?></span>
												</div> 
												
												<div class="form-group">
													<label for="comment">Keterangan</label>
													<span> : <? echo $row['description'];?></span>
													
												</div>
												
												<div class="form-group" align="left">
													<label>Tarikh Buka</label>
													<span> : <? echo $row['tarikhbuka'];?></span>
												</div>
												
												<div class="form-group" align="left">
													<label>Tarikh Tutup</label>
													<span> : <? echo $row['tarikhtutup'];?></span>
												</div>
												
												<div class="form-group" align="left">
													<label>Jam</label>
													<span> : <? echo $row['jam'];?></span>
												</div>
												
												<div class="form-group">
													<label for="comment">Harga</label>
													<span> : RM <? echo $row['harga'];?></span>
												</div> 
												
												<div class="form-group" align="left">
													<label for="comment">Jenis Transaksi</label>
													<span> : <? echo $row['id_jenistransaksi'];?></span>
												</div>
															
												<div class="form-group">
													<label for="comment">Kelas</label>
													<span> : <? echo $row['kelas'];?></span>
												</div>		
															
												<div class="form-group">
													<label for="comment">Diisi Oleh</label>
													<span> : <? echo $row['keyin_by'];?></span>
												</div>		
														
												<div class="form-group" align="left">
													<label>Diisi Pada</label>
													<span> : <? echo $row['tarikh_keyin'];?></span>
												</div>
												
												 <div class="modal-footer">
													  <button type="button" class="btn btn-success" data-dismiss="modal">Kembali</button>
												 </div>
											
							 
											</div><!--modal-body-->
											</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
										
								
									<?$i++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
											
										