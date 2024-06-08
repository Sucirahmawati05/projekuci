<?php

include ('../../koneksi.php');
$id = $_GET['id'];

$id = mysqli_real_escape_string($koneksi, $id);
// Mendapatkan data dari formulir atau dari sumber lainnya

$result = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
echo "<script> 
alert('BERAHASIL DI HAPUSS');
</script>";
header("Location: ../registrasi.php");
}


?>