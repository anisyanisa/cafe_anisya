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

$bulan=$_POST['bulan'];

$a=mysql_query("select DAY(reportpendapatan.tgl_transaksi) as tanggal, MONTH(reportpendapatan.tgl_transaksi) as bulan,YEAR(reportpendapatan.tgl_transaksi) as tahun,reportpendapatan.tgl_transaksi as tgl_transaksi,reportpendapatan.ppn as ppn,reportpendapatan.diskon as diskon,reportpendapatan.vip_fee as vip,reportpendapatan.totalbayar as totalbayar, sum(reportpendapatan.grand) as grand FROM reportpendapatan WHERE reportpendapatan.tgl_transaksi LIKE '$bulan%' group by DATE(reportpendapatan.tgl_transaksi),MONTH(reportpendapatan.tgl_transaksi), YEAR(reportpendapatan.tgl_transaksi)  ORDER BY reportpendapatan.tgl_transaksi ASC") or die(mysql_error());


?>
<center>
  <table width="60%" border="0" cellspacing="0" cellpadding="5">
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

<table width="60%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><p align="left"><strong>LAPORAN JUMLAH PENDAPATAN BULANAN</strong></p></th>
</tr>
<tr>
    <th colspan="3" align="left">Periode: <?php echo DateToIndo($bulan);?></th>
</tr>
</table>
<table width="60%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th bgcolor="#999999">NO.</th>
    <th bgcolor="#999999">TANGGAL</th>
    
    <th bgcolor="#999999" class="line_ba line_ka line_a">GRAND</th>
    
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ 
  $total=$total+$aa['harga']; 
  ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="left"><?php echo ubahFormatZ($aa['tgl_transaksi']);?></td>
    <?php $grand=($aa['ppn']+$aa['vip']+$aa['totalbayar'])-(($aa['ppn']+$aa['vip']+$aa['totalbayar'])*(($aa['diskon'])/100));?>
    <td align="right" >Rp. <?php echo number_format($grand,0,'','.');?></td>
    <?php $gt=$gt+$aa['grand'];?>

   
    <?php $grandmodal=$aa['modal']*$aa['jlh'];
	$totalgrand=$totalgrand+$grandbayar; 
	?>
   
      </tr>
  <?php $no++; } 

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
  <td colspan="6"><hr /></td>
  </tr>
   <tr>
    <td colspan="2" align="center"><strong>TOTAL</strong></td>>
    <td  align="right"><strong>Rp. <?php echo number_format($gt,0,'','.');?></strong></td>
    
  </tr>
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
   </center>
</body>
</html>