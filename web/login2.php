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
					
					
					//Go to home page
					if ($position == '1') {
						header("location: logout.php");//echo $position;
					}
					
					else if ($position != '1'){
						header("location: index.php");
					}
					
					else{ echo mysql_error(); }
					
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