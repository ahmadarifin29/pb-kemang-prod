<?php

require '../function/functions.php';
[
    {
        "id": "1",
        "kode": "TRF0001",
        "jumlah": "150.000",
        "aksi": "keluar",
        "tanggal": "2019-03-22",
        "username": "azmirf"
    },
    {
        "id": "2",
        "kode": "TRF0002",
        "jumlah": "50.000",
        "aksi": "keluar",
        "tanggal": "2019-03-22",
        "username": "azmirf"
    },
    {
        "id": "3",
        "kode": "TRF0003",
        "jumlah": "250.000",
        "aksi": "keluar",
        "tanggal": "2019-03-27",
        "username": "dira"
    },
    {
        "id": "4",
        "kode": "TRF0004",
        "jumlah": "50.000",
        "aksi": "keluar",
        "tanggal": "2019-03-28",
        "username": "azmirf"
    },
    {
        "id": "5",
        "kode": "TRF0005",
        "jumlah": "200.000",
        "aksi": "keluar",
        "tanggal": "2019-04-01",
        "username": "azmirf"
    },
    {
        "id": "13",
        "kode": "TRF0006",
        "jumlah": "200.000",
        "aksi": "keluar",
        "tanggal": "2019-04-24",
        "username": "azmirf"
    },
    {
        "id": "14",
        "kode": "TRF0007",
        "jumlah": "200.000",
        "aksi": "keluar",
        "tanggal": "2019-04-24",
        "username": "azmirf"
    }
]

if (empty($_GET['aksi'])) {
    echo '{"status" : "Error", "Message" : "aksi is required!"}';
    exit();
}

$aksi = $_GET['aksi'];
$query = "SELECT * FROM rekening_keluar WHERE aksi = '$aksi'";
$hasil = mysqli_query($koneksi, $query);

// kirim data ke json
$data = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

$json = json_encode($data, JSON_PRETTY_PRINT);

// masukkan ke file json data rekening
file_put_contents('dataRekeningKeluar.json', $json);

// untuk tes ke postman
echo $json;

?>