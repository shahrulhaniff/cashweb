

<!-- ##################################################################################### -->
<!-- 									Advanced Tables 								   -->
<!-- ##################################################################################### -->
                    <div class="panel panel-default">
                       
                        <div class="">
                            <div class="paddingsikit"><!-- table-responsive -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID Event</th>
                                            <th>KOD</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

$data = mysql_query("SELECT * from kod_jenistransaksi") or die(mysql_error()); 
while($info = mysql_fetch_array( $data )) {
//Retrieve data
$idEvent 		= $info['id_jenistransaksi'];
$kod 			= $info['jenistransaksi'];

											echo "<tr class='gradeA'>";
                                            echo "<td>".$idEvent. " </td>";
                                            echo "<td>".$kod. " </td>";
											?>
                                            <td>
<TABLE><TR>
<!-- GOTO PARTICIPANT LIST -->
<TD>
<form action="pList.php" method="POST">
<div class="plist">
<?php unset($_SESSION['idEvent']); /*Destroy session idEvent2 dulu untuk guna next session */ ?>
<input type='hidden' value='<?=$idEvent?>' name='idEvent'>&nbsp;
<input type="image" src="assets/img/pplist.png" alt="Submit" width="35" height="35" title="Participant List">
<?php /*To calculate participant list*/ $datacount4badge = mysql_query("SELECT count(jenistransaksi) as myCount from kod_jenistransaksi;") or die(mysql_error()); $infobadge = mysql_fetch_array( $datacount4badge ); $countptcp = $infobadge['myCount']; ?>
<div class="mylabel">
<span class="label label-saya"><?=$countptcp?></span>
</div>
</div>
</form>
</TD>
<!--EVENT REPORT-->
<TD>
<form action="report.php" method="POST">
<?php unset($_SESSION['idEvent']);?>
<input type='hidden' value='<?=$idEvent?>' name='idEvent'>&nbsp;
<input type="image" src="assets/img/chart.png" alt="Submit" width="35" height="35" title="Event Report">
</form>
</TD>
<!-- UPDATE -->
<TD>										
<form action="" method="POST">
<input type='hidden' value='<?=$idEvent?>' name='id'>&nbsp;
<input type="hidden" name="updateForm">
<input type="image" src="assets/img/update.png" alt="Submit" width="35" height="35" title="Update">
</form>
</TD>
<!-- DELETE -->
<TD>
<form action="" method="POST" onSubmit="return confirm('Deletion, are you sure?')">
<input type='hidden' value='<?=$idEvent?>' name='id'>&nbsp;
<input type="hidden" name="delete">
<input type="image" src="assets/img/trash.png" alt="Submit" width="35" height="35" title="Delete">
</form>
</TD>

</TR></TABLE>
											</td>
											<?php
											echo "</tr>";

										}mysql_free_result($data); 
										?>
                                        
                                    </tbody>
                                </table>

                            </div>
                            
                        </div>
                    </div>
<!-- ##################################################################################### -->
<!--								End Advanced Tables 							   	   -->
<!-- ##################################################################################### -->