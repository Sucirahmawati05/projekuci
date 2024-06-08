<?php
session_start();
include "../../koneksi.php";

if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal : " . mysqli_connect_error();
    exit();
}
$no_pendaftaran = isset($_POST['no_pendaftaran']) ? mysqli_real_escape_string($koneksi, $_POST['no_pendaftaran']) : '';
$query = "SELECT data_siswa.*, tbl_gel.*
FROM data_siswa
INNER JOIN tbl_gel ON data_siswa.gelombang = tbl_gel.gelombang
WHERE data_siswa.no_pendaftaran = '$no_pendaftaran'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);
}else{

     echo json_encode(array());
}
mysqli_close($koneksi);
