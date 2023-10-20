<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="highcharts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Statistik</title>
</head>

<?php 
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$tgl_awal=$_POST['tanggal_awal'];
$tgl_akhir=$_POST['tanggal_akhir'];

?>

<body class="easyui-layout">
<center><span style="font-size:16px; font-family:Tahoma, Geneva, sans-serif"><strong>STATISTIK DATA PESANAN<br/>Periode: <?php echo ubahFormatZ($tgl_awal);?> s/d <?php echo ubahFormatZ($tgl_akhir);?></strong></span></center>
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

<form action="r_transaksi_periode.php" method="POST" target="_blank">
<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal;?>">
<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir;?>">
<input type="submit" value="Cetak">
</form>

<?php
 
//$sql = "select pelayanan.tanggal, count(pelayanan.idpasien) as jlh FROM pelayanan,pasien WHERE pelayanan.idpasien=pasien.idpasien AND pasien.status='Jalan' AND tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY pelayanan.tanggal ORDER BY pelayanan.tanggal ASC";
 
$sql = "select  pesanan.tgl_transaksi, pesanan.id_menu, menu.nama_menu, sum(pesanan.qty) as jlh FROM pesanan,menu WHERE pesanan.id_menu=menu.id_menu AND tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY pesanan.id_menu ORDER BY pesanan.tgl_transaksi ASC";
 
$qry = mysql_query($sql) or die(mysql_error());
 
while($row=mysql_fetch_assoc($qry)){
 
	$tanggalmasuk[] = $row['tgl_transaksi'];
	 
	$jml_pesanan[] = $row['jlh'];
	
	$id_menu[]=$row['id_menu'];
	
	$nama_menu[]=$row['nama_menu'];
 
}
 
 
$aray_tanggal=join(" ,",$tanggalmasuk);
 
$aray_jml=join(" ,",$jml_pesanan);

$aray_menu=join(" ,",$id_menu);
 
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
		categories: ["<?php echo implode($nama_menu, '","'); ?>"],
		title: {
		text: null
		}
		},
		 
		yAxis: {
		min: 0,
		title: {
		text: 'Jumlah Pesanan (Per Tanggal)',
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
 
		name: 'Jumlah Pesanan',
		 
		data: [<?php echo $aray_jml;?>],
		 
		}]
		});
	});
});
 
</script>
 
</body>
</html>