
<?php
    require '../../server.php';
 
     
        // keep track post values
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $jenistransaksi = $_POST['jenistransaksi'];
        $jabatan = $_POST['jabatan'];
        $current_jabatan = $_POST['current_jabatan'];
      
        // update data
		$sql="UPDATE kod_jenistransaksi SET jenistransaksi = '$jenistransaksi', jabatan = '$jabatan' 
				WHERE id_jenistransaksi = '$id_jenistransaksi'";
			$result=mysql_query($sql);
		if($result){
			
					$sql2="UPDATE kod_jenispengguna SET jabatan = '$jabatan' WHERE jabatan='$current_jabatan'";
					$result2=mysql_query($sql2);
					if($result2){
					
						echo"<script>alert('Kemaskini berjaya!');document.location.href='../senarai_ptj.php';</script>";
						exit();
					
					}else {
						 echo ("<script LANGUAGE='JavaScript'>
							window.alert('Kemaskini tidak berjaya.');
							window.location.href='../senarai_ptj.php';
							</script>");
					}
						
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Kemaskini tidak berjaya.');
					window.location.href='../senarai_ptj.php';
					</script>");
			}
		
      
?>