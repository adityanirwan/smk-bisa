<?php
// membuat id_user

// mengambil data user dengan id_user paling besar
$query = mysqli_query($koneksi, "SELECT max(id_user) as user_tertinggi FROM tb_user");
$data = mysqli_fetch_array($query);
$id_user = $data['user_tertinggi'];

// mengambil angka dari id_user terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($id_user, 1, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk id_user baru
// perintah sprintf("%04s", $urutan); berguna untuk membuat string menjadi 4 karakter
// misalnya perintah sprintf("%04s", 15); maka akan menghasilkan '0015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya U0015 
$huruf = "U";
$id_user = $huruf . sprintf("%04s", $urutan);

// =============================================================================================
// membuat id_guru
$query = mysqli_query($koneksi, "SELECT max(id_guru) as user_tertinggi FROM tb_guru");
$data = mysqli_fetch_array($query);
$id_guru = $data['user_tertinggi'];

$urutan = (int) substr($id_guru, 1, 3);

$urutan++;

$huruf = "G";
$id_guru = $huruf . sprintf("%03s", $urutan);

// ==================================
// membuat id_siswa
$query = mysqli_query($koneksi, "SELECT max(id_siswa) as user_tertinggi FROM tb_siswa");
$data = mysqli_fetch_array($query);
$id_siswa = $data['user_tertinggi'];

$urutan = (int) substr($id_siswa, 1, 3);

$urutan++;

$huruf = "S";
$id_siswa = $huruf . sprintf("%03s", $urutan);
