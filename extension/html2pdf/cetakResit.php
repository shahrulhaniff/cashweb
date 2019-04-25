<?
session_start();
date_default_timezone_set("Asia/Kuala_lumpur");
include("../../server.php");
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$content = '
<style type="text/css">
.button {
  background-color: #000000;
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 100%;
}

p,table {
	font-size:12px;
	font-family: Arial, Helvetica, sans-serif;
}
</style>
';

//include("../../server.php");


$idt=$_GET['idt'];
/*
$message		=$_GET['message'];
$transactionNo	=$_GET['transactionNo'];
$page			=$_GET['page'];
$pa				=$_GET['pa'];
$user			=$_GET['user'];
$merchantID		=$_GET['merchantID'];
$cardType		=$_GET['cardType']; */


$data = mysql_query("SELECT * FROM transaksi T, maklumat_pengguna M, kod_transaksi K WHERE T.id_transaksi='".$idt."' AND M.ic_pengguna=T.ic_pengguna AND K.id_kodtransaksi=T.id_kodtransaksi");
$row = mysql_fetch_array( $data );

$message		=$row['statustransaction'];
$transactionNo	=$row['norujukan'];
$tarikh			=$row['tarikh'];
$pa				=$row['jumlah'];
$nama			=$row['nama'];
$merchantid		=$row['merchantid'];
$cardType		=$row['jeniskad'];



	$no_sb 		 = $row['no_sb'];
	$description = $row['description'];
	$tarikh_mula = $row['tarikhbuka'];
	$tarikh_akhir= $row['tarikhtutup'];
	$kelas 		 = $row['kelas'];
	$lokasi 	 = $row['tempatlwtntapak'];
	$lokasi2 	 ="Kaunter JPP (KGB)";
	$tarikh_mula = substr($tarikh_mula,8,2).'/'.substr($tarikh_mula,5,2).'/'.substr($tarikh_mula,0,4);
	$tarikh_akhir= substr($tarikh_akhir,8,2).'/'.substr($tarikh_akhir,5,2).'/'.substr($tarikh_akhir,0,4);
	$harga 		 = $row['harga'];
	$jam 		 = $row['jam'];
	$dttaklimat  = $row['dttaklimat'];



//$tar=date("Y-m-d");

if($message=='Approved'){ $color='green'; } else { $color='red'; }

$content .= '
<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">
';

$dokumen="Resit";
include "header.php";


	$content .='<table style="width:100%; border-collapse: collapse;" border="0"><tr><td style="width:100%; padding: 1px;" align="center"><img src="../../web/imgs/unisza.png" alt="logo" style="height: 150px; "></td></tr></table><br>';
	
	

$content .= '
<div class="button">Resit Pembayaran Cashless UniSZA</div>

<br>
<table>
<tr><td><b>Status</b></td><td>:</td>			<td><font color="'.$color.'"><b>'.$message.'</b></font></td></tr>
<tr><td><b>No. Rujukan</b></td><td>:</td>		<td><b>'.$transactionNo.'</b></td></tr>
<tr><td><b>Tarikh Transaksi</b></td><td>:</td>	<td><b>'.$tarikh.'</b></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>Jumlah</td><td>:</td>					<td>RM '.$pa.'</td></tr>
<tr><td>Dibayar oleh</td><td>:</td>				<td>'.$nama.'</td></tr>
<tr><td>ID Merchant</td><td>:</td>				<td>'.$merchantid.'</td></tr>
<tr><td>Jenis Kad</td><td>:</td>				<td>'.$cardType.'</td></tr>
</table>
<br><br>
<b>Pembayaran bagi dokumen: </b>
<br><br>
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
<td style="width:25%;" align="center">'.$dttaklimat.'<br><br>'.$lokasi.'</td>
<td style="width:25%;" align="center">
	<table style="width:100%;">
	<tr><td style="width:100%;" class="firstLine"><b>Tarikh:</b><br>'.$tarikh_mula.' - '.$tarikh_akhir.'<br><br></td></tr>
	<tr><td style="width:100%;" class="firstLine"><b>Harga Dokumen:</b><br>RM'.$harga.'<br><br></td></tr>
	<tr><td style="width:100%;" class="firstLine"><b>Tempat:</b><br>'.$lokasi2.'<br><br></td></tr>
	<tr><td style="width:100%;"><b>Tarikh Tutup:</b><br>'.$tarikh_akhir.'<br><br>'.$jam.'</td></tr>
	</table>
</td>
</tr>
</table>
<br><br><br><br>
Catatan: Resit ini dijana oleh komputer dan tiada tandatangan diperlukan. <br><br><br><br>
';

include 'footer.php';
$content .= '
</page>
';

//HTML2PDF JOB START
$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0); //$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);

/*Komen Salah Satu Dekat out.php*/
include 'out.php';

?>