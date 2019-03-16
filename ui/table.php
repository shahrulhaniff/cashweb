

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
                                            <th>Kod-QR</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php // Connects to your Database 

 $data = mysql_query("SELECT * FROM kod_jenistransaksi") 
 or die(mysql_error()); ?>
                                        
										<?php
										while($info = mysql_fetch_array( $data )) {
											echo "<tr class='gradeA'>";
											echo '<td><i class="fa fa-user w3-text-blue w3-large"></i></td>';
                                            echo "<td>".$info['id_jenistransaksi'] . " </td>";
                                            echo "<td>".$info['jenistransaksi'] . " </td>";
?><td><form action="QRLogo.php" method="POST" target="_blank"><input type="hidden" name="id_jenistransaksi" value="<?=$info['id_jenistransaksi']?>"><input type="submit" value="Jana Kod QR"></form></td><?
                                            echo "<td>sini abeley buat add, update, delete</td>";
											echo "</tr>";
										}
										?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
	