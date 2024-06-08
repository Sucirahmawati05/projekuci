<?php

include('../../koneksi.php');
// Mendapatkan data dari formulir atau dari sumber lainnya
$id = $_POST['id'];
$gel = $_POST['gelombang'];
$harga = $_POST['harga'];




// Perintah SQL untuk menyimpan data ke dalam tabel


$gel = "UPDATE tbl_gel SET gelombang='$gel',nominal='$harga' WHERE id='$id' ";
if (mysqli_query($koneksi, $gel)) {
    header("location:../input_gelombang.php");
} else {
    echo "Error: " . $gel . "<br>" . mysqli_error($koneksi);
}



// Menutup koneksi
mysqli_close($koneksi);
