<?php
include '../../system/akses_guru.php';
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';
include '../../function/generate_uniq.php';
if (isset($_POST['tambahpel'])) {
  // ambil data yang dari form
  $uniq = generate();
  $nama = $_POST['nama'];
  $deskripsi = $_POST['desc'];

  // query tambah modul
  $sql = "INSERT INTO tb_pelajaran(id_pelajaran,judul_pelajaran,desc_pelajaran) VALUES('$uniq','$nama','$deskripsi')";

  // tambahkan ke tabel modul
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Pelajaran Berhasil Ditambahkan',delay :2000,autohide:true";
    header('Location: daftar_pelajaran.php');
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Pelajaran Gagal Ditambahkan',delay :2000,autohide:true";
    header('Location: tambah_pelajaran.php');
  }
}
// jika dari form edit
else if (isset($_POST['editpel'])) {
  // ambil data yang dari form
  $nama = $_POST['nama'];
  $id_pel = $_POST['idp'];
  $deskripsi = $_POST['desc'];

  // query tambah modul
  $sql = "UPDATE tb_pelajaran
SET judul_pelajaran = '$nama',desc_pelajaran='$deskripsi' WHERE id_pelajaran = '$id_pel'";

  // tambahkan ke tabel modul
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Diubah',delay :2000,autohide:true";
    header('Location: daftar_pelajaran.php');
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Diubah',delay :2000,autohide:true";
    header('Location: edit_pelajaran.php?idp=' . $id_pel);
  }
} else if (isset($_GET['hidp'])) {
  // ambil id yg akan dihapus
  $id_pel = $_GET['hidp'];

  // sql delete
  $sql = "DELETE FROM tb_pelajaran WHERE id_pelajaran = '$id_pel'";

  // hapus data
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Dihapus',delay :2000,autohide:true";
    header('Location:daftar_pelajaran.php');
  }
}
