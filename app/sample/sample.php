<?php
session_start();
if (!empty($_SESSION['USER'])) {
unset($_SESSION['hashing']);
unset($_SESSION['USER']);
unset($_SESSION['IDK']);
unset($_SESSION['IDJT']);
unset($_SESSION['PA']);
}

    require("class.vpcGenerateLink.php");
    //$byrn_array = array('0.01','0.10','0.20');
    //$vpc  = new vpcGenerateLink("prod","Payment Sample",'PC KOD SAMPLE','https://epayment.unisza.edu.my/sample/sample_finish.php',$byrn_array);
    // yg ni unkomen $vpc  = new vpcGenerateLink("prod","Payment Sample",'PC KOD SAMPLE','https://epayment.unisza.edu.my/langlit_finish.php',$byrn_array);
    //$vpc  = new vpcGenerateLink("prod","Payment Sample",'PC KOD SAMPLE','https://epayment.unisza.edu.my/sample/sample_finish.php');
    $vpc  = new vpcGenerateLink("prod","Payment Sample",'CASHLESS-APP','https://cashless123.000webhostapp.com/app/sample/sample_finish.php');
    //$vpc  = new vpcGenerateLink("prod","Payment Sample",'CASHLESS-APP','http://localhost/cashweb/app/sample/sample_finish.php');
    //$vpc  = new vpcGenerateLink("prod","Payment Sample",'PC KOD SAMPLE','http://myraxsoft.com/cashless/app/sample/sample_finish.php');
    $vpc->processSubmit();

    // kat kalau boleh page ni simpan user,
    // simpan apa yg disubmit untuk rujukan 
	
include "../../server.php";
 
  $cn = $_GET['cn'];
  $ced = $_GET['ced'];
  $csc = $_GET['csc'];
  $pa = $_GET['pa'];
  $idk = $_GET['idk'];
  $user = $_GET['user'];
  
 //retrieve id_jenistransaksi
 $data = mysql_query("SELECT id_jenistransaksi FROM kod_transaksi  WHERE id_kodtransaksi ='".$idk."'") 
 or die(mysql_error());
 $info = mysql_fetch_array( $data );
 $id_jenistransaksi = $info['id_jenistransaksi'];

 
 $_SESSION['USER']	= $user;
 $_SESSION['IDK']	= $idk;
 $_SESSION['IDJT'] 	= $id_jenistransaksi;
 $_SESSION['PA']	= $pa;
 $tarikh 			=date('Y-m-d h:i:s');
 
 
//--------------------------------------------------------------------------------------------
//_______________________________[SERVER]_ADD EVENT___________________________________________
//--------------------------------------------------------------------------------------------

//$sqlP="INSERT INTO transaksi (ic_pengguna,id_kodtransaksi,id_jenistransaksi,tarikh,jumlah,daripada,kepada,statustransaction,status_dokumen) VALUES ('$user','$idk','$id_jenistransaksi','$tarikh','$pa','$user','TEST','KODMIGS','NO')";
//$resultP=mysql_query($sqlP)or die(mysql_error());
?>
<html>
<head>
    <title>UniSZA E-Payment</title>
    <meta name="robots" content="nofollow" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script language="javascript" type='text/javascript' src='js/jquery-2.1.4.min.js'></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container bs-docs-container">

    <form name="PayForm" id="PayForm" method="post" action="">
    <div class='row bs'>
        <div class="col-md-offset-3 col-sm-3 col-md-3">Harga :</div>
        <div class="col-sm-6 col-md-6">
            <!--<select name="fee_type" id="RegisterFeeType">
                <option value=0>1 sen</option>
                <option value=1>10 sen</option>
            </select> -->
            <input name="fee_type" type="text" maxlength="15" value="<?=$pa?>" id="RegisterFeeType" />
        </div>

        <div class="col-md-offset-3 col-sm-6 col-md-3">Nama *:</div>
        <div class="col-sm-6 col-md-6"><input name="registername" type="text" 0="0" maxlength="150" value="<?=$cn?>" id="registername" /></div>
        
        <div class="col-md-offset-3 col-sm-6 col-md-3">Rujukan ID *:</div>
        <div class="col-sm-6 col-md-6">
            <input name="registerid" type="text" maxlength="15" value="<?=$ced?>" id="registerid" />
        </div>

        <div class="col-md-offset-3 col-sm-6 col-md-3">Emel *:</div>
        <div class="col-sm-6 col-md-6"><input name="email" type="text" maxlength="150" value="<?=$csc?>" id="email" /></div>
        <!--
        <div class="col-md-offset-3 col-sm-6 col-md-3">Payment Via
            <img src="img/mastercard_logo.gif" title="Credit Card - MasterCard" alt="Credit Card - MasterCard" />
            <img src="img/visa_logo.gif" title="Credit Card - VISA" alt=" Credit Card - VISA" />
        </div> -->
        <div class="col-sm-6 col-md-6">&nbsp;</div>
        <div class="col-md-offset-3 col-sm-6 col-md-3">&nbsp;</div>
        <div class="col-sm-6 col-md-6">
            <input type='submit' value='Bayar' name='pay' class="btn btn-primary"  />
        </div>
    </div>
    </form>

</div>
</body>
</html>
