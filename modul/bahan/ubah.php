<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $id_bahan=$_POST['id_bahan'];
    $nama_bahan=$_POST['nama_bahan'];
	//$satuan=$_POST['satuan'];
    /*$nama_kasir=$_POST['nama_kasir'];
    $jekel=$_POST['jekel'];
    $tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=ubahFormatB($_POST['tanggal_lahir']);
    $alamat_kasir=$_POST['alamat_kasir'];
    $nohp_kasir=$_POST['nohp_kasir'];
    $tgl_bergabung=ubahFormatB($_POST['tgl_bergabung']);*/

    $b=mysqli_query($conn,"UPDATE bahan SET nama_bahan='$nama_bahan' WHERE id_bahan='$id_bahan'") or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Bahan Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=bahan';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Bahan.";
    }
?>