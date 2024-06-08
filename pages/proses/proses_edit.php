<?php

include ('../../koneksi.php');
// Mendapatkan data dari formulir atau dari sumber lainnya
$id=$_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['username'];
$pass = $_POST['password'];
$sebagai = $_POST['sebagai'];



// Perintah SQL untuk menyimpan data ke dalam tabel


$gel = "UPDATE user SET nama='$nama',username='$user',password='$pass',level='$sebagai' WHERE id='$id'";
if (mysqli_query($koneksi, $gel)) {
    header("location:../registrasi.php");
} else {
    echo "Error: " . $gel . "<br>" . mysqli_error($koneksi);
}



// Menutup koneksi
mysqli_close($koneksi);



?>