<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

    $iduser=$_POST['iduser'];
    $namauser=$_POST['namauser'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    
    $b=mysql_query("UPDATE user SET namauser='$namauser',username='$username',password='$password',level='$level' WHERE iduser='$iduser'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data User Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=user';</script>";
        
       
    }
    else
    {
        echo "Gagal Merubah Data User.";
    }
?>