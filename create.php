<?php
require("Koneksi.php");

$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $role = $_POST["role"];
    $lane = $_POST["lane"];
    $tahun_rilis = $_POST["tahun_rilis"];
    $des_hero = $_POST["des_hero"];
    $skill1 = $_POST["skill1"];
    $des1 = $_POST["des1"];
    $skill2 = $_POST["skill2"];
    $des2 = $_POST["des2"];
    $skill3 = $_POST["skill3"];
    $des3 = $_POST["des3"];
    $foto = $_POST["foto"];
    
    
    $perintah = "INSERT INTO tbl_heroml(nama, role, lane, tahun_rilis, des_hero, skill1, des1, skill2, des2, skill3, des3, foto) VALUES('$nama', '$role', '$lane', '$tahun_rilis', '$des_hero', '$skill1', '$des1', '$skill2', '$des2', '$skill3', '$des3', '$foto')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada kesalahann.Gagal Menyimpan Data";
    }
    
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);