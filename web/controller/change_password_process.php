
<?php
	session_start();
    require '../../server.php';
	
	$pengguna=$_SESSION['user'];
	$kod_pengguna=$_SESSION['KOD_PENGGUNA'];
 
    $ic_lama_pengguna = null;
    if ( !empty($_GET['ic_lama_pengguna'])) {
        $ic_lama_pengguna = $_REQUEST['ic_lama_pengguna'];
    }
     
    if ( null==$ic_lama_pengguna ) {
        header("Location: ../index.php");
    }
     

        // keep track post values
		$password_lama = md5($_POST['password_lama']);
        $password_baru= $_POST['password_baru'];
        $reenter_password_baru= $_POST['reenter_password_baru'];
        $password_baru2= md5($_POST['password_baru']);
        
      
   
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if ($reenter_password_baru == $password_baru) {
				$sql = "SELECT pwd FROM akaun_pengguna WHERE pwd='$password_lama' and ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
				$result=mysql_query($sql);
				if($result){
					$sql2= "UPDATE akaun_pengguna set pwd = '$password_baru2' WHERE ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
					$q = $pdo->prepare($sql2);
					$q->execute(array($pwd));
				}
				else{
					echo"<script>alert('Invalid Data!');document.location.href='../change_password.php';</script>";
				}
				
				Database::disconnect();
				echo"<script>alert('Kemaskini Berjaya!');document.location.href='../index.php';</script>";

            $sql = "SELECT pwd FROM akaun_pengguna WHERE pwd='$password_lama' and ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
			$result=mysql_query($sql);// or die(mysql_error());
			if($result){
				$sql2= "UPDATE akaun_pengguna set pwd = '$password_baru2' WHERE ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
				$q = $pdo->prepare($sql2);
				$q->execute(array($pwd));

			}
			else{
				echo"<script>alert('Pengesahan Kata Laluan Baru Tidak Sama');document.location.href='../change_password.php';</script>";
			}
           
        }else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Sah Kata Laluan Baru tidak sama dengan Kata Laluan Baru.');
					window.location.href='../change_password.php';
					</script>");
			}
?>