<?php

include "../../config/koneksi.php";

$id=$_GET['id'];

$query=mysql_query("DELETE FROM waitress WHERE id_waitress='$id'") or die(mysql_error());

if($query)
{
	echo "<script>alert('Data Waitress Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=waitress';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Waitress";
}
?>