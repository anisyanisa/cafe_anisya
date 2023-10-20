<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $no_meja=$_POST['no_meja'];
    $kapasitas=$_POST['kapasitas'];
	$status=$_POST['status'];
	$keterangan=$_POST['keterangan'];
 
    $b=mysql_query("UPDATE meja SET kapasitas='$kapasitas',ket='$keterangan', status='$status' WHERE no_meja='$no_meja'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Meja Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=meja';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Bahan.";
    }
?>