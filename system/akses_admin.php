<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if (isset($_SESSION['level'])) {
    // jika bukan admin maka arahkan ke halaman not found
    if ($_SESSION['level'] !== "admin") {
        header("location:../not_found.php");
    }
} else {
    // jika belum login balik ke halaman awal login
    header("location:../index.php");
}
