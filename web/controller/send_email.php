<?php
	
	require '../../server.php';
    require '../../credential.php';

	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
	
	//Sanitize the POST values
	$icNo = $_POST['icNo'];
	$emel = $_POST['emel'];
	
	require '../PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
				
	$mail->isSMTP();                            // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                     // Enable SMTP authentication
	$mail->Username = EMAIL;          // SMTP username
	$mail->Password = PASS; // SMTP password
	$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587; 

	$qryAdmin="SELECT * FROM maklumat_pengguna WHERE ic_pengguna='$icNo' AND email='$emel'";
	$resultAdmin=mysql_query($qryAdmin);
	if($resultAdmin==true){
			function password_generate($chars){
				  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
				  return substr(str_shuffle($data), 0, $chars);
				}
				$my_passwords =password_generate(8);
				$my_passwords2 =md5($my_passwords);
				
				
				$mail->setFrom(EMAIL);
				$mail->addAddress($emel);   // Add a recipient

				$mail->isHTML(true);  // Set email format to HTML

				$bodyContent = '<p>Emel Pengguna : <b>'.$emel.'</b></p>
								<p>Kata Laluan : <b>'.$my_passwords.'</b></p>';

				$mail->Subject = 'Lupa Kata Laluan?';
				$mail->Body    = $bodyContent;
				
				if(!$mail->send()) {
<<<<<<< HEAD
					echo"<script>alert('Mesej Tidak Dihantar!!');document.location.href='../forgot_password.php';</script>";
					echo 'Mailer Error: ' . $mail->ErrorInfo;
=======
					echo"<script>alert('Message not sent!!');document.location.href='../forgot_password.php';</script>";
					//echo 'Mailer Error: ' . $mail->ErrorInfo;
>>>>>>> c18b640c6b0a21187d7effb0ffaf580ce8babdfc
				} 
				else {
					$SQLstring="UPDATE akaun_pengguna SET pwd='$my_passwords2' WHERE ic_pengguna='$icNo' and kod_pengguna!='1'";
					$QueryResult=mysql_query($SQLstring);
					echo"<script>alert('Mesej Telah Dihantar!!');document.location.href='../login.php';</script>";
					
				}
		
	}
	else {
		echo"<script>alert('Invalid Data!!');document.location.href='../form_forgot_password.php';</script>";
		die("Query failed");
	}
?>