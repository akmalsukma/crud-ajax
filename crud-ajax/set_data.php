<?php
session_start();
include 'koneksi.php';
$nipd = $_POST['nipd'];
$querysql = "SELECT * FROM `siswa` WHERE `siswa`.`nipd` = ?";
$prepare = $conn->prepare($querysql);
$prepare->bind_param('i', $nipd);
$prepare->execute();
$result = $prepare->get_result();
while ($row = $result->fetch_assoc()) {
    $data['nipd'] = $row["nipd"];
    $data['namasiswa'] = $row["namasiswa"];
    $data['tempat_lahir'] = $row["tempat_lahir"];
    $data['tanggal_lahir'] = $row["tanggal_lahir"];
    $data['kelas'] = $row["kelas"];
    $data['umur'] = $row["umur"];
    $data['alamat'] = $row["alamat"];
}
echo json_encode($data);
$conn->close();
