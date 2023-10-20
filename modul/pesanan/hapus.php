<?php

include "../../config/koneksi.php";

$id=$_GET['id'];
$idk=$_GET['idk'];

$query=mysql_query("DELETE FROM menu WHERE id_menu='$id'") or die(mysql_error());
$query1=mysql_query("DELETE FROM menukategori WHERE id_menu='$id' AND id_kategori='$idk'") or die(mysql_error());

if($query)
{
	echo "<script>alert('Data Menu Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=menu';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Menu";
}
?>