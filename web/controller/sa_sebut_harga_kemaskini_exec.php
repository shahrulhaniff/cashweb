
<?php
    require '../../server.php';
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = new DateTime();
	$current_date=$date->format('Y-m-d h:i:s');
    
        // keep track post values
        $id_kodtransaksi = $_POST['id_kodtransaksi'];
        $kod_pengguna = $_POST['kod_pengguna'];
        $no_sb = $_POST['no_sb'];
        $description = $_POST['description'];
        $tarikhbuka = $_POST['tarikhbuka'];
        $tarikhtutup = $_POST['tarikhtutup'];
        $jam = $_POST['jam']; 
		$harga = $_POST['harga'];
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $kelas = $_POST['kelas'];
        $edit_by = $_POST['edit_by'];
        $keyin_by = $_POST['keyin_by'];
		
		
		//Orang yang add Jenis Bayaran ni sahaja boleh edit..
		if ($edit_by==$keyin_by){
			
				$sql="UPDATE kod_transaksi  set id_kodtransaksi = '$id_kodtransaksi', kod_pengguna = '$kod_pengguna', no_sb = '$no_sb', 
					description = '$description',tarikhbuka = '$tarikhbuka', tarikhtutup = '$tarikhtutup', jam = '$jam', harga = '$harga',
					id_jenistransaksi = '$id_jenistransaksi', kelas = '$kelas', edit_by = '$edit_by', tarikh_edit = '$current_date' 
					WHERE id_kodtransaksi = '$id_kodtransaksi'";
				$result=mysql_query($sql);
			
			
			if($result){
				
				// tracking aktiviti sub admin
				$sql3="SELECT jabatan FROM kod_jenistransaksi WHERE id_jenistransaksi='$id_jenistransaksi'";
			$result3=mysql_query($sql3);
			$jabatan=mysql_fetch_object($result3)->jabatan; 
			
			$sqlTracking="INSERT INTO tracking (id_jenistransaksi,jabatan,description,tarikhbuka,tarikhtutup,harga,tindakan,edit_by) 
					values('$id_jenistransaksi','$jabatan','$description','$tarikhbuka','$tarikhtutup','$harga','Kemaskini','$edit_by')";
			$resultTracking=mysql_query($sqlTracking);
			
			
				echo"<script>alert('Kemaskini berjaya.');document.location.href='../index_sa.php';</script>";
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Kemaskini sebut harga tidak berjaya.');
					window.location.href='../index_sa.php';
					</script>");
			}
			 
		}else{
			 
			  echo ("<script LANGUAGE='JavaScript'>
				window.alert('Kemaskini sebut harga tidak berjaya.');
				window.location.href='../index_sa.php';
				</script>");
		}
		

        
