<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

     $no_meja=$_POST['nomejapindah'];
    
	$status=$_POST['status'];
	$nomor=$_POST['no_meja'];
	
	
   

    $b=mysql_query("update meja set status='Tidak Tersedia' where no_meja='$no_meja'") or die(mysql_error());
	$b2=mysql_query("update meja set status='Tersedia' where no_meja='$nomor'") or die(mysql_error());
	
	$b3=mysql_query("update pesanan_temp set no_meja='$no_meja' where no_meja='$nomor'") or die(mysql_error());
	//$b=mysql_query("UPDATE meja SET kapasitas='$kapasitas',ket='$keterangan', status='$status' WHERE no_meja='$no_meja'") or die(mysql_error());

	//$b2=mysql_query("update pesanan_temp set no_meja='$no_meja' where no_meja='$_GET[no]')") or die(mysql_error());
    if($b)
    {
        echo "<script>alert('Data Meja Berhasil Diganti..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=viewmeja';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Meja";
    }
	
?>