<?php
    require '../../server.php';

        $namaptj = $_POST['namaptj'];
        $singkatan = $_POST['singkatan'];

			$sql5= "SELECT * FROM kod_jabatan WHERE namaptj='".$namaptj."'";

			$result5=mysql_query($sql5) or die(mysql_error());
			$row5 = mysql_fetch_assoc($result5);
			//$mysemak = $row5['mysemak'];

			if ($row5!=0){ echo ("<script LANGUAGE='JavaScript'>window.alert('Pusat Tanggungjawab ini telah wujud.');window.location.href='../P002.php';</script>"); }

			else {
					$sql1="INSERT INTO kod_jabatan (idptj,singkatan,namaptj) values('$singkatan','$singkatan','$namaptj')";
					$result=mysql_query($sql1) or die(mysql_error());
					
					if($result){
					echo ("<script LANGUAGE='JavaScript'>window.alert('Tambah Jabatan berjaya.');window.location.href='../P002.php';</script>");
					}
					else { echo "ada masalah"; }
			}
    
?>
