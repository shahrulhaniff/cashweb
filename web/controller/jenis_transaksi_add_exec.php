<?php
     
    require '../../server.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $id_jenistransaksiError = null;
        $jenistransaksiError = null;
        $jabatanError = null;
         
        // keep track post values
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $jenistransaksi = $_POST['jenistransaksi'];
        $jabatan = $_POST['jabatan'];
         
        // validate input
        $valid = true;
        if (empty($id_jenistransaksi)) {
            $id_jenistransaksiError = 'Masukkanr id jenis transaksi';
            $valid = false;
        }
         
        // if (empty($email)) {
            // $emailError = 'Please enter Email Address';
            // $valid = false;
        // } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            // $emailError = 'Please enter a valid Email Address';
            // $valid = false;
        // }
         
        if (empty($jenistransaksi)) {
            $jenistransaksiError = 'Masukkan jenis transaksi';
            $valid = false;
        } 
        if (empty($jabatan)) {
            $jabatanError = 'Masukkan jabatan';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            // $pdo = Database::connect();
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "INSERT INTO kod_jenistransaksi (id_jenistransaksi,jenistransaksi,jabatan) values('$id_jenistransaksi','$jenistransaksi','$jabatan')";
            // $q = $pdo->prepare($sql);
            // $q->execute(array($id_jenistransaksi,$jenistransaksi,$jabatan));
			
			// $pdo = Database::connect();
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "INSERT INTO kod_jenispengguna (kod_pengguna,jenis_pengguna,jabatan) values('testing','admin','$jabatan')";
            // $q = $pdo->prepare($sql);
            // $q->execute(array($kod_pengguna,$jenis_pengguna,$jabatan));
            // Database::disconnect();
			
			
		//$sql5 = "SELECT IFNULL(id_jenistransaksi,0) AS id_jenistransaksi FROM kod_jenistransaksi WHERE id_jenistransaksi='$id_jenistransaksi'";
		//$result1=mysql_query($sql5);
		//$ID_jenistransaksi=mysql_fetch_object($result1) ->id_jenistransaksi; //checking for registered student
		//if($ID_jenistransaksi>0){
			
			$sql5= "SELECT COUNT(jenistransaksi) AS mysemak FROM kod_jenistransaksi WHERE id_jenistransaksi='".$id_jenistransaksi."'";
			
			$result5=mysql_query($sql5) or die(mysql_error());
			$row5 = mysql_fetch_assoc($result5);
			$mysemak = $row5['mysemak'];
			
			if ($mysemak==0){
					
			
					$sql1="INSERT INTO kod_jenistransaksi (id_jenistransaksi,jenistransaksi,jabatan) values('$id_jenistransaksi','$jenistransaksi','$jabatan')";
					$result=mysql_query($sql1)or die(mysql_error());
			
			
				// $sql2 = "SELECT IFNULL(jabatan,0) AS jabatan FROM kod_jenispengguna WHERE jabatan='$jabatan'";
				// $result1=mysql_query($sql2);
				// $jabatan=mysql_fetch_object($result1) ->jabatan; //checking for registered student
				
				
				// if($jabatan>0){
				
			$sql2= "SELECT COUNT(jabatan) AS countJabatan FROM kod_jenispengguna WHERE jabatan='".$jabatan."'";
			
			$result2=mysql_query($sql2) or die(mysql_error());
			$row2 = mysql_fetch_assoc($result2);
			$countJabatan = $row2['countJabatan'];
			
			if ($countJabatan==0){
					
		  
					 $sql="SELECT MAX(kod_pengguna) AS id FROM kod_jenispengguna";
					$result1=mysql_query($sql);
					$id=mysql_fetch_object($result1)->id; 
					$id2 = ++$id;
			
			
					$sql3 = "INSERT INTO kod_jenispengguna (kod_pengguna,jenis_pengguna,jabatan) values('$id2','sub-admin','$jabatan')";
					$result=mysql_query($sql3)or die(mysql_error());
					
					echo ("<script LANGUAGE='JavaScript'>
							window.alert('Tambah Jabatan berjaya.');
							window.location.href='../index.php';
							</script>");
				}else{
					header("Location: ../index.php");
					}
		}else{
			 echo ("<script LANGUAGE='JavaScript'>
					window.alert('ID sudah wujud. Sila gunakan ID yang lain.');
					window.location.href='../index.php';
					</script>");
					//echo $id_jenistransaksi;
		}
				
        }
    }
?>
