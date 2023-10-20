<?php

include "../../config/koneksi.php";

$tgl=$_GET['tgl'];
$id=$_GET['id'];

$query=mysql_query("DELETE FROM belibahan WHERE id_bahan='$id' AND tgl_transaksi='$tgl'") or die(mysql_error());

if($query)
{
	echo "<script>alert('Data Pembelian Bahan Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=belibahan';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Bahan";
}
?>