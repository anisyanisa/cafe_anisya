<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $kd_kasir=$_POST['kd_kasir'];
    $nik=$_POST['nik'];
    $nama_kasir=$_POST['nama_kasir'];
    $jekel=$_POST['jekel'];
    $tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=ubahFormatB($_POST['tanggal_lahir']);
    $alamat_kasir=$_POST['alamat_kasir'];
    $nohp_kasir=$_POST['nohp_kasir'];
    $tgl_bergabung=ubahFormatB($_POST['tgl_bergabung']);

    $b=mysql_query("UPDATE kasir SET nik='$nik',nama_kasir='$nama_kasir',jekel='$jekel',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat_kasir='$alamat_kasir',nohp_kasir='$nohp_kasir',tgl_bergabung='$tgl_bergabung' WHERE kd_kasir='$kd_kasir'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Kasir Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=kasir';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Kasir.";
    }
?>