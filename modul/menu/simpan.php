<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

     $id_menu=$_POST['id_menu'];
    $nama_menu=$_POST['nama_menu'];
	$harga=$_POST['harga'];
	$modal=$_POST['modal'];
	$id_kategori=$_POST['id_kategori'];
	/*
	$a=mysql_query("select no_meja from meja");
	$ra=mysql_fetch_array($a);
	
	if($no_meja==$ra[no_meja])
	{
		echo "<script>alert('Data Telah Ada..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=meja&act=add';</script>";
	}
	else
	{
		*/
   

    $b=mysql_query("INSERT INTO menu VALUES('$id_menu','$nama_menu','$modal','$harga')") or die(mysql_error());
	$c=mysql_query("INSERT INTO menukategori VALUES('$id_menu','$id_kategori')") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Menu Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=menu';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Menu";
    }
	/* } */
?>