

<div class="col-md-12">

                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Senarai Jenis Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:20px;">Bil</th>
                                            <th style="width:200px;">Jenis Transaksi</th>
                                            <th style="width:200px;">Pusat Tanggungjawab (PTj)</th>
                                            <th style="width:300px;">Keterangan</th>
                                            <th style="width:10px;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<tr class='gradeA'>
									<form method="post" action="../web/controller/jenis_transaksi_add_exec.php">
									<td><i class="fa fa-user w3-text-blue w3-large"></i></td>
									<td><div class="form-group" align="left">
											<select required class="form-control" name="jenistransaksi" value="">
												<option value="">--Pilih--</option>
												<option value="SBT">Sebut Harga/Tender</option>
												<option value="SYD">Seminar/Yuran/Denda</option>
												<option value="D">Derma</option>
											</select>
											</div></td>
									<td>
									<div class="form-group" align="left">
											<select required class="form-control" name="jabatan" value="">
												<option value="">--Pilih--</option>
												<option value="JPP">JPP</option>
												<option value="MASJID">MASJID</option>
												<option value="PERPUSTAKAAN">PERPUSTAKAAN</option>
												<option value="PUSAT TEKNOLOGI MAKLUMAT">PUSAT TEKNOLOGI MAKLUMAT</option>
											</select>
											</div>
											</td>
									<td><!--<input type="text" name="no_telefon" id="no_telefon" size="20">--></td>
									<td><a><button type="submit" class="btn btn-primary">Tambah</button></a></td>
									</form>
									</tr>
<?php // Connects to your Database 

 $data = mysql_query("SELECT * FROM kod_jenistransaksi"); ?>
                                        
										<?php
										$i=1;
										while($info = mysql_fetch_array( $data )) {
											echo "<tr class='gradeA'>";
											echo "<td>".$i." </td>";
                                           // echo "<td>".$info['id_jenistransaksi'] . " </td>";
                                            echo "<td>".$info['jenistransaksi'] . " </td>";
                                            echo "<td>".$info['jabatan'] . " </td>";
?>
<td><?=$info['jabatan']?></td>
<td>


<table border="0"><tr>
<td>
<input type="image" src="../web/imgs/edit2.png" height="20" title="Kemaskini" data-toggle="modal" data-target="#myModal<?echo $info['id_jenistransaksi'];?>">
</td><td>
<a href="../web/controller/jenis_transaksi_delete_exec.php?id_jenistransaksi=<?echo $info['id_jenistransaksi']; ?>"><button type="button" style="padding:1px 10px; border: none;background: none;" onclick="return confirm('Anda pasti untuk padam data ini?');"><img src="imgs/del.png" height="20" border="0" title="Hapus Data"></button></a>
</td><td>
<form action="senarai_sa.php" method="POST"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="hidden" name="jabatan" value="<?=$info['jabatan']?>">
<input type="image" src="../web/imgs/keys.png" alt="Submit" height="20" title="Senarai Sub-Admin">
</form>
</td><td width="10px">&nbsp;</td><td>
<? $idd = $info['id_jenistransaksi']; ?>
<!-- <a href="../extension/html2pdf/cetakQR.php?idd='.$idd.'"><button class="btn btn-info">QR mod</button></a> -->
<form action="../extension/html2pdf/cetakP003.php" method="GET" target="_blank">
<input type='hidden' value='<?=$info['id_jenistransaksi']?>' name='id'>
<input type="image" src="../web/imgs/print.gif" alt="Submit" height="20" title="Cetak">
</form>
</td>
</tr></table>


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
											
											<!-- type hidden -->
											<input class="form-control" type="hidden" id="current_jabatan" name="current_jabatan" value="<?php echo $info['jabatan']; ?>" readonly >
											<input class="form-control" type="hidden" id="id_jenistransaksi" name="id_jenistransaksi" value="<?php echo $info['id_jenistransaksi']; ?>" readonly >
											

												<div class="form-group" align="left">
												<label>Jenis Transaksi</label>
											<select required class="form-control" name="jenistransaksi" value="">
												<option value="<?php echo $info['jenistransaksi']; ?>"><?php echo $info['jenistransaksi']; ?></option>
												<option value="Sebut Harga">Sebut Harga</option>
												<option value="Tender">Tender</option>
												<option value="Seminar">Seminar</option>
												<option value="Derma">Derma</option>
											</select>
											</div>
<!--								
												<div class="form-group" align="left">
												<label>Jenis Transaksi</label>
												<?php 
												$dataJenistransaksi = mysql_query("SELECT DISTINCT(jenistransaksi)AS jenistransaksi FROM kod_jenistransaksi WHERE jenistransaksi != '".$info['jenistransaksi']."'");
													
														
											?>
											<select required class="form-control" name="jenistransaksi" value="">
											<option value="<?php echo $info['jenistransaksi']; ?>"><?php echo $info['jenistransaksi']; ?></option>
												
											<?while($infoJenistransaksi = mysql_fetch_array( $dataJenistransaksi )) {?>
												<option value="<?php echo $infoJenistransaksi['jenistransaksi']; ?>"><?php echo $infoJenistransaksi['jenistransaksi']; ?></option>
												<?}?>
											</select>
														
											</div>
						-->					
										<div class="form-group" align="left">
										<label>Pusat Tanggungjawab (PTj)</label>
											<select required class="form-control" name="jabatan" value="">
												<option value="<?php echo $info['jabatan']; ?>"><?php echo $info['jabatan']; ?></option>
												<option value="JPP">JPP</option>
												<option value="MASJID">MASJID</option>
												<option value="PERPUSTAKAAN">PERPUSTAKAAN</option>
												<option value="PUSAT TEKNOLOGI MAKLUMAT">PUSAT TEKNOLOGI MAKLUMAT</option>
											</select>
											</div>

											<!--						
												<div class="form-group" align="left">
													<label>Pusat Tanggungjawab (PTj)</label>
													<input class="form-control" id="jabatan" name="jabatan" value="<?php echo $info['jabatan']; ?>" required autocomplete=""  onkeyup=" var start = this.selectionStart;var end = this.selectionEnd; this.value = this.value.toUpperCase();this.setSelectionRange(start, end);" >
												</div>
												
											-->
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
				
				