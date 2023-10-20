<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

     $no_meja=$_POST['no_meja'];
    $kapasitas=$_POST['kapasitas'];
	$keterangan=$_POST['keterangan'];
	$status=$_POST['status'];
	
	$a=mysql_query("select no_meja from meja");
	$ra=mysql_fetch_array($a);
	
	if($no_meja==$ra[no_meja])
	{
		echo "<script>alert('Data Telah Ada..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=meja&act=add';</script>";
	}
	else
	{
   

    $b=mysql_query("INSERT INTO meja VALUES('$no_meja','$kapasitas','$keterangan','$status')") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Meja Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=meja';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Meja";
    }
	}
?>