<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print</title>
<style>
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
</head>

<body onload="javascript:window.print();">
<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$tahun=$_POST['tahun'];

$a=mysql_query("select DATE(pesanan.tgl_transaksi) as tanggal,MONTH(pesanan.tgl_transaksi) as bulan,YEAR(pesanan.tgl_transaksi) as tahun, count(pesanan.id_menu) as jlh FROM pesanan WHERE pesanan.tgl_transaksi LIKE '$bulan%' group by MONTH(pesanan.tgl_transaksi),YEAR(pesanan.tgl_transaksi)  ORDER BY pesanan.tgl_transaksi ASC") or die(mysql_error());


?>
<center>
 <table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th  rowspan="1"></th>
    <th colspan="2" ><p align="center"><strong>Bery,<br /> Coffee and Resto</strong></br>Jalan dr. Sutomo Kota Padang</br>Telp.  </p></th>
    <th rowspan="1"></th>
  </tr>
  <tr>
    <th colspan="4" ><hr></th>
  </tr>
 
 
</table>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><div align="center"><strong>LAPORAN PESANAN TAHUNAN</strong></div></th>
</tr>
<tr>
    <th colspan="3"><div align="center"><p>Tahun: <?php echo DateToIndo($tahun);?></tr></div><br /></p></th>
</tr>

</table>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th class="line_ba line_ki line_a line_ka "><div align="center">NO.</div></th>
    <th class="line_ba line_ka line_a"><div >BULAN</div></th>
    <th class="line_ba line_ka line_a"><div align="center">JUMLAH PESANAN</div></th>
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ $total=$total+$aa['jlh']?>
  <tr>
    <td align="center" class="line_ki line_ka line_ba"><?php echo $no; ?></td>
    <td align="center" class="line_ka line_ba"><?php echo $aa['bulan'];?> - <?php echo $aa['tahun'];?></td>
    <td class="line_ka line_ba" align="center"><?php echo $aa['jlh'];?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="2" class="line_ki line_ka line_ba" align="center"><strong>TOTAL</strong></td>
    <td class="line_ka line_ba" align="center"><strong><?php echo $total;?></strong></td>
  </tr>
   <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center"></br>Painan, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center">Manager</td>
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
      <td colspan="1"></td>
      <td colspan="2" align="center"><strong>Novita</strong></td>
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
</body>
</html>