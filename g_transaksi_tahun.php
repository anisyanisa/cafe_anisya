<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="highcharts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Statistik</title>
</head>
<body class="easyui-layout">
<center>
  <span style="font-size:16px; font-family:Tahoma, Geneva, sans-serif"><strong>STATISTIK DATA PENDAPATAN TAHUNAN</strong></span>
</center>
<br />
<table width="98%"  align="center" border="0" cellspacing="0" cellpadding="0" class="grafik-row-1">
<tbody>
<tr>
<td width="100%" valign="top">
<div  id="kota"></div>
</td>
</tr>
</tbody>
</table>

<?php 
 $tahun=$_POST['tahun'];
?>

<form action="r_transaksi_tahun.php" method="POST" target="_blank">
<input type="hidden" name="tahun" value="<?php echo $tahun;?>">
<input type="submit" value="Cetak">
</form>

<?php
 



include "config/koneksi.php";
include "config/ubah_tanggal.php";
 
$nama_kota=array();
 
$jml_paket=array();
 
$sql = "select  MONTH(reportpendapatan.tgl_transaksi) as bulan,YEAR(reportpendapatan.tgl_transaksi) as tahun,sum(reportpendapatan.grand) as grand FROM reportpendapatan WHERE reportpendapatan.tgl_transaksi LIKE '$bulan%' group by MONTH(reportpendapatan.tgl_transaksi), YEAR(reportpendapatan.tgl_transaksi)  ORDER BY reportpendapatan.tgl_transaksi ASC";
 
$qry = mysql_query($sql) or die(mysql_error());
 
while($row=mysql_fetch_assoc($qry)){
 
	$tanggalmasuk[] = $row['bulan']."-".$row['tahun'];
	 
	$jml_pasien[] = $row['grand'];
 
}
 
 
$aray_tanggal=join(" ,",$tanggalmasuk);
 
$aray_jml=join(" ,",$jml_pasien);
 
?>

<script type="text/javascript">
$(function () {
 
var chart;

   $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'kota', //letakan grafik di div id container
                //Type grafik, anda bisa ganti menjadi area,bar,column dan bar
                type: 'line'  
                
            },
		title: {
		text: ''
		},
		xAxis: {
		categories: ["<?php echo implode($tanggalmasuk, '","'); ?>"],
		title: {
		text: null
		}
		},
		 
		yAxis: {
		min: 0,
		title: {
		text: 'Jumlah Pendapatan (Per Tahun)',
		align: 'high'
		},
		labels: {
		overflow: 'justify'
		}
		},
		tooltip: {
		valueSuffix: ' '
		},
		plotOptions: {
		bar: {
		dataLabels: {
		enabled: true
		}
		}
		},
		legend: {
		layout: 'vertical',
		align: 'right',
		verticalAlign: 'top',
		x: -40,
		y: 100,
		floating: true,
		borderWidth: 1,
		shadow: true
		},
		credits: {
		enabled: false
		},
		series: [{
 
		name: 'Jumlah Pendapatan',
		 
		data: [<?php echo $aray_jml;?>],
		 
		}]
		});
	});
});
 
</script>
 
</body>
</html>