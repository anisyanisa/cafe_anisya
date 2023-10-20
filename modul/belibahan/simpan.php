<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $tgl_transaksi=$_POST['tgl_transaksi'];
    $id_bahan=$_POST['id_bahan'];
		$qty=$_POST['qty'];
		$id_satuan=$_POST['id_satuan'];
    $harga_beli=$_POST['harga_beli'];
	
	$periksa=mysql_query("select tgl_transaksi,id_bahan from belibahan");
	$rperiksa=mysql_fetch_array($periksa);
	
   if($rperiksa['tgl_transaksi']==$tgl_transaksi AND $rperiksa['id_bahan']==$id_bahan)
   {
	   
		   echo "<script>alert('Data Pembelian Telah Ada..!!')</script>";
		   echo "<script>window.location.href='../../main.php?modul=belibahan&act=add';</script>";
	   
   }
   else
   {

    $b=mysql_query("INSERT INTO belibahan VALUES('$tgl_transaksi','$id_bahan','$qty','$id_satuan','$harga_beli')") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Pembelian Bahan Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=belibahan';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Bahan";
    }
   }
?>