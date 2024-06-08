<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$id = $_POST['id'];

$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");

$cek = mysqli_num_rows($login); 

if($cek > 0){

    $data = mysqli_fetch_assoc($login);
    
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['id'] = $data['id'];
    $_SESSION['level'] = $data['level'];

    if($data['level']=="admin"){

        header("location:admin.php");

    }else if($data['level']=="petugas"){

        header("location:petugas.php");
    }else{
         
        header("location:index.php?pesan=gagal");
    }
}else{        
    header("location:index.php?pesan=gagal"); 
}

?>