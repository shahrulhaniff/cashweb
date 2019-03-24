
<?php
    require '../../server.php';
 
    $ic_lama_pengguna = null;
    if ( !empty($_GET['ic_lama_pengguna'])) {
        $ic_lama_pengguna = $_REQUEST['ic_lama_pengguna'];
    }
     
    if ( null==$ic_lama_pengguna ) {
        header("Location: ../index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
       $id_jenistransaksiError = null;
        $namaError = null;
        $ic_penggunaError = null;
        $emailError = null;
        $no_telefonError = null;
       
         
        // keep track post values
       $ic_lama_pengguna = $_POST['ic_lama_pengguna'];
        $nama = $_POST['nama'];
        $ic_pengguna = $_POST['ic_pengguna'];
        $email = $_POST['email'];
        $no_telefon = $_POST['no_telefon'];
       
         
        // validate input
        $valid = true;
        if (empty($nama)) {
            $namaError = 'Masukkan nama';
            $valid = false;
        }
         
		 if (empty($ic_pengguna)) {
            $ic_penggunaError = 'Masukkan kad pengenalan';
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
            $no_telefonError = 'Masukkan kad pengenalan';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE maklumat_pengguna  set nama = '$nama', ic_pengguna = '$ic_pengguna', email = '$email', no_telefon = '$no_telefon' WHERE ic_pengguna = '$ic_lama_pengguna'";
            $q = $pdo->prepare($sql);
            $q->execute(array($nama,$ic_pengguna,$email,$no_telefon));
			
			
			//jika ic pengguna juga boleh diedit
			 $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE akaun_pengguna  set ic_pengguna = '$ic_pengguna' WHERE ic_pengguna = '$ic_lama_pengguna'";
            $q = $pdo->prepare($sql);
            $q->execute(array($ic_pengguna));
			
            Database::disconnect();
			echo"<script>alert('Update Success!');document.location.href='../index.php';</script>";
            //header("Location: index.php");
        }
	}
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