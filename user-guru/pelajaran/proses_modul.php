<?php
include '../../system/akses_guru.php';
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';
include '../../function/generate_uniq.php';

// ## PROSES MODUL ## //
if (isset($_POST['tambahmodul'])) {
  // ambil datanya
  $uniq = generate();
  $id_pel = $_POST['idp'];
  $nama = $_POST['modul'];

  // query tambah modul
  $sql = "INSERT INTO tb_modul(id_modul,id_pelajaran,nama_modul) VALUES('$uniq','$id_pel','$nama')";

  // masukkan ke db
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Modul Berhasil Ditambahkan',delay :2000,autohide:true";
    header('Location: daftar_modul.php?idp=' . $id_pel);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Modul Gagal Ditambahkan',delay :2000,autohide:true";
    header('Location: tambah_modul?idp=' . $id_pel);
  }
} else if (isset($_POST['editmodul'])) {
  // ambil data yang dari form
  $id_md = $_POST['idmd'];
  $nama_modul = $_POST['nama_modul'];
  $id_pel = $_POST['idp'];

  // query edit mapel
  $sql = "UPDATE tb_modul
SET nama_modul = '$nama_modul' WHERE id_modul = '$id_md'";

  // tambahkan ke tabel mapel
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Diubah',delay :2000,autohide:true";
    header('Location: daftar_modul.php?idp=' . $id_pel);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Ditambahkan',delay :2000,autohide:true";
    header('Location: edit_mapel.php?idp=' . $id_pel . '&idmd=' . $id_md);
  }
}
// ## /PROSES MODUL ## //