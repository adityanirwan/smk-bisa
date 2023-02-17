<?php
include '../../system/akses_guru.php';
include('../../system/koneksi.php');
include('../../function/generate_uniq.php');
// ## PROSES MATERI ## //
if (isset($_POST['tambahmateri'])) {
  // ambil datanya
  $uniq = generate();
  $id_pel = $_POST['idp'];
  $id_modul = $_POST['idmd'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi_materi'];

  $isi = str_replace("'", "&apos;", $isi);

  // siapkan query
  $sql = "INSERT INTO tb_materi(id_materi,id_pelajaran,id_modul,judul_materi,isi_materi) VALUES('$uniq','$id_pel','$id_modul','$judul','$isi')";
  // eksekusi
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Ditambahkan',delay :2000,autohide:true";
    header('Location: daftar_modul.php?idp=' . $id_pel);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Ditambahkan',delay :2000,autohide:true";
    header('Location: tambah_materi.php?idp=' . $id_pel . '&idmd=' . $id_modul);
  }
} else if (isset($_POST['editmateri'])) {
  // ambil datanya
  $id_pel = $_POST['idp'];
  $id_md = $_POST['idmd'];
  $id_materi = $_POST['idmt'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi_materi'];

  $isi = str_replace("'", "&apos;", $isi);

  // siapkan query
  $sql = "UPDATE tb_materi SET judul_materi='$judul',isi_materi='$isi' WHERE id_materi= '$id_materi' ";
  // eksekusi
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Diubah',delay :2000,autohide:true";
    header('Location: daftar_modul.php?idp=' . $id_pel);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Diubah',delay :2000,autohide:true";
    header('Location: edit_materi.php?idp=' . $id_pel . '&idmd=' . $id_md . '&idmt=' . $id_materi);
  }
}
// proses hapus materi
else if (isset($_GET['hidmt'])) {
  $id_mt = $_GET['hidmt'];
  $id_pel = $_GET['idp'];

  $sql = "DELETE FROM tb_materi WHERE id_materi = '$id_mt'";
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Dihapus',delay :2000,autohide:true";
    header('Location: daftar_modul.php?idp=' . $id_pel);
  } else {
    header('Location: daftar_modul.php?idp=' . $id_pel);
  }
}
