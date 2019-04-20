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
	font-size:13px;
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
$id= $_GET['id'];

	$data = mysql_query("SELECT * FROM kod_jenistransaksi WHERE id_jenistransaksi='".$id."'");
	$row = mysql_fetch_array( $data );
	$id_jenistransaksi = $row['id_jenistransaksi'];
	$jenistransaksi = $row['jenistransaksi'];
	$jabatan = $row['jabatan'];





$content .= '<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">';
include "header.php";
$content .= '
<p style="text-align: justify; font-size:12px;">Kod QR Pusat Tanggungjawab (PTj) bagi bahagian:</p>


	<table>
	
	<tr><td class="firstLine"><b>ID:</b><br>'.$id_jenistransaksi.'<br><br></td></tr>
	
	<tr><td class="firstLine"><b>Jenis transaksi:</b><br>'.$jenistransaksi.'<br><br></td></tr>
	
	<tr><td class="firstLine"><b>Jabatan:</b><br>'.$jabatan.'<br><br></td></tr>
	</table>



';

$idd = $id;
include "../qr/qr4html2pdf_size2.php";

$content .='</page>';

//HTML2PDF JOB START
$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0); //$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);

/*Komen Salah Satu Dekat out.php*/
include 'out2.php';

?>