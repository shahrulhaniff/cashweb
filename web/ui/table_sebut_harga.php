

<div class="col-md-12">
			<div align="right">
							<button class="btn btn-primary" data-toggle="modal"  data-target="#myModal">Tambah</button></a> <br>
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
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['id_kodtransaksi'].'">Info</a>';
                                echo '  ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id_kodtransaksi'].'">Update</a>';
                                echo '  ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id_kodtransaksi'].'">Delete</a>';
                                echo '</td>';
						$i++;}
					
					?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
	