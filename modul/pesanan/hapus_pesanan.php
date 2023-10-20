<?php

include "../../config/koneksi.php";

$id=$_GET['id'];
$id_menu=$_GET['id_menu'];

$query=mysql_query("DELETE FROM pesanan_temp WHERE no_meja='$id' AND id_menu='$id_menu'") or die(mysql_error());


if($query)
{
	echo "<script>alert('Data Pesanan Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='javascript:history.back(-1)';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Menu";
}
?>