<?php

require '../function/functions.php';

[
    {
        "id": "1",
        "kode": "TRX0001",
        "jumlah": "400.000",
        "aksi": "masuk",
        "tanggal": "2019-03-22",
        "username": "azmirf"
    },
    {
        "id": "2",
        "kode": "TRX0002",
        "jumlah": "200.000",
        "aksi": "masuk",
        "tanggal": "2019-03-22",
        "username": "azmirf"
    },
    {
        "id": "3",
        "kode": "TRX0003",
        "jumlah": "500.000",
        "aksi": "masuk",
        "tanggal": "2019-03-27",
        "username": "dira"
    },
    {
        "id": "14",
        "kode": "TRX0005",
        "jumlah": "300.000",
        "aksi": "masuk",
        "tanggal": "2019-04-12",
        "username": "azmirf"
    },
    {
        "id": "15",
        "kode": "TRX0006",
        "jumlah": "100.000",
        "aksi": "masuk",
        "tanggal": "2019-04-24",
        "username": "azmirf"
    },
    {
        "id": "16",
        "kode": "TRX0007",
        "jumlah": "200.000",
        "aksi": "masuk",
        "tanggal": "2019-04-24",
        "username": "dina"
    }
]

if (empty($_GET['aksi'])) {
    echo '{"status" : "Error", "Message" : "aksi is required!"}';
    exit();
}

$aksi = $_GET['aksi'];
$query = "SELECT * FROM rekening_masuk WHERE aksi = '$aksi'";
$hasil = mysqli_query($koneksi, $query);

// kirim data ke json
$data = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

$json = json_encode($data, JSON_PRETTY_PRINT);

// masukkan ke file json data rekening
file_put_contents('dataRekeningMasuk.json', $json);

// untuk tes ke postman
echo $json;

?>