<?php
    require '../../server.php';
    $ic_pengguna = 0;
     
    if ( !empty($_GET['ic_pengguna'])) {
       
        $ic_pengguna = $_GET['ic_pengguna'];
        $KodJabatan = $_GET['KodJabatan'];
		
		
		// delete data
		$sql="DELETE FROM akaun_pengguna  WHERE ic_pengguna = '$ic_pengguna' AND kod_pengguna = '$KodJabatan'";
			$result=mysql_query($sql);
			
			
		if($result){
			
			//cek dulu
			$sql5= "
			SELECT * FROM akaun_pengguna 
			WHERE ic_pengguna='".$ic_pengguna."'
			";
			
			$result5=mysql_query($sql5);// or die(mysql_error())
			$row5 = mysql_fetch_assoc($result5);
			
			if ($row5!=1){
			
			$sql1="DELETE FROM maklumat_pengguna  WHERE ic_pengguna = '$ic_pengguna'";
			$result1=mysql_query($sql1);
			if($result1){
				echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data berjaya.');
					window.location.href='../senarai_sa.php';
					</script>");
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../senarai_sa.php';
					</script>");
			}
			
		}//done cek dulu sblm delete
		else {
			echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data berjaya.');
					window.location.href='../senarai_sa.php';
					</script>");
		}
			
    }
	
	
	else {
			 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Padam data tidak berjaya.');
				window.location.href='../senarai_sa.php';
				</script>");
			}
			
    }else {
			 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Padam data tidak berjaya.');
				window.location.href='../senarai_sa.php';
				</script>");
			}
     
   
?>