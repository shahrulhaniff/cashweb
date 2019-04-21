
		<?	   if ($action=="info_pelajar") {
			$ic_pengguna = clean($_POST['ic_pengguna']);

		
			
			 $sql = "SELECT sv.ic_pengguna AS ic_site_visit, mp.* 
FROM site_visit sv, maklumat_pengguna mp
WHERE sv.ic_pengguna = mp.ic_pengguna AND sv.ic_pengguna =  '$ic_pengguna'
					";
$result=mysql_query($sql);
			// $result = $conn->query($sql);
			$rows = array();
			while($r = $result->fetch_assoc()) {
				$rows[] = $r;
			}

			echo json_encode($rows);

	}
	?>		  