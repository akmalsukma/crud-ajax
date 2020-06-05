<?php
session_start();
include 'koneksi.php';

$nipd = stripslashes(strip_tags(htmlspecialchars($_POST['nipd'], ENT_QUOTES)));
$namasiswa = stripslashes(strip_tags(htmlspecialchars($_POST['namasiswa'], ENT_QUOTES)));
$tempat_lahir = stripslashes(strip_tags(htmlspecialchars($_POST['tempat_lahir'], ENT_QUOTES)));
$tanggal_lahir = stripslashes(strip_tags(htmlspecialchars($_POST['tanggal_lahir'], ENT_QUOTES)));
$kelas = stripslashes(strip_tags(htmlspecialchars($_POST['kelas'], ENT_QUOTES)));
$umur = stripslashes(strip_tags(htmlspecialchars($_POST['umur'], ENT_QUOTES)));
$alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));

if ($nipd != "") {
    $query = "UPDATE siswa SET namasiswa = ?, tempat_lahir = ?, tanggal_lahir = ?, kelas = ?, umur = ?, alamat = ? WHERE siswa.nipd = ?;";
    $prepare = $conn->prepare($query);
    $prepare->bind_param("sssssi", $namasiswa, $tempat_lahir , $tanggal_lahir, $kelas, $umur, $alamat , $nipd);
    $prepare->execute();
    echo $query;
} else {
    $query = "INSERT INTO `siswa` (`namasiswa`, `tempat_lahir`, `tanggal_lahir`, `kelas`, `umur`, `alamat`) VALUES (?, ?, ?, ?, ?, ?);";
    $prepare = $conn->prepare($query);
    $prepare->bind_param("sssss", $namasiswa, $tempat_lahir , $tanggal_lahir, $kelas, $umur, $alamat);
    $prepare->execute();
    echo $query;
}

echo json_encode(['success' => 'Berhasil!']);

$conn->close();