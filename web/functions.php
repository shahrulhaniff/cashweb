<?php

//----------------------------------------------------------------------------------
// get Jabatan from idPekerja.
//----------------------------------------------------------------------------------
function getJabatan($idPekerja){
	$s="SELECT jabatan from kod_jenispengguna K, akaun_pengguna A
		WHERE A.ic_pengguna='$idPekerja'
		AND K.kod_pengguna=A.kod_pengguna
		";
	$r=mysql_query($s);
	$row=mysql_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}

?>