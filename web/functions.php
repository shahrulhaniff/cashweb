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
// get id Jabatan from nama jabatan.
//----------------------------------------------------------------------------------
function getKodJabatan($jabatan){
	$s="SELECT kod_pengguna from kod_jenispengguna 
		WHERE jabatan='$jabatan'
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


//----------------------------------------------------------------------------------
// array Dapatkan jenis transaksi untuk menu P003
//----------------------------------------------------------------------------------
function getJenisTransaksi($jabatan){

$qK="SELECT * FROM kod_jenistransaksi";
$resK=mysql_query($qK) or die(mysql_error());
while($fetchK=mysql_fetch_array($resK)){
	if ($jabatan==$fetchK['jabatan']){ $jenis=$fetchK['jenistransaksi']; }
}mysql_free_result($resK);

return $jenis;
}


//----------------------------------------------------------------------------------
// P003 : Dapatkan nama jabatan by kod jabatan $jaba
//----------------------------------------------------------------------------------
function getNamaPtj($jaba){
$nama="";
$qry2="SELECT * FROM kod_jabatan";
$res2=mysql_query($qry2) or die(mysql_error());
while($fetch2=mysql_fetch_array($res2)){
	if ($jaba==$fetch2['idptj']){ $nama=$fetch2['namaptj']; }
}mysql_free_result($res2);


return $nama;
}

//----------------------------------------------------------------------------------
// P003 : Dapatkan nama jabatan by kod jabatan $jaba
//----------------------------------------------------------------------------------
function getNamaJenisT($rekod){
$nama="";

if ($rekod=='SBT'){ $nama="Sebut Harga/Tender"; }
if ($rekod=='SYD'){ $nama="Seminar/Yuran/Denda"; }
if ($rekod=='D'){ $nama="Derma"; }


return $nama;
}




















?>