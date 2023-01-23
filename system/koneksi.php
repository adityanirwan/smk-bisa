<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'db_smkbisa'; // Nama databasenya
// $base_url = 'http://localhost/kuliah/smk-bisa/'; // Set Base Url Web

// Koneksi ke MySQL dengan MySQLi
$koneksi = mysqli_connect($host, $username, $password, $database);
