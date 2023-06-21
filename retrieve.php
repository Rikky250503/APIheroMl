<?php
require("Koneksi.php");

$perintah = "SELECT * FROM tbl_heroml";
$eksekusi = mysqli_query($connect,$perintah);

$cek = mysqli_affected_rows($connect); 
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama"] = $get->nama;
        $var["role"] = $get->role;
        $var["lane"] = $get->lane;
        $var["tahun_rilis"] = $get->tahun_rilis;
        $var["des_hero"] = $get->des_hero;
        $var["skill1"] = $get->skill1;
        $var["des1"] = $get->des1;
        $var["skill2"] = $get->skill2;
        $var["des2"] = $get->des2;
        $var["skill3"] = $get->skill3;
        $var["des3"] = $get->des3;
        $var["foto"] = $get->foto;
        
        
        array_push($response["data"], $var);
    }
}
 else{
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($connect);