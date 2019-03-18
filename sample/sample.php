<?php
    require("class.vpcGenerateLink.php");
    $byrn_array = array('0.01','0.10');
    $vpc  = new vpcGenerateLink("prod","Payment Sample",'PC KOD SAMPLE','https://epayment.unisza.edu.my/sample/sample_finish.php',$byrn_array);
    $vpc->processSubmit();

    // kat kalau boleh page ni simpan user,
    // simpan apa yg disubmit untuk rujukan 
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
<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="./">e-Payment</a></li>
  <li class="active">Sample</li>
</ol>
<div class="container bs-docs-container">
    <h1 class="page-header" id="e-Pay">
    <a data-anchorjs-icon="" aria-label="Anchor link for: badges" href="#badges" class="anchorjs-link "
     style="font-family: anchorjs-icons; font-style: normal; font-variant: normal; font-weight: normal; position: absolute; margin-left: -1em; padding-right: 0.5em;">
     </a>e-Payment Sample</h1>
    <form name="PayForm" id="PayForm" method="post" action="">
    <div class='row bs'>
        <div class="col-md-offset-3 col-sm-3 col-md-3">Category :</div>
        <div class="col-sm-6 col-md-6">
            <select name="fee_type" id="RegisterFeeType">
                <option value=0>1 sen</option>
                <option value=1>10 sen</option>
            </select>
        </div>

        <div class="col-md-offset-3 col-sm-6 col-md-3">Name *:</div>
        <div class="col-sm-6 col-md-6"><input name="registername" type="text" 0="0" maxlength="150" value="" id="registername" /></div>
        
        <div class="col-md-offset-3 col-sm-6 col-md-3">Reference ID *:</div>
        <div class="col-sm-6 col-md-6">
            <input name="registerid" type="text" maxlength="15" value="" id="registerid" />
        </div>

        <div class="col-md-offset-3 col-sm-6 col-md-3">Email *:</div>
        <div class="col-sm-6 col-md-6"><input name="email" type="text" maxlength="150" value="" id="email" /></div>
        
        <div class="col-md-offset-3 col-sm-6 col-md-3">Payment Via
            <img src="img/mastercard_logo.gif" title="Credit Card - MasterCard" alt="Credit Card - MasterCard" />
            <img src="img/visa_logo.gif" title="Credit Card - VISA" alt=" Credit Card - VISA" />
        </div>
        <div class="col-sm-6 col-md-6">&nbsp;</div>
        
        <div class="col-md-offset-3 col-sm-6 col-md-3">&nbsp;</div>
        <div class="col-sm-6 col-md-6">
            <input type='submit' value='Pay' name='pay' class="btn btn-primary"  />
        </div>
    </div>
    </form>
</div>
</body>
</html>
