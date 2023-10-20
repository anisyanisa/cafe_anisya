
<?php

    include "../../config/koneksi.php";
    include "../../config/ubah_tanggal.php";

   $no_meja=$_POST['no_meja'];
   $menu_awal=$_POST['menu_awal'];
   $menu_akhir=$_POST['menu_akhir'];
   $qty=$_POST['qty'];
 
    $b=mysql_query("UPDATE pesanan_temp SET id_menu='$menu_akhir', qty='$qty' WHERE no_meja='$no_meja' AND id_menu='$menu_awal'") or die(mysql_error());
	//$c=mysql_query("UPDATE menukategori SET id_kategori='$id_kategori' WHERE id_menu='$id_menu'") or die(mysql_error());

    if($b)
    {
        echo "<script>alert('Data Pesanan Berhasil dirubah..!!');</script>";
        echo "<script>window.location.href='../../main.php?modul=viewmeja';</script>";
       
    }
    else
    {
        echo "Gagal Mengubah Data Menu.";
    }
?>