
 <?php

// include "../model/pemohon_asrama_functions.php";

	
	// $nokp_pemohon = $_GET['nokp'];
	// $nama_penjaga= clean($_POST['nama_penjaga']);
	// $nokp_penjaga = clean($_POST['nokp_penjaga']);

	
  
  

	
		// echo $result = updatePemohonPenjaga($nokp_pemohon,$nama_penjaga,$nokp_penjaga,$jantina,$bangsa,$alamat,
					// $notel,$emel,$hubungan,$pekerjaan,$pendapatan,$nama_majikan,$alamat_majikan,$notel_majikan);
        // if($result){
			// header("location: ../view/permohonan_asrama_selesai.php");
			// exit();
			
		// }else {
			// die("Query failed");
		// }

	
// ?>

<?php
    require '../app/server.php';
 
    $id_jenistransaksi = null;
    if ( !empty($_GET['id_jenistransaksi'])) {
        $id_jenistransaksi = $_REQUEST['id_jenistransaksi'];
    }
     
    if ( null==$id_jenistransaksi ) {
        header("Location: ../index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $jenistransaksiError = null;
        $jabatanError = null;
       
         
        // keep track post values
        $jenistransaksi = $_POST['jenistransaksi'];
        $jabatan = $_POST['jabatan'];
       
         
        // validate input
        $valid = true;
        if (empty($jenistransaksi)) {
            $jenistransaksiError = 'Please enter jenis transaksi';
            $valid = false;
        }
         
        // if (empty($description)) {
            // $descriptionError = 'Please enter description Address';
            // $valid = false;
        // } else if ( !filter_var($description,FILTER_VALIDATE_description) ) {
            // $descriptionError = 'Please enter a valid description Address';
            // $valid = false;
        // }
         
        if (empty($jabatan)) {
            $jabatanError = 'Please enter jabatan';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE kod_jenistransaksi  set jenistransaksi = '$jenistransaksi', jabatan = '$jabatan' WHERE id_jenistransaksi = '$id_jenistransaksi'";
            $q = $pdo->prepare($sql);
            $q->execute(array($jenistransaksi,$jabatan,$id_jenistransaksi));
            Database::disconnect();
            header("Location: ../index.php");
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