
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
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $password_penggunaError = null;
        $password_penggunaError1 = null;
         
        // keep track post values
		$password_lama = md5($_POST['password_lama']);
        $password_baru= $_POST['password_baru'];
        $password_baru2= md5($_POST['password_baru']);
        
        // validate input
        $valid = true; 
		if (empty($password_lama)) {
            $password_penggunaError = 'Masukkan kata laluan semasa';
            $valid = false;
        }
		
		if (empty($password_baru)) {
            $password_penggunaError1 = 'Masukkan kata laluan baru';
            $valid = false;
        }
         
        // update data
        if ($valid) {
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT pwd FROM akaun_pengguna WHERE pwd='$password_lama' and ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
			$result=mysql_query($sql);// or die(mysql_error());
			if($result){
				$sql2= "UPDATE akaun_pengguna set pwd = '$password_baru2' WHERE ic_pengguna='$pengguna' and kod_pengguna='$kod_pengguna'";
				$q = $pdo->prepare($sql2);
				$q->execute(array($pwd));
			}
			else{
				echo"<script>alert('Invalid Data!');document.location.href='../change_password.php';</script>";
			}
           
			
            Database::disconnect();
			echo"<script>alert('Update Success!');document.location.href='../index.php';</script>";
            //header("Location: index.php");
        }
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