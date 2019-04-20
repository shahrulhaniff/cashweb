
<?php
	session_start();
    require '../../server.php';
	
	$pengguna=$_SESSION['user'];
	$kod_pengguna=$_SESSION['KOD_PENGGUNA'];
 
   
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
					echo"<script>alert('Invalid Data!');document.location.href='../sa_change_password.php';</script>";
				}
				
				Database::disconnect();
				echo"<script>alert('Kemaskini Berjaya!');document.location.href='../sa_sebut_harga.php';</script>";

            $sql = "SELECT pwd FROM akaun_pengguna WHERE pwd='$password_lama' and ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
			$result=mysql_query($sql);
			if($result){
				$sql2= "UPDATE akaun_pengguna set pwd = '$password_baru2' WHERE ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
				$q = $pdo->prepare($sql2);
				$q->execute(array($pwd));

			}
			else{
				echo"<script>alert('Pengesahan Kata Laluan Baru Tidak Sama');document.location.href='../sa_change_password.php';</script>";
			}
        }else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Sah Kata Laluan Baru tidak sama dengan Kata Laluan Baru.');
					window.location.href='../sa_change_password.php';
					</script>");
		}
	
    // else {
        // $pdo = Database::connect();
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = "SELECT * FROM kod_transaksi where id_kodtransaksi = ?";
        // $q = $pdo->prepare($sql);
        // $q->execute(array($id));
        // $data = $q->fetch(PDO::FETCH_ASSOC);
        // $no_sb = $data['no_sb'];
        // $description = $data['description'];
        // $tarikhbuka = $data['tarikhbuka'];
        // Database::disconnect();
    // }
?>
			