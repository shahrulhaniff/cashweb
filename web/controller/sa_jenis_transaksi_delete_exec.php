<?php
    require '../../server.php';
    $id_jenistransaksi = 0;
     
    if ( !empty($_GET['id_jenistransaksi'])) {
        // $id_jenistransaksi = $_REQUEST['id_jenistransaksi'];
        $id_jenistransaksi = $_GET['id_jenistransaksi'];
		
		// delete data
		 $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo $sql = "DELETE FROM kod_jenistransaksi  WHERE id_jenistransaksi = '$id_jenistransaksi'";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_jenistransaksi));
        Database::disconnect();
        header("Location: ../sa_sebut_harga.php");
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
         
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