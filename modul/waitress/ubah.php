<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $id_waitress=$_POST['id_waitress'];
    $nik=$_POST['nik'];
    $nama_waitress=$_POST['nama_waitress'];
    $jekel=$_POST['jekel'];
    $tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=ubahFormatB($_POST['tanggal_lahir']);
    $alamat_waitress=$_POST['alamat_waitress'];
    $nohp_waitress=$_POST['nohp_waitress'];
    $tgl_bergabung=ubahFormatB($_POST['tgl_bergabung']);

    $b=mysql_query("UPDATE waitress SET nik='$nik',nama_waitress='$nama_waitress',jekel='$jekel',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat_waitress='$alamat_waitress',nohp_waitress='$nohp_waitress',tgl_bergabung='$tgl_bergabung' WHERE id_waitress='$id_waitress'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Waitress Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=waitress';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Waitress.";
    }
?>