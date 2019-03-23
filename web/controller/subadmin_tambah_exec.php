<?php
     
    require '../../server.php';
    $jabatan = $_GET['jabatan'];
	
	
    if ( !empty($_POST)) {
        // keep track validation errors
        $id_jenistransaksiError = null;
        $namaError = null;
        $ic_penggunaError = null;
        $emailError = null;
        $no_telefonError = null;
         
        // keep track post values
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $nama = $_POST['nama'];
        $ic_pengguna = $_POST['ic_pengguna'];
        $email = $_POST['email'];
        $no_telefon = $_POST['no_telefon'];
         
        // validate input
        $valid = true;
        if (empty($id_jenistransaksi)) {
            $id_jenistransaksiError = 'Masukkanr id jenis transaksi';
            $valid = false;
        }
         
       
        if (empty($nama)) {
            $namaError = 'Masukkan nama';
            $valid = false;
        } 
        
        if (empty($ic_pengguna)) {
            $ic_penggunaError = 'Masukkan nombor kad pengenalan';
            $valid = false;
        } 
		
		 if (empty($email)) {
            $emailError = 'Masukkan alamat emel';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Masukkan alamat emel yang betul';
            $valid = false;
        }
         
        if (empty($no_telefon)) {
            $no_telefonError = 'Masukkan nombor telefon';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            
			// $sql1 = "INSERT INTO maklumat_pengguna (ic_pengguna,nama,email,no_telefon) values('$ic_pengguna','$nama','$email','$no_telefon')";
			// $q1 = $pdo->prepare($sql1);
            // $q1->execute(array($ic_pengguna,$nama,$email,$no_telefon));
			// Database::disconnect();
			
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO maklumat_pengguna (ic_pengguna,nama,email,no_telefon) values('$ic_pengguna','$nama','$email','$no_telefon')";
            $q = $pdo->prepare($sql);
            $q->execute(array($ic_pengguna,$nama,$email,$no_telefon));
			
			$pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO akaun_pengguna (ic_pengguna,kod_pengguna,pwd,status_aktif) values('$ic_pengguna','3','$ic_pengguna','yes')";
            $q = $pdo->prepare($sql);
            $q->execute(array($ic_pengguna,$kod_pengguna,$pwd,$status_aktif));
			
			
			Database::disconnect();
			header("location: ../senarai_sa.php?jabatan=$jabatan");	
        }
    }
?>
