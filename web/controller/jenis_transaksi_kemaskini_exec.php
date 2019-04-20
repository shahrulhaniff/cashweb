
<?php
    require '../../server.php';
 
    $id_jenistransaksi = null;
    if ( !empty($_GET['id_jenistransaksi'])) {
        $id_jenistransaksi = $_REQUEST['id_jenistransaksi'];
    }
     
    if ( null==$id_jenistransaksi ) {
        header("Location: ../senarai_ptj.php");
    }
     
 
        // keep track post values
        $jenistransaksi = $_POST['jenistransaksi'];
        $jabatan = $_POST['jabatan'];
      
        // update data
		$sql="UPDATE kod_jenistransaksi SET jenistransaksi = '$jenistransaksi', jabatan = '$jabatan' 
				WHERE id_jenistransaksi = '$id_jenistransaksi'";
			$result=mysql_query($sql);
		if($result){
				echo"<script>alert('Kemaskini berjaya!');document.location.href='../senarai_ptj.php';</script>";
				exit();
			
			}else {
				 echo ("<script LANGUAGE='JavaScript'>
					window.alert('Kemaskini tidak berjaya.');
					window.location.href='../senarai_ptj.php';
					</script>");
			}
		
      
?>