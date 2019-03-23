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
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO kod_jenistransaksi (id_jenistransaksi,jenistransaksi,jabatan) values('$id_jenistransaksi','$jenistransaksi','$jabatan')";
            $q = $pdo->prepare($sql);
            $q->execute(array($id_jenistransaksi,$jenistransaksi,$jabatan));
			
			// $pdo = Database::connect();
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "INSERT INTO kod_jenispengguna (kod_pengguna,jenis_pengguna,jabatan) values('testing','admin','$jabatan')";
            // $q = $pdo->prepare($sql);
            // $q->execute(array($kod_pengguna,$jenis_pengguna,$jabatan));
            // Database::disconnect();
			header("location: ../index.php");	
        }
    }
?>
