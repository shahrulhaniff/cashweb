<?php
    require '../../server.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        // $ic_pengguna = $_REQUEST['ic_pengguna'];
        $id_kodtransaksi = $_GET['id'];
		
		// delete data
		$sql="DELETE FROM kod_transaksi WHERE id_kodtransaksi = '$id_kodtransaksi'";
			$result=mysql_query($sql)or die(mysql_error());
			
			
			if($result){
				header("location: ../index_sa.php");	
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data sebut harga tidak berjaya.');
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