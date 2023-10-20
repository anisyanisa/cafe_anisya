
<style type="text/css">
body {
	font-family: dotmatrix;
	src: url('../../assets/fonts/DOTMATRI.ttf');
    
	font-family: dotmatrix;
	letter-spacing: 3px;
	font-size:7px;
}


.border_kiri {
	border-left-style: none;
	border-bottom-style: ridge;
}
.border_atas_bawah {
	border-top-style: ridge;
	border-bottom-style: ridge;
}
</style>

<?php
    
	
session_start();
ob_start();
	
    include "config/koneksi.php";
    include "config/ubah_tanggal.php";        
    
	
	     
    $id=$_GET['no_trans'];
	$rbayar=$_POST['bayar'];
	
	$diskon=$_POST['diskon'];
	
	$vip=$_POST['vip']; //mengambil vip dari form bayar
	
	$ppn=$_POST['ppn']; //mengambil vip dari form bayar
	
	
	$no_transaksi=$_POST['no_transaksi'];
	
	$tgl_transaksi=$_POST['tgl_transaksi'];
           
	/*if(isset($_POST['id_waitress']))
            {
            foreach($_POST['id_waitress'] as $key => $value) 
           
            {
                //$text_values= $_POST['qtys'] [$key];

                $query = "INSERT INTO layanan_waitress2 VALUES('$no_transaksi','$value','$tgl_transaksi')";
                $result = mysql_query($query) or die(mysql_error());
            
            }
            
            }
			
	*/
	$pindahtemp=mysql_query("insert into pesanan (no_transaksi,tgl_transaksi,id_menu,qty,no_meja,kd_kasir)select no_transaksi,tgl_transaksi,id_menu,qty,no_meja,kd_kasir from pesanan_temp where no_meja='$id'");
	
	$pindahtempkebayar=mysql_query("insert into bayar values('$no_transaksi','$rbayar','0','$diskon','SELESAI')");
	
	$simpanpajak=mysql_query("insert into pajak values('$no_transaksi','$ppn')");
	
	$simpanvip=mysql_query("insert into vip values('$no_transaksi','$vip')");
	
	//$pindahtempkebayar=mysql_query("insert into bayar (no_transaksi,bayar,status)select no_transaksi,'','' from pesanan_temp where no_transaksi='$no_transaksi'");
	
	$simpan=mysql_query("update bayar set bayar='$rbayar',status='SELESAI' where no_transaksi='$no_transaksi'");
	
	$updatemeja=mysql_query("update meja set status='Tersedia' where no_meja='$id'");
	
	

	$c=mysql_query("
	select * from pesanan_temp where no_meja='$id'
	");
	
    $row=mysql_fetch_assoc($c);

 

?>            

            
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php //echo $data['NIS']; ?></title>
</head>              
<body>

<table width="319" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="border_kiri">Berry's Coffee and Foods<br>
      Jl. dr. Sutomo No. 84<br>
    Open 9 a.m - 10 p.m</td>
    </tr>
  <tr>
    <td class="border_kiri">
    
     <table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="85">No. Trans</td>
        <td width="84">: <?php echo $row['no_transaksi'];?></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td>: <?php echo ubahFormatZ($row['tgl_transaksi']);?></td>
      </tr>
      <tr>
        <td>Meja</td>
        <td>: <?php echo $row['no_meja'];?></td>
      </tr>
     
    </table>
    
    </td>
    </tr>
</table>
<table width="319" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="3" valign="top">
    <table width="180" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="border_kiri" width="110">Nama</td>
        <td class="border_kiri">Qty x Harga</td>
      </tr>
         <?php

                                    
                       

                                    $no=1;
                                   
                                    $res=mysql_query("

                                      SELECT * from pesanan_temp where no_meja='$_GET[no_trans]'
                                      ") or die(mysql_error());
                                    
                                    while($rows=mysql_fetch_array($res)){
										
										$menu=mysql_query("select * from menu where id_menu='$rows[id_menu]'");
										$rmenu=mysql_fetch_array($menu);

                                        $total=$rows['qty']*$rmenu['harga'];

                                        $totals=$totals+$total;
										
										

                                ?>
      <tr>
        <td align="left"><?php echo $rmenu['nama_menu']; ?></td>
        <td valign="top"><?php echo $rows['qty'];?> x <?php echo number_format($rmenu[harga],0,'','.');?></td>
      </tr>
      <?php }?>
      
    </table>
  </td>
    <td valign="top">
    <table width="139" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="left" scope="row">&nbsp;</td>
        </tr>
     
      
      
      <tr>
        <td>&nbsp;</td>
        <td align="left" scope="row">VIP</td>
        <td valign="top">: <?php echo number_format($vip,0,'','.');?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="left" scope="row">PPN</td>
        <td valign="top">: <?php echo number_format($ppn,0,'','.');?>
          <input name="ppn" type="hidden" id="ppn" value="<?php echo $ppn;?>" /></td>
      </tr>
      
       <?php
	 // $ppn_akhir=$ppn*$totals;
	  ?>
      
      <tr>
        <td width="15">&nbsp;</td>
        <td align="left" scope="row" width="60">Jumlah</td>
        <td valign="top">: <?php echo number_format($totals,0,'','.');?></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td align="left" scope="row">Diskon</td><?php
								//$ppn=0;
								$disc=($diskon/100)*$totals;
								?>
        <td valign="top">: -<?php  echo number_format($disc,0,'','.');?></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th><?php
                                  $grandtotal=$totals-$disc+$ppn+$vip;
                                ?>
        <td align="left" >Total</td>
        <td valign="top">: <?php echo number_format($grandtotal,0,'','.'); ?></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td align="left" >Bayar</td>
        <td valign="top">: <?php echo number_format($rbayar,0,'','.');?></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td align="left">Kembalian</td> <?php $kembali=$rbayar-$grandtotal;?>
        <td valign="top">: <?php echo number_format($kembali,0,'','.');?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
  <td>&nbsp;
  </td>
  </tr>
   <tr>
  <td>&nbsp;
  </td>
  </tr>
   <tr>
     <td class="border_kiri">&nbsp;</td>
     <td class="border_kiri">&nbsp;</td>
   </tr>
   <tr>
     <td colspan="2" align="center" class="border_kiri"><font face="Times New Roman, Times, serif"><em>Terima Kasih atas Kunjungannya</em></font></td>
    </tr>
</table>

 
 <?php
/*
                                  $datetime1 = strtotime($row['tanggalmasuk']);
                                  $datetime2 = strtotime($row['tanggalcekout']);
                                  $selisih = $datetime2 - $datetime1;
                                  $lama = $selisih / (60*60*24);
  */                                
                                  ?>
                                 
             
            

 <!-- font sa-->               
                       


     <?php
$hapustemp=mysql_query("delete from pesanan_temp where no_meja='$id'");
?>         
                
                <input type="button" value="CETAK" onclick=" " />
                <button  type="button" href="javascript:void(0);" 
                    onClick=" ">Cetak Bukti</button>
               
</body>
</html>    
      <?php
$filename="faktur-".$no_transaksi.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html_2_pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A3','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>

