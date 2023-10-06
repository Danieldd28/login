<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){

    $data = mysqli_fetch_assoc($login);
    if($data['role']=="guru"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "guru";
        header("location:guru/halaman_guru.php");

    }else if($data['role']=="siswa"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "siswa";
        header("location:siswa/halaman_siswa.php");
    }
}else{
    header("location:index.php?pesan=gagal");
}
?>
