<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $id_satuan=$_POST['id_satuan'];
    $nama_satuan=$_POST['nama_satuan'];
   

    $b=mysqli_query($conn,"INSERT INTO satuan VALUES('$id_satuan','$nama_satuan')") or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Satuan Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=satuan';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Satuan";
    }
?>