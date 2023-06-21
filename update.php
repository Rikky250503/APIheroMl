<?php
require("Koneksi.php");

$response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $id = $_POST["id"];
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
    
    $perintah = "UPDATE tbl_heroml SET nama ='$nama', role ='$role', lane = '$lane' , tahun_rilis = '$tahun_rilis', des_hero = '$des_hero', skill1 = '$skill1', des1 = '$des1', skill2 = '$skill2', des2 = '$des2', skill3 = '$skill3', des3 = '$des3', foto = '$foto' WHERE id='$id'";
    
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada kesalahann.Gagal Mengubah Data";
    }
    
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);