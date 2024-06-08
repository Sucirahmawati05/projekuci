<?php
include('../../koneksi.php');
$no_pendaftaran = $_POST['no_pendaftaran'];
$tanggal = $_POST['tanggal'];
$sisa  = $_POST['bayar'] + $_POST['ba'];
$awal = $_POST['ba'];
$kembali = $_POST['kembalian'];
$keterangan = $_POST['keterangan'];
$sisabayar=$_POST['bayar'] - $_POST['sisaba'];


$update_siswa_query = "UPDATE data_bayar SET bayar=?, kembalian=?,sisa=?, keterangan=? WHERE no_pendaftaran=?";
if ($stmt = mysqli_prepare($koneksi, $update_siswa_query)) {
    mysqli_stmt_bind_param($stmt,"iisss", $sisa, $kembalian,$sisabayar,$keterangan, $no_pendaftaran);

    if (mysqli_stmt_execute($stmt)) {
        header("location:../data_pembayaran.php");
    }else{
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
}else{
    echo "Error: " . mysqli_error($koneksi);
}
mysqli_close($koneksi);