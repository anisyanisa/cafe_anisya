<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print</title>
<!--<style>
.line_a{
	border-top:thin #333 solid;
}
.line_ki{
	border-left:thin #333 solid;
}
.line_ka{
	border-right:thin #333 solid;
}
.line_ba{
	border-bottom:thin #333 solid;
}
</style>
-->
</head>

<body onload="javascript:window.print();">
<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$tgl_awal=$_POST['tgl_awal'];
$tgl_akhir=$_POST['tgl_akhir'];

$a=mysql_query("select pesanan.tgl_transaksi,pesanan.no_transaksi,sum((pesanan.qty)*(menu.harga) ) as totalbayar, bayar.diskon FROM pesanan,menu,bayar WHERE pesanan.id_menu=menu.id_menu and bayar.no_transaksi=pesanan.no_transaksi aND pesanan.tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' group by pesanan.no_transaksi ORDER BY pesanan.tgl_transaksi ASC") or die(mysql_error());


?>
<center>
  <table width="80%" border="0" cellspacing="0" cellpadding="5">
  <tr>
   
    <th colspan="3" ><p align="left"><strong>Bery's Coffee and Foods</strong></br>Jalan dr. Sutomo Kota Padang</br>  </p></th>
    <th rowspan="1"></th>
  </tr>
  <tr>
    <th colspan="4" ><hr></th>
  </tr>
  </br>
  <tr>
    <td colspan="3"  ></td>
    <td colspan="3"></td>
  </tr>
</table>

<table width="80%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><p align="left"><strong>LAPORAN JUMLAH PENDAPATAN</strong></p></th>
</tr>
<tr>
    <th colspan="3"><div align="left">Periode: <?php echo DateToIndo($tgl_awal); ?> s/d <?php echo DateToIndo($tgl_akhir); ?></tr></div></th>
</tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th bgcolor="#999999"><div align="center">NO.</div></th>
    <th bgcolor="#999999"><div >NO TRANSAKSI</div></th>
    <th bgcolor="#999999"><div align="center">SUB TOTAL</div></th>
    <th bgcolor="#999999" class="line_ba line_ka line_a">VIP </th>
    <th bgcolor="#999999" class="line_ba line_ka line_a">PPN</th>
    <th bgcolor="#999999" class="line_ba line_ka line_a"><div align="center">DISCOUNT</div></th>
    <th bgcolor="#999999" class="line_ba line_ka line_a">GRAND</th>
    
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ 
  $total=$total+$aa['harga']; 
  
  $caripajak=mysql_query("select * from pajak where no_transaksi='$aa[no_transaksi]'");
  $rcaripajak=mysql_fetch_array($caripajak);
  
   $carivip=mysql_query("select * from vip where no_transaksi='$aa[no_transaksi]'");
  $rcarivip=mysql_fetch_array($carivip);
  
  ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="left"><?php echo $aa['no_transaksi'];?></td>
    <?php $grand=$aa['harga']*$aa['jlh'];?>
    <td align="right" >Rp. <?php echo number_format($aa['totalbayar'],0,'','.');?></td>
    <td align="center">Rp. <?php echo number_format($rcarivip['vip_fee'],0,'','.');?></td>
    <td align="center">Rp. <?php echo number_format($rcaripajak['ppn'],0,'','.');?></td>
    <?php $gt=$gt+$grand;
	$diskon=($aa['totalbayar']+$rcaripajak['ppn']+$rcarivip['vip_fee'])*($aa['diskon']/100);
	?>

    <td align="center"><?php echo $aa['diskon'];?> % <?php echo $diskon;?></td>
    <?php
	$grandbayar=$aa['totalbayar']+$rcaripajak['ppn']+$rcarivip['vip_fee']-$diskon;
	?>
    <td align="right">Rp. <?php echo number_format($grandbayar,0,'','.');?></td>
    <?php //$grandmodal=$aa['modal']*$aa['jlh'];
	$totalgrand=$totalgrand+$grandbayar; 
	?>
   
      </tr>
  <?php $no++; } 

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
  <td colspan="8"><hr /></td>
  </tr>
   <tr>
    <td colspan="3" align="center"><strong>TOTAL</strong></td>
    <td  align="right">&nbsp;</td>
    <td  align="right">&nbsp;</td>
    <td  align="right">&nbsp;</td>
    <td  align="right"><strong>Rp. <?php echo number_format($totalgrand,0,'','.');?></strong></td>
    
  </tr>
  <tr>
      <td colspan="3"></td>
      <td colspan="5" align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="3"></td>
      <td colspan="5" align="center">Manager</td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
    <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3"></td>
      <td colspan="5" align="center"><strong>Novita</strong></td>
   </tr>
   <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center"><strong></strong></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
    <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   </table>
   </center>
</body>
</html>