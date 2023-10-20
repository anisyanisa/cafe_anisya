<?php

include "../../config/koneksi.php";

$id=$_GET['id'];

$query=mysqli_query($conn,"DELETE FROM kategori WHERE id_kategori='$id'") or die(mysqli_error($conn));

if($query)
{
	echo "<script>alert('Data Kategori Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=kategori';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Kategori";
}
?>