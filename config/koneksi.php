<?php
$servername = "localhost";
$database = "cafe_anisya"; //nama database
$username = "root"; //nama user dari webserver kita, kalau XAMPP =root
$password = "root"; //password dari webserver kita, kalau XAMPP="", passwordnya kosong
 
// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
//echo "Koneksi berhasil";

  ?>