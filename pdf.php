<?php
//koneksi ke database
mysql_connect("localhost","root","");
mysql_select_db("lazara");

//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM pesanan ORDER BY no_transaksi");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}

//mengisi judul dan header tabel
$judul = "DATA PESANAN";
$header = array(
array("label"=>"No Transaksi", "length"=>30, "align"=>"L"),
array("label"=>"Tanggal Transaksi", "length"=>50, "align"=>"L"),
array("label"=>"Id Menu", "length"=>30, "align"=>"L"),
array("label"=>"QTY", "length"=>30, "align"=>"L"),
array("label"=>"No Meja", "length"=>30, "align"=>"L"),
array("label"=>"Kd Kasir", "length"=>30, "align"=>"L"),
);

//memanggil fpdf
require_once ("fpdf/fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,20, $judul, '0', 1, 'C');

//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align']);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

//output file pdf
$pdf->Output();
?>