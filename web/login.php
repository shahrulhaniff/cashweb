<!DOCTYPE html>
<html>
<title>Log Masuk</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}


</style>
<body class="w3-light-grey">
<? include "ui/menulogin.php"; ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-lock"></i> Log Masuk</b></h5>
  </header>

  
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
	
      <div class="w3-container w3-quarter">
 <form action="login2.php" method="POST">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="usr" value="941013115436" placeholder="Kad Pengenalan" autocomplete="off">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="pwd" value="123" placeholder="Kata Laluan" autocomplete="new-password">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon"></span>
      <input type="submit" name="loginuser" value="Log Masuk"><!-- style="width: 200px; border: 2px solid #f13f12;" -->
    </div>
  </form>
	</div>
</div>
 
<? //include "ui/footer.php"; ?>

  <!-- End page content -->
</div>
</body>
</html>