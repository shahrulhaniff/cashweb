
<?php
    require '../../server.php';
 
    // keep track post values
        $id_transaksi = $_GET['id'];
        $doc_acceptby_nama = $_POST['doc_acceptby_nama'];
        $doc_acceptby = $_POST['doc_acceptby'];
        $status_dokumen = $_POST['status_dokumen'];
       
         
        //checking ic yang dah didaftar dlm sistem
		// $sql1 = "SELECT IFNULL(ic_pengguna,0) AS nokp FROM maklumat_pengguna WHERE ic_pengguna='$kepada'";
		// $result1=mysql_query($sql1);
		// $checkNokp=mysql_fetch_object($result1)->nokp; 
			
			
		// if($checkNokp>0){
		
			
			$sql="UPDATE transaksi  set daripada = '$daripada', doc_acceptby = '$doc_acceptby', doc_acceptby_nama = '$doc_acceptby_nama', status_dokumen = '$status_dokumen' 
					WHERE id_transaksi = '$id_transaksi'";
			$result=mysql_query($sql); //or die(mysql_error());
			
			
			if($result){
				echo"<script>alert('Kemaskini berjaya!');document.location.href='../sa_pengurusan_dokumen.php';</script>";
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Kemaskini tidak berjaya.');
					window.location.href='../sa_pengurusan_dokumen.php';
					</script>");
			}
		// }else{
		 // echo ("<script LANGUAGE='JavaScript'>
				// window.alert('Nombor kad pengenalan tiada dalam sistem');
				// window.location.href='../pengurusan_dokumen.php';
				// </script>");
		// }	
        
?>