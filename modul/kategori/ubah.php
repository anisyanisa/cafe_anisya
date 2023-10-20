<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $id_kategori=$_POST['id_kategori'];
    $nama_kategori=$_POST['nama_kategori'];
    /*$nama_kasir=$_POST['nama_kasir'];
    $jekel=$_POST['jekel'];
    $tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=ubahFormatB($_POST['tanggal_lahir']);
    $alamat_kasir=$_POST['alamat_kasir'];
    $nohp_kasir=$_POST['nohp_kasir'];
    $tgl_bergabung=ubahFormatB($_POST['tgl_bergabung']);*/

    $b=mysqli_query($conn,"UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'") or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Kategori Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=kategori';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Kategori.";
    }
?>