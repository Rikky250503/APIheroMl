<?php
require("Koneksi.php");

// $response = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id     = $_POST["id"];
    
    $perintah = "DELETE FROM tbl_heroml WHERE id='$id'";
    
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menghapus Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada kesalahann.Gagal Menghapus Data";
    }
    
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);