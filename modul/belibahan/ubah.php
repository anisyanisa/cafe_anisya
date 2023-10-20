<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $tgl_transaksi=$_POST['tgl_transaksi'];
    $id_bahan=$_POST['id_bahan'];
	$qty=$_POST['qty'];
	$id_satuan=$_POST['id_satuan'];
    $harga_beli=$_POST['harga_beli'];
    /*$nama_kasir=$_POST['nama_kasir'];
    $jekel=$_POST['jekel'];
    $tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=ubahFormatB($_POST['tanggal_lahir']);
    $alamat_kasir=$_POST['alamat_kasir'];
    $nohp_kasir=$_POST['nohp_kasir'];
    $tgl_bergabung=ubahFormatB($_POST['tgl_bergabung']);*/

    $b=mysql_query("UPDATE belibahan SET qty='$qty',id_satuan='$id_satuan',harga_beli='$harga_beli' WHERE tgl_transaksi='$tgl_transaksi' AND id_bahan='$id_bahan'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Pembelian Bahan Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=belibahan';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Bahan.";
    }
?>