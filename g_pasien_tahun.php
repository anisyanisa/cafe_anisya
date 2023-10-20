<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="highcharts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Statistik</title>
</head>
<body class="easyui-layout">
<center><span style="font-size:16px; font-family:Tahoma, Geneva, sans-serif"><strong>STATISTIK DATA PASIEN TAHUNAN</strong></span></center>
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

<?php
$tahun=$_POST['tahun'];?>

<form action="r_pasien_inap_tahun.php" method="POST" target="_blank">
<input type="hidden" name="tahun" value="<?php echo $tahun;?>">
<input type="submit" value="Cetak">
</form>
<?php
 


include "config/koneksi.php";
include "config/ubah_tanggal.php";
 

 
$sql = "select YEAR(tanggalmasuk) as tahun,count(idpasien) as jlh from cek_in WHERE tanggalmasuk LIKE '$tahun%' GROUP BY YEAR(tanggalmasuk) ";
 
$qry = mysql_query($sql) or die(mysql_error());
 
while($row=mysql_fetch_assoc($qry)){
 
	$tanggalmasuk[] = $row['tahun'];
	 
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
                renderTo: 'grafiktempat',  // id tempat grafik ditampilkan pada elemen html
                type: 'line'  //tipe grafik
                
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
		text: 'Jumlah Pasien (Per Tahun)',
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