<?php 
    include"koneksi.php";

    $nipd = $_POST['nipd'];

    $query = "DELETE FROM `siswa` WHERE `siswa`.`nipd` = ? ";
    $prepare = $conn->prepare($query);
    $prepare->bind_param("i", $nipd);
    $prepare->execute();
    
    echo json_encode(['success' => 'Berhasil!']);
    
    $conn->close();

?>