<?php
     
    require '../../server.php';
    $jabatan = $_GET['jabatan'];
	
	require '../PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;

	$mail->isSMTP();                            // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                     // Enable SMTP authentication
	$mail->Username = 'mrtester372@gmail.com';          // SMTP username
	$mail->Password = 'abcd@1234'; // SMTP password
	$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; 
	
	
    if ( !empty($_POST)) {
        // keep track validation errors
        $id_jenistransaksiError = null;
        $namaError = null;
        $ic_penggunaError = null;
        $emailError = null;
        $no_telefonError = null;
         
        // keep track post values
        $id_jenistransaksi = $_POST['id_jenistransaksi'];
        $nama = $_POST['nama'];
        $ic_pengguna = $_POST['ic_pengguna'];
        $ic_pengguna2 = md5($_POST['ic_pengguna']);
        $email = $_POST['email'];
        $no_telefon = $_POST['no_telefon'];
         
        // validate input
        $valid = true;
        if (empty($id_jenistransaksi)) {
            $id_jenistransaksiError = 'Masukkanr id jenis transaksi';
            $valid = false;
        }
         
       
        if (empty($nama)) {
            $namaError = 'Masukkan nama';
            $valid = false;
        } 
        
        if (empty($ic_pengguna)) {
            $ic_penggunaError = 'Masukkan nombor kad pengenalan';
            $valid = false;
        } 
		
		 if (empty($email)) {
            $emailError = 'Masukkan alamat emel';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Masukkan alamat emel yang betul';
            $valid = false;
        }
         
        if (empty($no_telefon)) {
            $no_telefonError = 'Masukkan nombor telefon';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            
			// $sql1 = "INSERT INTO maklumat_pengguna (ic_pengguna,nama,email,no_telefon) values('$ic_pengguna','$nama','$email','$no_telefon')";
			// $q1 = $pdo->prepare($sql1);
            // $q1->execute(array($ic_pengguna,$nama,$email,$no_telefon));
			// Database::disconnect();
			
			// $pdo = Database::connect();
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $sql = "INSERT INTO maklumat_pengguna (ic_pengguna,nama,email,no_telefon) values('$ic_pengguna','$nama','$email','$no_telefon')";
            // $q = $pdo->prepare($sql);
            // $q->execute(array($ic_pengguna,$nama,$email,$no_telefon));
			
			// $pdo = Database::connect();
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "INSERT INTO akaun_pengguna (ic_pengguna,kod_pengguna,pwd,status_aktif) values('$ic_pengguna','3','$ic_pengguna','yes')";
            // $q = $pdo->prepare($sql);
            // $q->execute(array($ic_pengguna,$kod_pengguna,$pwd,$status_aktif));
			
			//checking exist user
			$sql = "SELECT COUNT(ic_pengguna) AS countNokp FROM akaun_pengguna WHERE ic_pengguna='$ic_pengguna'";
			$result=mysql_query($sql);
			$countNokp=mysql_fetch_object($result) ->countNokp;						 
						 
			if($countNokp=='0'){
			
				$sql1="SELECT MAX(KJ.jabatan) AS jabatan 
							FROM kod_jenistransaksi KT 
							LEFT JOIN kod_jenispengguna KJ ON KT.jabatan = KJ.jabatan 
							WHERE KJ.jabatan='$jabatan' AND KJ.jenis_pengguna='sub-admin'";
				$result1=mysql_query($sql1);
				$jabatan2=mysql_fetch_object($result1)->jabatan; 
				
				$sql2="SELECT kod_pengguna FROM kod_jenispengguna
							WHERE jabatan='$jabatan2' AND jenis_pengguna='sub-admin'";
				$result2=mysql_query($sql2);
				$kod_pengguna=mysql_fetch_object($result2)->kod_pengguna; 
				
				
				
				$sql3="INSERT INTO maklumat_pengguna (ic_pengguna,nama,email,no_telefon) values('$ic_pengguna','$nama','$email','$no_telefon')";
				$result3=mysql_query($sql3) or die(mysql_error());
				
?>				
<script>
window.onunload = refreshParent;
function refreshParent() {
	self.opener.location.reload();
}
</script>
<? 
			
				$sql4 = "INSERT INTO akaun_pengguna (ic_pengguna,kod_pengguna,pwd,status_aktif) values('$ic_pengguna','$kod_pengguna','$ic_pengguna2','yes')";
				$result4=mysql_query($sql4) or die (mysql_error());

				//send email
				$mail->setFrom('Username', 'Cashless Web');
				$mail->addAddress($email);   // Add a recipient

				$mail->isHTML(true);  // Set email format to HTML

				$bodyContent = '<h1>You now can access Cashless Apps</h1>';
				$bodyContent .= '<p>This is your access data:</p>
								<p>Username : '.$ic_pengguna.'</p>
								<p>Password :'.$ic_pengguna.'</p>
								<p></p>
								<p>Your can change password after access Cashless Mobile Apps</p>';

				$mail->Subject = '';
				$mail->Body    = $bodyContent;

				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} 
				else {
					//echo 'Message has been sent';
					echo"<script>alert('Registration Success!!!');document.location.href='../senarai_sa.php?jabatan=$jabatan';</script>";
				}

		}else{
			 echo ("<script LANGUAGE='JavaScript'>
					window.alert('tambah sub admin tidak berjaya. Nombor kad pengenalan sudah wujud di dalam sistem.');
					window.location.href='../index.php';
					</script>");
		}
			// Database::disconnect();
			// header("location: ../senarai_sa.php?jabatan=$jabatan");	
			//header("location: ../index.php");	
        }
    }
?>
