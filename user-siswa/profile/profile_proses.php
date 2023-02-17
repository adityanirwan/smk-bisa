<?php
include '../../system/akses_siswa.php';
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';
// fungsi membuat id otomatis
// include '../function/generate_id.php';
if (isset($_POST['ubahprofile'])) {
  // hanya ubah record siswa
  // ambil data yang dari form
  $id_siswa = $_POST['id_siswa'];
  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['no_hp'];

  $sql = "UPDATE tb_siswa SET nama_siswa='$nama',gender='$gender',no_hp='$no_hp' WHERE id_siswa='$id_siswa'";

  // eksekusi update tabel guru
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Profile Berhasil Diubah',delay :2000,autohide:true";
    header('location:index.php');
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Profile Gagal Diubah',delay :2000,autohide:true";
    header('location:index.php');
  }
} else if (isset($_POST['ubahuser'])) {
  // hanya ubah record user
  // ambil data yang dari form
  $id_siswa = $_POST['id_siswa'];
  $id_user = $_POST['id_user'];
  $nama_user = $_POST['nama_user'];
  $email = $_POST['email'];
  $password = $_POST['password'] == null ? null : $_POST['password'];

  $sql = "";
  if ($password == null) {
    $sql = "UPDATE tb_user SET nama='$nama_user',email='$email' WHERE id_user='$id_user'";
  } else {
    $sql = "UPDATE tb_user SET nama='$nama_user',email='$email',password='$password' WHERE id_user='$id_user'";
  }

  // eksekusi
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data User Berhasil Diubah',delay :2000,autohide:true";
    header('location:index.php');
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data User Gagal Diubah',delay :2000,autohide:true";
    header('location:index.php');
  }
} else {
  die("Akses Dilarang");
}
