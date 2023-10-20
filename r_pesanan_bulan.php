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

//$a=mysql_query("select DATE(pesanan.tgl_transaksi) as tgl,DAY(pesanan.tgl_transaksi) as tanggal, MONTH(pesanan.tgl_transaksi) as bulan,YEAR(pesanan.tgl_transaksi) as tahun, sum(pesanan.qty) as jlh,pesanan.qty,menu.harga,pesanan.id_menu FROM pesanan,menu WHERE pesanan.tgl_transaksi LIKE '$bulan%' AND menu.id_menu=pesanan.id_menu group by DATE(pesanan.tgl_transaksi),MONTH(pesanan.tgl_transaksi), YEAR(pesanan.tgl_transaksi)  ORDER BY pesanan.tgl_transaksi ASC") or die(mysql_error());
 
$a=mysql_query("select pesananpertanggal.tgl,sum(pesananpertanggal.total) as tot, sum(pesananpertanggal.jlh)as jumlah FROM pesananpertanggal WHERE tgl LIKE '$bulan%' group by DATE(pesananpertanggal.tgl) ORDER BY pesananpertanggal.tgl ASC") or die(mysql_error());
?>
<center>
 <table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    
    <th colspan="3" ><p align="left"><strong>Bery's Coffee and Food <br /> 
    </strong>Jalan dr. Sutomo Kota Padang</br>Telp.  </p></th>
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
    <th colspan="3"><div align="left"><strong>LAPORAN PESANAN</strong></div></th>
</tr>
<tr>
    <th colspan="3"><div align="left"><p>Periode: <?php echo DateToIndo($bulan);?></tr></div><br /></p></th>
</tr>

</table>
<table width="600" border="0" cellspacing="0" cellpadding="5">
   <tr>
    <th></th>
    <th></th>
    <th></th>
  </tr>
   <tr>
    <th bgcolor="#999999" class="line_ba line_a line_ki line_ka "><div align="center">NO.</div></th>
    <th bgcolor="#999999" class="line_ba line_a line_ka"><div >Tanggal</div></th>
    <th bgcolor="#999999" class="line_ba line_a line_ka"><div align="center">JUMLAH PESANAN</div></th>
    <th bgcolor="#999999" class="line_ba line_a line_ka"><div align="center">TOTAL</div></th>
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ $total=$total+$aa['jumlah'];
  $tot=$tot+$aa['tot'];?>
  <tr>
    <td align="center" class="line_ki line_ka line_ba"><?php echo $no; ?></td>
    <td align="center" class="line_ka line_ba"><?php echo ubahFormatZ($aa['tgl']);?></td>
    <td class="line_ka line_ba" align="center"><?php echo number_format($aa['jumlah'],0,'','.');?></td>
    
    <td class="line_ka line_ba" align="center">Rp. <?php echo number_format($aa['tot'],0,'','.');?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
  <tr>
  <td colspan="4"><hr />
  </td>
  </tr>
    <td colspan="2" class="line_ki line_ka line_ba" align="center"><strong>TOTAL</strong></td>
    <td class="line_ka line_ba" align="center"><strong><?php echo number_format($total,0,'','.');?></strong></td>
    <td class="line_ka line_ba" align="center"><strong>Rp. <?php echo number_format($tot,0,'','.');?></strong></td>
  </tr>
  <?php

   $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
      <td colspan="2"></td>
      <td colspan="2" align="center"></br>Padang, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="2"></td>
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
      <td colspan="2"></td>
      <td colspan="2" align="center"><strong>Novita</strong></td>
   </tr>
   <tr>
      <td colspan="2"></td>
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