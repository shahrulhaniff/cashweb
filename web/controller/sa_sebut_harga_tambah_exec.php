<?php
     
    require '../../server.php';
   // $jabatan = $_GET['jabatan'];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = new DateTime();
	$current_date=$date->format('Y-m-d h:i:s');
        
        // keep track post values
        $kod_pengguna = $_POST['kod_pengguna'];
        $no_sb = $_POST['no_sb'];
        $description = $_POST['description'];
        $tarikhbuka = $_POST['tarikhbuka'];
        $tarikhtutup = $_POST['tarikhtutup'];
        $jam = $_POST['jam']; 
		$harga = $_POST['harga'];
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $kelas = $_POST['kelas'];
        $keyin_by = $_POST['keyin_by'];
       // $tarikh_keyin = $_POST['tarikh_keyin'];
         
       
        // insert data
   
		$sql1="SELECT MAX(id_kodtransaksi) AS id_kodtransaksi FROM kod_transaksi";
			$result1=mysql_query($sql1);
			$id_kodtransaksi=mysql_fetch_object($result1)->id_kodtransaksi; 
			$id_kodtransaksi1=$id_kodtransaksi+1;
			$sql="INSERT INTO kod_transaksi (id_kodtransaksi,kod_pengguna,no_sb,description,tarikhbuka,tarikhtutup,jam,harga,id_jenistransaksi,kelas,keyin_by,tarikh_keyin) 
					values('$id_kodtransaksi1','$kod_pengguna','$no_sb','$description','$tarikhbuka','$tarikhtutup','$jam','$harga','$id_jenistransaksi','$kelas','$keyin_by','$current_date')";
			$result=mysql_query($sql);// or die(mysql_error())
			
			
			if($result){
				// tracking aktiviti sub admin
				$sql3="SELECT jabatan FROM kod_jenistransaksi WHERE id_jenistransaksi='$id_jenistransaksi'";
			$result3=mysql_query($sql3);
			$jabatan=mysql_fetch_object($result3)->jabatan; 
			
			$sqlTracking="INSERT INTO tracking (id_jenistransaksi,jabatan,description,tarikhbuka,tarikhtutup,harga,tindakan,edit_by) 
					values('$id_jenistransaksi','$jabatan','$description','$tarikhbuka','$tarikhtutup','$harga','Tambah','$keyin_by')";
			$resultTracking=mysql_query($sqlTracking);
				
		
				header("location: ../index_sa.php");	
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Tambah sebut harga tidak berjaya.');
					window.location.href='../index_sa.php';
					</script>");
			}
			
			
       
?>
