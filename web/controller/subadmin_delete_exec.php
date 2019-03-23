<?php
    require '../../server.php';
    $ic_pengguna = 0;
     
    if ( !empty($_GET['ic_pengguna'])) {
        // $ic_pengguna = $_REQUEST['ic_pengguna'];
        $ic_pengguna = $_GET['ic_pengguna'];
		
		// delete data
		 $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo $sql = "DELETE FROM akaun_pengguna  WHERE ic_pengguna = '$ic_pengguna'";
        $q = $pdo->prepare($sql);
        $q->execute(array($ic_pengguna));
		
		// delete data
		 $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo $sql = "DELETE FROM maklumat_pengguna  WHERE ic_pengguna = '$ic_pengguna'";
        $q = $pdo->prepare($sql);
        $q->execute(array($ic_pengguna));
		
        Database::disconnect();
        header("Location: ../senarai_sa.php");
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