<?php

include "../../config/koneksi.php";
 include "../../config/ubah_tanggal.php";

			$no_transaksi=$_POST['no_transaksi'];
            $tgl_transaksi=$_POST['tgl_transaksi'];
			$kd_kasir=$_POST['kd_kasir'];
            $no_meja=$_POST['no_meja'];
           // $id_menu=$_POST['id_menu'];
            //$qty=$_POST['qty'];
			
           //jika idpelayanan ada inputan, maka loop untuk idpelayanan, loop  
            //seberapa banyak idpelayanan yg di centang, dan input sesuai berapa banyak yg di centang
            if(isset($_POST['id_menus']))
            {
            foreach($_POST['id_menus'] as $key => $value) 
           
            {
                $text_values= $_POST['qtys'] [$key];

                $query = "INSERT INTO pesanan_temp VALUES('$no_transaksi','$tgl_transaksi','$value','$text_values','$no_meja','$kd_kasir','BELUM SELESAI')";
                $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            
            }
            
            }
				mysqli_query($conn,"UPDATE meja SET status='Tidak Tersedia' WHERE no_meja='$no_meja'");
				?>
				<script>alert('Data Pemesanan Berhasil ditambahkan..!!')</script>
				<script>window.location='../../main.php?modul=viewmeja&act=pesan&no=<?php echo $no_meja; ?>';</script>

