<?php
include "../../system/akses_guru.php";
include "../../system/koneksi.php";
// hapus pertanyaan
if (isset($_GET['hidpr'])) {
  // ambil datanya
  $id_pel = $_GET['idp'];
  $id_ks = $_GET['hidks'];

  $cari_id_pertanyaan = "SELECT id_pertanyaan FROM tb_pertanyaan WHERE id_kuis = '$id_ks' ";
  $query_cari_id_pr = mysqli_query($koneksi, $cari_id_pertanyaan);
  $rs_query_id_pr = mysqli_fetch_array($query_cari_id_pr);
  $id_pr = $rs_query_id_pr['id_pertanyaan'];

  // hapus jawaban dulu
  $sql2 = "DELETE FROM tb_jawaban WHERE id_pertanyaan = '$id_pr' ";
  $query = mysqli_query($koneksi, $sql2);
  // hapus pertanyaan
  $sql3 = "DELETE FROM tb_pertanyaan WHERE id_pertanyaan = '$id_pr'";
  $query = mysqli_query($koneksi, $sql3);


  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Dihapus',delay :2000,autohide:true";
    header('location: daftar_pertanyaan.php?idp=' . $id_pel . '&idks=' . $id_ks);
  }
}
