<?php

include ('../../koneksi.php');
// Mendapatkan data dari formulir atau dari sumber lainnya
$gel = $_POST['gelombang'];
$harga = $_POST['harga'];




// Perintah SQL untuk menyimpan data ke dalam tabel


$gel = "INSERT INTO tbl_gel (gelombang,nominal) VALUES ('$gel', '$harga')";
if (mysqli_query($koneksi, $gel)) {
    header("location:../input_gelombang.php");
} else {
    echo "Error: " . $gel . "<br>" . mysqli_error($koneksi);
}



// Menutup koneksi
mysqli_close($koneksi);



?>