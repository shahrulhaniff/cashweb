
<?php
    require '../../server.php';
 
    
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
        $tarikh_edit = $_POST['tarikh_edit'];
         
        
		
		
			
			$sql="UPDATE kod_transaksi  set id_kodtransaksi = '$id_kodtransaksi', kod_pengguna = '$kod_pengguna', no_sb = '$no_sb', 
					description = '$description',tarikhbuka = '$tarikhbuka', tarikhtutup = '$tarikhtutup', jam = '$jam', harga = '$harga',
					id_jenistransaksi = '$id_jenistransaksi', kelas = '$kelas', edit_by = '$edit_by', tarikh_edit = '$tarikh_edit' 
					WHERE id_kodtransaksi = '$id_kodtransaksi'";
			$result=mysql_query($sql)or die(mysql_error());
			
			
			if($result){
				echo"<script>alert('Kemaskini berjaya!');document.location.href='../sebut_harga.php';</script>";
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('KEmaskini sebut harga tidak berjaya.');
					window.location.href='../sebut_harga.php';
					</script>");
			}
			echo"<script>alert('Kemaskini berjaya!');document.location.href='../sebut_harga.php';</script>";
            //header("Location: index.php");
        

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