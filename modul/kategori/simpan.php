<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $id_kategori=$_POST['id_kategori'];
    $nama_kategori=$_POST['nama_kategori'];
   

    $b=mysqli_query($conn,"INSERT INTO kategori VALUES('$id_kategori','$nama_kategori')") or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Kategori Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=kategori';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Kategori";
    }
?>