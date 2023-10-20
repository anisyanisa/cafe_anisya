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

<body onLoad="javascript:window.print();">
<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$tgl_awal=$_POST['tanggal_awal'];
$tgl_akhir=$_POST['tanggal_akhir'];

$a=mysql_query("select DATE(belibahan.tgl_transaksi) as tanggal,MONTH(belibahan.tgl_transaksi) as bulan,YEAR(belibahan.tgl_transaksi) as tahun, sum(belibahan.harga_beli) as jlh FROM belibahan WHERE belibahan.tgl_transaksi LIKE '$bulan%' group by MONTH(belibahan.tgl_transaksi),YEAR(belibahan.tgl_transaksi)  ORDER BY belibahan.tgl_transaksi ASC") or die(mysql_error());


?>
<center>
 <table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    
    <th colspan="2" ><p align="center"><strong>Bery,<br /> Coffee and Resto</strong></br>Jalan dr. Sutomo Kota Padang</br>Telp.  </p></th>
    <th rowspan="1"></th>
  </tr>
  <tr>
    <th colspan="3" ><hr></th>
  </tr>
  </br>
  <tr>
    <td colspan="3"  ></td>
  </tr>
</table>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><p align="center"><strong>LAPORAN PEMBELIAN BAHAN</strong></p></th>
</tr>
<tr>
    <th colspan="3"><div align="center">Periode: <?php echo DateToIndo($tgl_awal); ?> s/d <?php echo DateToIndo($tgl_akhir); ?></tr></div></th>
</tr>
</table>

<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th class="line_ba line_ki line_a line_ka "><div align="center">NO.</div></th>
    <th class="line_ba line_ki line_a"><div align="center">TGL TRANSAKSI</div></th>
    <th class="line_ba line_ki line_a line_ka "><div >TOTAL BELI</div></th>
  </tr>
  <?php $no=1; 
  while ($aa=mysql_fetch_array($a)){ 
  
  $total=$total+$aa['jlh']; 
  $NM=mysql_query("select * from bahan where id_bahan='$aa[id_bahan]'");
  $rnm=mysql_fetch_array($NM);
  
  $nm2=mysql_query("select * from satuan where id_satuan='$aa[id_satuan]'");
  $rnm2=mysql_fetch_array($nm2);

  ?>
  <tr>
    <td align="center" class="line_ba line_ki"><?php echo $no; ?></td>
    <td align="center" class="line_ba line_ki"><?php echo DateToIndo( $aa['tanggal']);?></td>
    <td align="center" class="line_ba line_ki line_a line_ka "><?php echo $aa['jlh'];?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="2" class="line_ba line_ki" align="center"><strong>TOTAL</strong></td>
    <td class="line_ba line_ki line_ka" align="center"><strong><?php echo $total;?></strong></td>
  </tr>
   <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center">Manager</td>
   </tr>
   <tr>
      <td colspan="3" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
    <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="1"></td>
      <td colspan="2" align="center"><strong>Novita</strong></td>
   </tr>
   <tr>
      <td colspan="2"></td>
      <td colspan="2" align="center"><strong></strong></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
    <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
  </table>
</center>
</body>
</html>