<?php

include "../../config/koneksi.php";

$id=$_GET['id'];

$query=mysql_query("DELETE FROM user WHERE iduser='$id'") or die(mysql_error());

if($query)
{
	echo "<script>alert('Data User Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=user';</script>";
	
}
else
{
	echo "Gagal Menghapus Data User";
}
?>