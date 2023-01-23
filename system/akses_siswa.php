<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (isset($_SESSION['level'])) {
    // jika bukan siswa maka arahkan ke halaman not found
    if ($_SESSION['level'] !== "siswa") {
        header("location:../not_found.php");
    }
} else {
    // jika belum login balik ke halaman awal login
    header("location:../index.php");
}
