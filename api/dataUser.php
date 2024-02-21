<?php 
require '../function/functions.php';

$level = $_GET['level'];
if (empty($_GET['level'])) {
    echo '{"status" : "Error", "Message" : "level is required!"}';
    exit();
}

// buat xml
$xml = new SimpleXMLElement('<rss version="2.0"/>');

$query = "SELECT * FROM users WHERE level = '$level'";
$hasil = mysqli_query($koneksi, $query);

// kirim data ke json
$data = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;

    // masukkin data ke XML
    $track = $xml -> addChild('users');
    $track -> addChild('id_user', $row['id_user']);
    $track -> addChild('email', $row['email']);
    $track -> addChild('username', $row['username']);
    $track -> addChild('password', $row['password']);
    $track -> addChild('status', $row['status']);
    $track -> addChild('level', $row['level']);
    $track -> addChild('no_rek', $row['no_rek']);
}

$json = json_encode($data, JSON_PRETTY_PRINT);

// masukkan ke file dataUser.json
file_put_contents('dataUser.json', $json);

// untuk tes json ke postman
echo $json;

// pakai DOMDocument untuk percantik simpleXML
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom_xml = dom_import_simplexml($xml);
$dom_xml = $dom->importNode($dom_xml, true);
$dom_xml = $dom->appendChild($dom_xml);

// masukkan ke file dataUser.xml
$dom -> save('dataUser.xml');

// untuk tes XML ke postman
echo '<pre>' . $dom->saveXML() . '</pre>';
?>

<?xml version="1.0"?>
<rss version="2.0">
  <users>
    <id_user>5</id_user>
    <email>sayyid@gmail.com</email>
    <username>sayyid</username>
    <password>$2y$10$WSON4kW4uyF0dYWbq9Nt9OWD5T9FZLKjI6bNdzcGS0iN0cKe/3uH2</password>
    <status>tidak aktif</status>
    <level>user</level>
    <no_rek>454290896580</no_rek>
  </users>
  <users>
    <id_user>6</id_user>
    <email>m.azmirizkifar20@gmail.com</email>
    <username>azmirf</username>
    <password>$2y$10$ErUrbT5.3iTTMXivOOiO9urUCDGOqh/l6h4gD5sTSGgF1EIFtyHNq</password>
    <status>aktif</status>
    <level>user</level>
    <no_rek>689583977372</no_rek>
  </users>
  <users>
    <id_user>7</id_user>
    <email>dina@gmail.com</email>
    <username>dina</username>
    <password>$2y$10$3mk81yxt7UUMq3kVJzr4xugs0vRebNyivNXEQOvH8g.KDNPJtDEfm</password>
    <status>aktif</status>
    <level>user</level>
    <no_rek>490528404584</no_rek>
  </users>
  <users>
    <id_user>13</id_user>
    <email>alfath@gmail.com</email>
    <username>alfath</username>
    <password>$2y$10$PTV8IDx3hMmYHU26VkiXGeHWItuiwMYGOOH7/OF.Y7HAjJ1UH9fFG</password>
    <status>tidak aktif</status>
    <level>user</level>
    <no_rek>780958771108</no_rek>
  </users>
  <users>
    <id_user>15</id_user>
    <email>dira@gmail.com</email>
    <username>dira</username>
    <password>$2y$10$6lz4VRxoMTkBaFtXeEZnSO4nGPlrLcTRLc8l5I9J0fn2QgIk2Iud6</password>
    <status>aktif</status>
    <level>user</level>
    <no_rek>283489028166</no_rek>
  </users>
  <users>
    <id_user>16</id_user>
    <email>kharis@gmail.com</email>
    <username>kharis</username>
    <password>$2y$10$a4TwLN0N4Z.iKQk557X3dOLErpn3egZdWKmYCSuEh7gE6n9kARPGC</password>
    <status>aktif</status>
    <level>user</level>
    <no_rek>691921290999</no_rek>
  </users>
</rss>
