<?php
// Konfigurasi koneksi ke database
$servername = "localhost"; // Sesuaikan dengan nama server database Anda
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "pb_kemang"; // Sesuaikan dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$player = $_POST['player'];
$used = $_POST['used'];
$paid = $_POST['paid'];
$unpaid = $_POST['unpaid'];

// Query SQL untuk menyimpan data ke database
$sql = "INSERT INTO nama_tabel (nama, tanggal, player, used, paid, unpaid) VALUES ('$nama', '$tanggal', '$player', '$used', '$paid', '$unpaid')";

// Mengeksekusi query dan memeriksa apakah data berhasil disimpan
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
