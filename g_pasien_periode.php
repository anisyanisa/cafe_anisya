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
<center><span style="font-size:16px; font-family:Tahoma, Geneva, sans-serif"><strong>STATISTIK DATA PASIEN RAWAT INAP<br/>Periode: <?php echo DateToIndo($tanggal_awal);?> s/d <?php echo DateToIndo($tanggal_akhir);?></strong></span></center>
<br />
<table width="98%"  align="center" border="0" cellspacing="0" cellpadding="0" class="grafik-row-1">
<tbody>
<tr>
<td width="100%" valign="top">
<div  id="grafiktempat"></div>
</td>
</tr>
</tbody>
</table>

<form action="r_pasien_inap_periode.php" method="POST" target="_blank">
<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal;?>">
<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir;?>">
<input type="submit" value="Cetak">
</form>

<?php
 
  
$sql = "select tanggalmasuk,count(idpasien) as jlh from cek_in WHERE tanggalmasuk BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tanggalmasuk ORDER BY tanggalmasuk ASC";
 
$qry = mysql_query($sql) or die(mysql_error());
 
while($row=mysql_fetch_assoc($qry)){
 
	$tanggalmasuk[] = $row['tanggalmasuk'];
	 
	$jml_pasien[] = $row['jlh'];
 
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
                renderTo: 'grafiktempat', // id tempat grafik ditampilkan pada elemen html
                type: 'line'   // tipe grafik
                
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
		text: 'Jumlah Pasien (Per Tanggal)',
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
 
		name: 'Jumlah Pasien',
		 
		data: [<?php echo $aray_jml;?>],
		 
		}]
		});
	});
});
 
</script>
 
</body>
</html>