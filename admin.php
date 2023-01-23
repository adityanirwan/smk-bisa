<?php
session_start();

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == "admin") {
        header("location:admin_dashboard.php");
    } elseif ($_SESSION['level'] == "guru") {
        header("location:user-guru");
    } elseif ($_SESSION['level'] == "siswa") {
        header("location:user-siswa");
    }
} else {
    header("location:index.php");
}
