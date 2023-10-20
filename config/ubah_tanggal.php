<?php
function ubahFormat($tanggal) {
        $pisah = explode('-',$tanggal);
        $urutan = array($pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function ubahFormatZ($tanggal) {
        $pisah = explode('-',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function ubahFormatX($tanggal) {
        $pisah = explode('-',$tanggal);
        $urutan = array($pisah[0],$pisah[1]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function ubahFormatY($tanggal) {
        $pisah = explode('-',$tanggal);
        $urutan = array($pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function ubahFormatTahun($tanggal) {
        $pisah = explode('-',$tanggal);
        $urutan = array($pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function ubahFormatA($tanggal) {
        $pisah = explode('-',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function ubahFormatB($tanggal) {
        $pisah = explode('/',$tanggal);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$urutan);
        return $satukan;
}
function DateToIndo($tanggal) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
                $BulanIndo = array("Januari", "Februari", "Maret",
                                                   "April", "Mei", "Juni",
                                                   "Juli", "Agustus", "September",
                                                   "Oktober", "November", "Desember");
        
                $tahun = substr($tanggal, 0, 4); // memisahkan format tahun menggunakan substring
                $bulan = substr($tanggal, 5, 2); // memisahkan format bulan menggunakan substring
                $tgl   = substr($tanggal, 8, 2); // memisahkan format tanggal menggunakan substring
                
                $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
                return($result);
}
?>