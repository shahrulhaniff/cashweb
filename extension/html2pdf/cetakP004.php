<?
session_start();
date_default_timezone_set("Asia/Kuala_lumpur");
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$content = '
<style type="text/css">
.button {
  background-color: #1b1c57;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 30px;
  margin: 4px 2px;
  cursor: pointer;
  width: 100%;
}

p,table {
	font-size:14px;
	font-family: Arial, Helvetica, sans-serif;
}

.firstLine{
    border-bottom: 1px solid black;
}
.firstLine2{
    border: 1px solid black;
}
/*
th, td {
  padding: 8px;
} */
</style>
';

include("../../server.php");
//$message= $_GET['message'];
$idk= $_GET['idk'];

	$data = mysql_query("SELECT * FROM kod_transaksi WHERE id_kodtransaksi='".$idk."'");
	$row = mysql_fetch_array( $data );
	$no_sb = $row['no_sb'];
	$description = $row['description'];
	$tarikh_mula = $row['tarikhbuka'];
	$tarikh_akhir= $row['tarikhtutup'];
	$kelas 		 = $row['kelas'];


$tar=date("Y-m-d");

$tarikh_mula  = substr($tarikh_mula,8,2).'/'.substr($tarikh_mula,5,2).'/'.substr($tarikh_mula,0,4);
$tarikh_akhir = substr($tarikh_akhir,8,2).'/'.substr($tarikh_akhir,5,2).'/'.substr($tarikh_akhir,0,4);
$harga 		  = "30.00";
$lokasi 	  = "Kaunter JPP (KGB)";
$jam 		  = "12:00 Tengahari";


$content .= '
<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">

<table>
<tr>
<td><img src="../../web/imgs/logo.png" alt="logo" style="height: 23px; "></td><td ><font style="font-size:10px;"><i>Cetakan Dokumen Aplikasi Cashless UniSZA</i></font></td></tr></table>

<br>
<br>
<table style="width:100%; border-collapse: collapse;" border="1">
<tr>
<th style="width:30%;" align="center"> NOMBOR DAN BUTIRAN TAWARAN 								 </th>
<th style="width:20%;" align="center">KELAS, KEPALA, SUB-KEPALA									 </th>
<th style="width:25%;" align="center">TARIKH, MASA TAKLIMAT & TEMPAT LAWATAN TAPAK 				 </th>
<th style="width:25%; padding: 8px;" align="center">TARIKH, TEMPAT, HARGA JUALAN DOKUMEN TAWARAN & TARIKH TUTUP</th>
</tr>

<tr>
<td style="width:30%; padding: 10px;"><b><u>'.$no_sb.'</u></b> <br><br>'.$description.' </td>
<td style="width:20%;" align="center">'.$kelas.'</td>
<td style="width:25%;" align="center">3</td>
<td style="width:25%;" align="center">
	<table>
	
	<tr><td class="firstLine"><b>Tarikh:</b><br>'.$tarikh_mula.' - '.$tarikh_akhir.'<br><br></td></tr>
	
	<tr><td class="firstLine"><b>Harga Dokumen:</b><br>RM'.$harga.'<br><br></td></tr>
	
	<tr><td class="firstLine"><b>Tempat:</b><br>'.$lokasi.'<br><br></td></tr>
	<tr><td><b>Tarikh Tutup:</b><br>'.$tarikh_akhir.'<br><br>'.$jam.'</td></tr>
	</table>
</td>
</tr>

</table>

<BR><BR>
<font color="red">QR CODE TGH IMPLEMENT LG</font>


</page>
';

//HTML2PDF JOB START
$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0); //$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);

/*Komen Salah Satu Dekat out.php*/
include 'out2.php';

?>