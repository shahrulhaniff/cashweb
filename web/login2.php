<?
session_start();
include "../server.php";

$usr = $_POST['usr'];
$pwd = md5($_POST['pwd']);

$qry="SELECT * FROM akaun_pengguna WHERE ic_pengguna='$usr' and pwd='$pwd' AND kod_pengguna!='1'"; 
$result=mysql_query($qry) or die(mysql_error());
	
if($result) {
		    if(mysql_num_rows($result) > 0) {
				
					//Login Successful
					session_regenerate_id();
					$row = mysql_fetch_assoc($result);
					
					//session
					$_SESSION['user'] = $row['ic_pengguna'];
					
					
					//tetapkan position utk akses sistem
					$position = $row['kod_pengguna'];
					
					
			$qry2="SELECT jenis_pengguna,jabatan FROM kod_jenispengguna WHERE kod_pengguna='$position'";
			$result2=mysql_query($qry2) or die(mysql_error());
			$row2 = mysql_fetch_assoc($result2);
				$_SESSION['USER_TYPE'] = $row2['jenis_pengguna'];
				$_SESSION['JABATAN'] = $row2['jabatan'];
				
					//Go to home page
					 if ($_SESSION['USER_TYPE'] == 'user') {
						header("location: logout.php");//echo $position;
						//header("location: index_sa.php");
					 }
					
					else if ($_SESSION['USER_TYPE'] == 'admin'){
						header("location: index.php");
					}
					
					else if ($_SESSION['USER_TYPE'] == 'sub-admin'){
						header("location: sa_sebut_harga.php");
					}
					
					else{ echo"<script>alert('Access Denied!');document.location.href='login.php';</script>"; }
					
					exit();
					}
			
			else
			{
				echo"<script>alert('Access Denied!');document.location.href='login.php';</script>";
			}
	}
	
	else {
		die("Query failed");
	}
?>