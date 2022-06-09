<?php
session_start();

$koneksi = mysqli_connect('localhost', 'root', '', 'qasir');

if (isset($_POST['login'])) {
    //initial variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $hitung = mysqli_num_rows($check);

    if ($hitung > 0) {
        //jika datanya ada, dan ditemukan
        //berhasil login
        $_SESSION['login'] = true;
        header('location:index.php');
    } else {
        //Datanya g ada
        //gagal Login
        echo'
        <script>
        alert("Username atau Password salah")
        windows.location.href="login.php"
        </script>';
    }
}
if(isset($POST['tambahproduk'])){
    //deskripsi initial variabel
    $nama_produk = $_POST['nama_produk'];
    $judul = $_POST ['judul'];
    $harga = $_POST ['harga'];
    $stok = $_POST ['stok'];

    $insert_produk = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, judul, harga, stok) 
    VALUES ('$nama_produk', '$judul', '$harga', '$stok')");

    if ($insert_produk) {
        header('location:stok.php');
    } else {
        echo'
        <script>
        alert("Gagal Tambah Produk")
        windows.location.href="stok.php"
        </script>';
    }    
}