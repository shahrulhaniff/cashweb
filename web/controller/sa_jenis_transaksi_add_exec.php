<?php
     
    require '../../server.php';
 
   
        // keep track post values
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $jenistransaksi = $_POST['jenistransaksi'];
        $jabatan = $_POST['jabatan'];
         

			
			$sql5= "SELECT COUNT(jenistransaksi) AS mysemak FROM kod_jenistransaksi WHERE id_jenistransaksi='".$id_jenistransaksi."'";
			
			$result5=mysql_query($sql5);// or die(mysql_error())
			$row5 = mysql_fetch_assoc($result5);
			$mysemak = $row5['mysemak'];
			
			if ($mysemak==0){
					
			
					$sql1="INSERT INTO kod_jenistransaksi (id_jenistransaksi,jenistransaksi,jabatan) values('$id_jenistransaksi','$jenistransaksi','$jabatan')";
					$result=mysql_query($sql1);// or die(mysql_error())
			
			
				// $sql2 = "SELECT IFNULL(jabatan,0) AS jabatan FROM kod_jenispengguna WHERE jabatan='$jabatan'";
				// $result1=mysql_query($sql2);
				// $jabatan=mysql_fetch_object($result1) ->jabatan; //checking for jabatan 
				
				
				// if($jabatan>0){
				
			$sql2= "SELECT COUNT(jabatan) AS countJabatan FROM kod_jenispengguna WHERE jabatan='".$jabatan."'";
			
			$result2=mysql_query($sql2);// or die(mysql_error())
			$row2 = mysql_fetch_assoc($result2);
			$countJabatan = $row2['countJabatan'];
			
			if ($countJabatan==0){
		  
					 $sql="SELECT MAX(kod_pengguna) AS id FROM kod_jenispengguna";
					$result1=mysql_query($sql);
					$id=mysql_fetch_object($result1)->id; 
					$id2 = ++$id;
			
			
					$sql3 = "INSERT INTO kod_jenispengguna (kod_pengguna,jenis_pengguna,jabatan) values('$id2','sub-admin','$jabatan')";
					$result=mysql_query($sql3);// or die(mysql_error())
					
					echo ("<script LANGUAGE='JavaScript'>
							window.alert('Tambah Jabatan berjaya.');
							window.location.href='../sa_sebut_harga.php';
							</script>");
				}else{
					header("Location: ../sa_sebut_harga.php");
					}
		}else{
			 echo ("<script LANGUAGE='JavaScript'>
					window.alert('ID sudah wujud. Sila gunakan ID yang lain.');
					window.location.href='../sa_sebut_harga.php';
					</script>");
		}
				
    
   
?>
