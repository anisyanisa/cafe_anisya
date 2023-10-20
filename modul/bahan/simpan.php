<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $id_bahan=$_POST['id_bahan'];
    $nama_bahan=$_POST['nama_bahan'];
   //$satuan=$_POST['satuan'];

    $b=mysqli_query($conn,"INSERT INTO bahan VALUES('$id_bahan','$nama_bahan')") or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Bahan Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=bahan';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Bahan";
    }
?>