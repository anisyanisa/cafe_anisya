<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $id_menu=$_POST['id_menu'];
    $tanggal=$_POST['tanggal'];
    $stock=$_POST['stock'];
    

    $b=mysql_query("INSERT INTO persediaan VALUES('$id_menu','$tanggal','$stock')") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Persediaan Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=persediaan';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data Persediaan";
    }
?>