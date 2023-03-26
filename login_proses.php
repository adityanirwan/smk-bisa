<?php

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'system/koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// buat session yang digunakan untuk alert
$_SESSION['alert'] = "";

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from tb_user where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {
        //alert
        $_SESSION['alert'] = "title: 'Login Sukses',class: 'bg-success',
        body : 'Selamat Datang',delay :2000,autohide:true";

        // buat session login dan username
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:user-admin/dashboard");

        // cek jika user login sebagai guru
    } else if ($data['level'] == "guru") {
        $q_guru = mysqli_query($koneksi, "select * from tb_guru where id_user = '$data[id_user]'");
        $dataguru = mysqli_fetch_assoc($q_guru);

        //alert
        $_SESSION['alert'] = "title: 'Login Sukses',class: 'bg-success',
        body : 'Selamat Datang',delay :2000,autohide:true";

        // buat session login dan username
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = "guru";
        if ($dataguru['foto'] != null) {
            $_SESSION['foto'] = $dataguru['foto'];
        }
        // alihkan ke halaman dashboard guru
        header("location:user-guru/dashboard");

        // cek jika user login sebagai siswa
    } else if ($data['level'] == "siswa") {
        $q_siswa = mysqli_query($koneksi, "select * from tb_siswa where id_user = '$data[id_user]'");
        $datasiswa = mysqli_fetch_assoc($q_siswa);

        //alert
        $_SESSION['alert'] = "title: 'Login Sukses',class: 'bg-success',
        body : 'Selamat Datang',delay :2000,autohide:true";

        // buat session login dan username
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = "siswa";
        if ($datasiswa['foto'] != null) {
            $_SESSION['foto'] = $datasiswa['foto'];
        }
        // alihkan ke halaman dashboard siswa
        header("location:user-siswa/dashboard");
    } else {
        //alert
        $_SESSION['alert'] = "title: 'Login Gagal',class: 'bg-danger',
        body : 'Username Atau Password Salah',delay :2000";

        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    //alert
    $_SESSION['alert'] = "title: 'Login Gagal',class: 'bg-danger',
    body : 'Username Atau Password Salah',delay :2000,autohide:true";

    header("location:index.php?pesan=gagal");
}
