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

//----------------------------------------------------------------------------------
// get Jabatan from id_kodtransaksi.
//----------------------------------------------------------------------------------
function getJabatanByIDK($id_kodtransaksi){
	$s="SELECT jabatan from kod_jenispengguna K, kod_transaksi A
		WHERE A.id_kodtransaksi='$id_kodtransaksi'
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

//----------------------------------------------------------------------------------
// get nama from idPekerja.
//----------------------------------------------------------------------------------
function getNama($idPekerja){
	$s="SELECT nama from maklumat_pengguna 
		WHERE ic_pengguna='$idPekerja'
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
//----------------------------------------------------------------------------------
// get EMEL from idPekerja.
//----------------------------------------------------------------------------------
function getEmel($idPekerja){
	$s="SELECT email from maklumat_pengguna 
		WHERE ic_pengguna='$idPekerja'
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

//----------------------------------------------------------------------------------
// get notelefon from idPekerja.
//----------------------------------------------------------------------------------
function getPhone($idPekerja){
	$s="SELECT no_telefon from maklumat_pengguna 
		WHERE ic_pengguna='$idPekerja'
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