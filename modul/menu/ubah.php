<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $id_menu=$_POST['id_menu'];
    $nama_menu=$_POST['nama_menu'];
	$modal=$_POST['modal'];
	$harga=$_POST['harga'];
	$id_kategori=$_POST['id_kategori'];
 
    $b=mysql_query("UPDATE menu SET nama_menu='$nama_menu',modal='$modal',harga='$harga' WHERE id_menu='$id_menu'") or die(mysql_error());
	$c=mysql_query("UPDATE menukategori SET id_kategori='$id_kategori' WHERE id_menu='$id_menu'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Menu Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='menu.php';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Menu.";
    }
?>