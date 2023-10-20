<?php

include "../../config/koneksi.php";

$id=$_GET['id'];

$query=mysqli_query($conn,"DELETE FROM kasir WHERE kd_kasir='$id'") or die(mysqli_error($conn));

if($query)
{
	echo "<script>alert('Data Kasir Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=kasir';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Kasir";
}
?>