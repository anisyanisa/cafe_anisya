<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $id_satuan=$_POST['id_satuan'];
    $nama_satuan=$_POST['nama_satuan'];
	
    /*$nama_kasir=$_POST['nama_kasir'];
    $jekel=$_POST['jekel'];
    $tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=ubahFormatB($_POST['tanggal_lahir']);
    $alamat_kasir=$_POST['alamat_kasir'];
    $nohp_kasir=$_POST['nohp_kasir'];
    $tgl_bergabung=ubahFormatB($_POST['tgl_bergabung']);*/

    $b=mysqli_query($conn,"UPDATE satuan SET nama_satuan='$nama_satuan' WHERE id_satuan='$id_satuan'") or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Satuan Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=satuan';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Satuan.";
    }
?>