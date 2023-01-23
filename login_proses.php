<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'system/koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from tb_user where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:user-admin");

        // cek jika user login sebagai guru
    } else if ($data['level'] == "guru") {
        // buat session login dan username
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = "guru";
        // alihkan ke halaman dashboard guru
        header("location:user-guru");

        // cek jika user login sebagai siswa
    } else if ($data['level'] == "siswa") {
        // buat session login dan username
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = "siswa";
        // alihkan ke halaman dashboard siswa
        header("location:user-siswa");
    } else {

        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
