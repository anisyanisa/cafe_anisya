<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $no_transaksi=$_POST['no_transaksi'];
    $diskon=$_POST['diskon'];
	$no=$_GET['no'];
   
    $b=mysql_query("insert into bayar values('$no_transaksi','','$diskon','')") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Diskon Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=viewmeja&act=pesan&no=$_GET[no]';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Diskon";
    }
?>