<?php
    require '../../server.php';
    $ic_pengguna = 0;
     
    if ( !empty($_GET['ic_pengguna'])) {
       
        $ic_pengguna = $_GET['ic_pengguna'];
		
		
		// delete data
		$sql="DELETE FROM akaun_pengguna  WHERE ic_pengguna = '$ic_pengguna'";
			$result=mysql_query($sql);
		if($result){
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
    }else {
			 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Padam data tidak berjaya.');
				window.location.href='../senarai_sa.php';
				</script>");
			}
			
			
		// // delete data
		 // $pdo = Database::connect();
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = "DELETE FROM akaun_pengguna  WHERE ic_pengguna = '$ic_pengguna'";
        // $q = $pdo->prepare($sql);
        // $q->execute(array($ic_pengguna));
		
		// // delete data
		 // $pdo = Database::connect();
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = "DELETE FROM maklumat_pengguna  WHERE ic_pengguna = '$ic_pengguna'";
        // $q = $pdo->prepare($sql);
        // $q->execute(array($ic_pengguna));
		
        // Database::disconnect();
        // header("Location: ../senarai_sa.php");
    }else {
			 echo ("<script LANGUAGE='JavaScript'>
				window.alert('Padam data tidak berjaya.');
				window.location.href='../senarai_sa.php';
				</script>");
			}
     
   
?>