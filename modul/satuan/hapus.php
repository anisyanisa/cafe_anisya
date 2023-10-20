<?php

include "../../config/koneksi.php";

$id=$_GET['id'];

$query=mysqli_query($conn,"DELETE FROM satuan WHERE id_satuan='$id'") or die(mysqli_error($conn));

if($query)
{
	echo "<script>alert('Data Satuan Berhasil dihapus..!!')</script>";
    echo "<script>window.location.href='../../main.php?modul=satuan';</script>";
	
}
else
{
	echo "Gagal Menghapus Data Satuan";
}
?>