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

$a=mysql_query("select * FROM belibahan WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tgl_transaksi") or die(mysql_error());


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
  </br>
  <tr>
    <td colspan="3"  ></td>
    <td colspan="3"></td>
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
    <th class="line_ba line_ki line_a"><div align="center">ID BAHAN</div></th>
    <th class="line_ba line_ki line_a"><div >NAMA BAHAN</div></th>
     <th class="line_ba line_ki line_a"><div >SATUAN</div></th>
    <th class="line_ba line_ki line_a"><div >QTY</div></th>
   
    <th class="line_ba line_ki line_a line_ka "><div >HARGA BELI</div></th>
  </tr>
  <?php $no=1; 
  while ($aa=mysql_fetch_array($a)){ 
  
  $total=$total+$aa['harga_beli']; 
  $NM=mysql_query("select * from bahan where id_bahan='$aa[id_bahan]'");
  $rnm=mysql_fetch_array($NM);
  
  $nm2=mysql_query("select * from satuan where id_satuan='$aa[id_satuan]'");
  $rnm2=mysql_fetch_array($nm2);

  ?>
  <tr>
    <td align="center" class="line_ba line_ki"><?php echo $no; ?></td>
    <td align="center" class="line_ba line_ki"><?php echo $aa['tgl_transaksi'];?></td>
    <td align="center" class="line_ba line_ki"><?php echo $aa['id_bahan'];?></td>
    <td align="center" class="line_ba line_ki"><?php echo $rnm['nama_bahan'];?></td>
    <td align="center" class="line_ba line_ki"><?php echo $rnm2['nama_satuan'];?></td>
    <td align="center" class="line_ba line_ki"><?php echo $aa['qty'];?></td>
    <td align="center" class="line_ba line_ki line_a line_ka "><?php echo $aa['harga_beli'];?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="6" class="line_ba line_ki" align="center"><strong>TOTAL</strong></td>
    <td class="line_ba line_ki line_ka" align="center"><strong><?php echo $total;?></strong></td>
  </tr>
   <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
      <td colspan="4"></td>
      <td colspan="2" align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="4"></td>
      <td colspan="2" align="center">Manager</td>
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
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4"></td>
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