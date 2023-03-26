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
  $nama_user = $_POST['nama_user'];
  $email = $_POST['email'];
  $password = $_POST['password'] == null ? null : $_POST['password'];

  $sql = "UPDATE tb_siswa SET nama_siswa='$nama',gender='$gender',no_hp='$no_hp' WHERE id_siswa='$id_siswa'";

  // eksekusi update tabel guru
  $query = mysqli_query($koneksi, $sql);

  $sql2 = "";
  if ($password == null) {
    $sql2 = "UPDATE tb_user SET nama='$nama_user',email='$email' WHERE id_user='$id_user'";
  } else {
    $sql2 = "UPDATE tb_user SET nama='$nama_user',email='$email',password='$password' WHERE id_user='$id_user'";
  }

  // eksekusi
  $query2 = mysqli_query($koneksi, $sql2);
  if ($query && $query2) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Profile Berhasil Diubah',delay :2000,autohide:true";
    header('location:index.php');
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Profile Gagal Diubah',delay :2000,autohide:true";
    header('location:index.php');
  }
} else {
  die("Akses Dilarang");
}
