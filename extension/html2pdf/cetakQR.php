<?
session_start();
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
	font-size:30px;
	font-family: Arial, Helvetica, sans-serif;
}
</style>
';

//include("../../server.php");


$idd=$_GET['idd'];



$content .= '
<page backtop="15mm" backbottom="15mm" backleft="20mm" backright="20mm">

<table>
<tr>
<td><img src="../../web/imgs/nopic.png" alt="logo" style="height: 26px; width: 26px;"></td><td ><font style="font-size:9px;"><i>Cetakan Resit Pembayaran Melalui Aplikasi Cashless UniSZA</i></font></td></tr></table>

<div class="button">Resit Pembayaran Cashless UniSZA</div>

haha
</page>
';

//HTML2PDF JOB START
$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0); //$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);

/*Komen Salah Satu Dekat out.php*/
include 'out.php';

?>