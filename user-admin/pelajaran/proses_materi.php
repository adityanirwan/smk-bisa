<?php
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';

// ## PROSES MODUL ## //
if (isset($_POST['tambahmodul'])) {
  // ambil datanya
  $id_pel = $_POST['idp'];
  $nama = $_POST['modul'];

  // query tambah modul
  $sql = "INSERT INTO tb_modul(id_modul,id_pelajaran,nama_modul) VALUES('','$id_pel','$nama')";

  // masukkan ke db
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    header('Location: materi.php?idp=' . $id_pel);
  } else {
    header('Location: tambah_modul?idp=' . $id_pel);
  }
} else if (isset($_POST['editmodul'])) {
  // ambil data yang dari form
  $id_md = $_POST['idmd'];
  $nama = $_POST['nama'];
  $id_pel = $_POST['idp'];

  // query edit mapel
  $sql = "UPDATE tb_modul
SET nama_modul = '$nama' WHERE id_modul = '$id_md'";

  // tambahkan ke tabel mapel
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    header('Location: materi.php?idp=' . $id_pel);
  } else {
    header('Location: edit_mapel.php?idp=' . $id_pel . '&idmd=' . $id_md);
  }
}
// ## /PROSES MODUL ## //

// ## PROSES MATERI ## //
else if (isset($_POST['tambahmateri'])) {
  // ambil datanya
  $id_pel = $_POST['idp'];
  $id_modul = $_POST['idmd'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi_materi'];

  $isi = str_replace("'", "&apos;", $isi);

  // siapkan query
  $sql = "INSERT INTO tb_materi(id_materi,id_pelajaran,id_modul,judul_materi,isi_materi) VALUES('','$id_pel','$id_modul','$judul','$isi')";
  // eksekusi
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    header('Location: materi.php?idp=' . $id_pel);
  } else {
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
    header('Location: materi.php?idp=' . $id_pel);
  } else {
    header('Location: edit_materi.php?idp=' . $id_pel . '&idmd=' . $id_md . '&idmt=' . $id_materi);
  }
}
