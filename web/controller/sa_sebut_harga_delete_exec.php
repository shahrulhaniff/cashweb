<?php
    require '../../server.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        
        $id_kodtransaksi = $_GET['id'];
  
        $description = $_GET['desc'];
        $tarikhbuka = $_GET['tarikhbuka'];
        $tarikhtutup = $_GET['tarikhtutup'];
		$harga = $_GET['harga'];
        $id_jenistransaksi = $_GET['id_jenistransaksi'];
        $delete_by = $_GET['delete_by'];
		
		
		// delete data
		$sql="DELETE FROM kod_transaksi WHERE id_kodtransaksi = '$id_kodtransaksi'";
			$result=mysql_query($sql);
			
			
			if($result){
				// tracking aktiviti sub admin
				$sql3="SELECT jabatan FROM kod_jenistransaksi WHERE id_jenistransaksi='$id_jenistransaksi'";
			$result3=mysql_query($sql3);
			$jabatan=mysql_fetch_object($result3)->jabatan; 
			
			$sqlTracking="INSERT INTO tracking (id_jenistransaksi,jabatan,description,tarikhbuka,tarikhtutup,harga,tindakan,edit_by) 
					values('$id_jenistransaksi','$jabatan','$description','$tarikhbuka','$tarikhtutup','$harga','Padam','$delete_by')";
			$resultTracking=mysql_query($sqlTracking);
			
				header("location: ../index_sa.php");	
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php';
					</script>");
			}
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $ic_pengguna = $_POST['ic_pengguna'];
         
       // // delete data
		 // $pdo = Database::connect();
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo $sql = "DELETE FROM kod_jenistransaksi  WHERE id_jenistransaksi = '$id_jenistransaksi'";
        // $q = $pdo->prepare($sql);
        // $q->execute(array($id_jenistransaksi));
        // Database::disconnect();
        // header("Location: ../index.php");
         
    }
?>