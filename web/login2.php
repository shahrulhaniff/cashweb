<?
session_start();
include "../server.php";

$usr = $_POST['usr'];
$pwd = $_POST['pwd'];

$qry="SELECT * FROM akaun_pengguna WHERE ic_pengguna='$usr' and pwd='$pwd'"; 
$result=mysql_query($qry) or die(mysql_error());
	
if($result) {
		    if(mysql_num_rows($result) > 0) {
				
					//Login Successful
					session_regenerate_id();
					$row = mysql_fetch_assoc($result);
					//create session utk user
					$_SESSION['user'] = $row['ic_pengguna'];
					//tetapkan position utk akses sistem
					$position = $row['kod_pengguna'];
					
			$qry2="SELECT jenis_pengguna FROM kod_jenispengguna WHERE kod_pengguna='$position'";
			$result2=mysql_query($qry2) or die(mysql_error());
			$row2 = mysql_fetch_assoc($result2);
				$_SESSION['USER_TYPE'] = $row2['jenis_pengguna'];
				
					//Go to home page
					if ($_SESSION['USER_TYPE'] == 'user') {
						header("location: logout.php");//echo $position;
					}
					
					else if ($_SESSION['USER_TYPE'] == 'admin'){
						header("location: index.php");
					}
					
					else if ($_SESSION['USER_TYPE'] == 'sub-admin'){
						header("location: index_sa.php");
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