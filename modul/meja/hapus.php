<?php

include "../../config/koneksi.php";

$id=$_GET['id'];

$query=mysql_query("DELETE FROM bahan WHERE id_bahan='$id'") or die(mysql_error());

if($query)
{
	echo "<script>alert('Data Bahan Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=bahan';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Bahan";
}
?>