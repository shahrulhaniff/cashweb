<?php
    require '../../server.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        
        $id_kodtransaksi = $_GET['id'];
        $status = $_GET['status'];
  
        $description = $_GET['desc'];
        $tarikhbuka = $_GET['tarikhbuka'];
        $tarikhtutup = $_GET['tarikhtutup'];
		$harga = $_GET['harga'];
        $id_jenistransaksi = $_GET['id_jenistransaksi'];
        $delete_by = $_GET['delete_by'];
		
		
		// delete data
		$sql="DELETE FROM kod_transaksi WHERE id_kodtransaksi = '$id_kodtransaksi'";
		$result=mysql_query($sql);
			
			
			if($result){
				// tracking aktiviti sub admin
				$sql3="SELECT jabatan FROM kod_jenistransaksi WHERE id_jenistransaksi='$id_jenistransaksi'";
			$result3=mysql_query($sql3);
			$jabatan=mysql_fetch_object($result3)->jabatan; 
			
			$sqlTracking="INSERT INTO tracking (id_jenistransaksi,jabatan,description,tarikhbuka,tarikhtutup,harga,tindakan,edit_by) 
					values('$id_jenistransaksi','$jabatan','$description','$tarikhbuka','$tarikhtutup','$harga','Padam','$delete_by')";
			$resultTracking=mysql_query($sqlTracking);
			
				if($status=='1'){
					echo"<script>alert('Padam berjaya.');document.location.href='../index_sa.php?status=1&flg=tb_1';</script>";
					exit();
				}else if($status=='0'){
					echo"<script>alert('Padam berjaya.');document.location.href='../index_sa.php?status=0&flg=tb_2';</script>";
					exit();
				}else{
					echo"<script>alert('Padam berjaya.');document.location.href='../index_sa.php?status=&flg=';</script>";
					exit();
				}
				
			
			}else {
				if($status=='1'){
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php?status=1&flg=tb_1';
					</script>");
				}else if($status=='0'){
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php?status=0&flg=tb_2';
					</script>");
				}else{
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php?status=&flg=';
					</script>");
				}
				
				 
			}
    }else {
				if($status=='1'){
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php?status=1&flg=tb_1';
					</script>");
				}else if($status=='0'){
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php?status=0&flg=tb_2';
					</script>");
				}else{
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Padam data tidak berjaya.');
					window.location.href='../index_sa.php?status=&flg=';
					</script>");
				}
			}
?>