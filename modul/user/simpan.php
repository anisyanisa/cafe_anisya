<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $iduser=$_POST['iduser'];
    $namauser=$_POST['namauser'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    
    $b=mysql_query("INSERT INTO user VALUES('$iduser','$namauser','$username','$password','$level')") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data User Berhasil ditambahkan..!!')</script>";
        echo "<script>window.location.href='../../main.php?modul=user';</script>";
       
    }
    else
    {
        echo "Gagal Menyimpan Data User";
    }
?>