<?php
//PAKE mysql biasa, bagi yg ga support (PHP 5.5) bisa pake mysqli
include "config/koneksi.php";
//kita ngambil jumlah penjualan pertahun dan di grup kan tahun nya, karena banyak nilai tahun pada data
//$bulan=$_POST['bulan'];
$sql="select count(idpasien) as pasien, month(tanggalmasuk) as bulan FROM cek_in GROUP BY month(tanggalmasuk),year(tanggalmasuk)";
//jalankan query
$rs=mysql_query($sql);
//bikin variabel sebagai array untuk menampung data nantinya
$data=array();
//loooooooooop sebagai object, bisa pake fetch_array $row['field']
while ($row = mysql_fetch_object($rs)) {

	if($row->bulan=='1'){
		$bulans="Januari";
	}elseif($row->bulan=='2'){
		$bulans="Februari";
	}elseif($row->bulan=='3'){
		$bulans="Maret";
	}elseif($row->bulan=='4'){
		$bulans="April";
	}elseif($row->bulan=='5'){
		$bulans="Mei";
	}elseif($row->bulan=='6'){
		$bulans="Juni";
	}elseif($row->bulan=='7'){
		$bulans="Juli";
	}elseif($row->bulan=='8'){
		$bulans="Agustus";
	}elseif($row->bulan=='9'){
		$bulans="September";
	}elseif($row->bulan=='10'){
		$bulans="Oktober";
	}elseif($row->bulan=='11'){
		$bulans="November";
	}elseif($row->bulan=='12'){
		$bulans="Desember";
	}

	$data[]=array(
		'y'=>$bulans, //y sebagai kata kunci nya (tahun)		
		'jumlah'=>$row->pasien, //jumlah penjualan
		);	
}
	//outputkan sebagai json
	echo json_encode($data);
?>