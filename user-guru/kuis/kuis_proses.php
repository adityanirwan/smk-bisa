<?php
include "../../system/akses_guru.php";
include "../../system/koneksi.php";
include "../../function/generate_uniq.php";
// saat ada proses dari tambah kuis
if (isset($_POST['tambahkuis'])) {
  // ambil datanya
  $uniq = generate();
  $id_pel = $_POST['idp'];
  $id_md = $_POST['idmd'];
  $judul = $_POST['judul'];
  $desc = $_POST['desc_kuis'];
  $waktu = $_POST['waktu'];
  // siapkan perintah sql
  $sql = "INSERT INTO tb_kuis(id_kuis,id_modul,judul,deskripsi_kuis,waktu) VALUES('$uniq','$id_md','$judul','$desc','$waktu')";
  // eksekusi
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Ditambahkan',delay :2000,autohide:true";
    header('location: ../pelajaran/daftar_modul.php?idp=' . $id_pel);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Ditambahkan',delay :2000,autohide:true";
    header('location:tambah_kuis.php?idp=' . $id_pel . '&idmd=' . $id_md);
  }
}
//edit kuis
else if (isset($_POST['editkuis'])) {
  // ambil datanya
  $id_pel = $_POST['idp'];
  $id_ks = $_POST['idks'];
  $judul = $_POST['judul'];
  $desc = $_POST['desc_kuis'];
  $waktu = $_POST['waktu'];

  $desc = str_replace("'", "&apos;", $desc);
  // siapkan perintah sql
  $sql = "UPDATE tb_kuis SET judul='$judul',deskripsi_kuis='$desc',waktu='$waktu' WHERE id_kuis = '$id_ks'";
  // eksekusi
  $query = mysqli_query($koneksi, $sql);

  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Diubah',delay :2000,autohide:true";
    header('location: ../pelajaran/daftar_modul.php?idp=' . $id_pel);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Diubah',delay :2000,autohide:true";
    header('location:edit_kuis.php?idp=' . $id_pel . '&idmd=' . $id_md);
  }
}
// hapus kuis
else if (isset($_GET['idp']) && isset($_GET['hidks'])) {
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
  //hapus kuis
  $sql = "DELETE FROM tb_kuis WHERE id_kuis='$id_ks'";
  $query = mysqli_query($koneksi, $sql);


  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Dihapus',delay :2000,autohide:true";
    header('location: daftar_pertanyaan.php?idp=' . $id_pel . '&idks=' . $id_ks);
  }
}

// menambah pertanyaan dan jawaban
else if (isset($_POST['tambahpertanyaan'])) {
  //uniq 1 untuk id pertanyaan
  $uniq1 = generate();
  $id_ks = $_POST['idks'];
  $id_pel = $_POST['idp'];
  // ambil data soalnya dulu
  $soal = $_POST['soal'];
  $sql1 = "INSERT INTO tb_pertanyaan(id_pertanyaan,id_kuis,isi_pertanyaan) VALUES('$uniq1','$id_ks','$soal')";

  $query1 = mysqli_query($koneksi, $sql1);

  // ambil data jawaban
  $jawaban0 = $_POST['jawaban1'];
  $jawaban1 = $_POST['jawaban2'];
  $jawaban2 = $_POST['jawaban3'];
  $jawaban3 = $_POST['jawaban4'];

  //untuk memasukan data ke jawaban
  for ($i = 0; $i < 4; $i++) {
    $uniq = generate();
    $benar = $i == 0 ? 1 : 0;
    $inp = ${"jawaban" . $i};
    $sql2 = "INSERT INTO tb_jawaban(id_jawaban,id_pertanyaan,isi_jawaban,benar) VALUES('$uniq','$uniq1','$inp','$benar')";

    $query2 = mysqli_query($koneksi, $sql2);
  }
  if ($query1 && $query2) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Ditambahkan',delay :2000,autohide:true";
    header('location: daftar_pertanyaan.php?idp=' . $id_pel . '&idks=' . $id_ks);
  }
}

// proses dari edit jawaban
else if (isset($_POST['editjawaban'])) {
  $id_ks = $_POST['idks'];
  $id_md = $_POST['idmd'];
  $id_pr = $_POST['idpr'];
  $soal = $_POST['soal'];
  $jawaban1 = $_POST['jawaban1'];
  $jawaban2 = $_POST['jawaban2'];
  $jawaban3 = $_POST['jawaban3'];
  $jawaban4 = $_POST['jawaban4'];

  for ($i = 0; $i < 4; $i++) {
    // prepare
    $sql = "UPDATE tb_jawaban SET jawaban_benar='$jawaban1',jawaban2='$jawaban2',jawaban3='$jawaban3',jawaban4='$jawaban4' WHERE id_kuis='$id_ks'";
    // eksekusi
    $query = mysqli_query($koneksi, $sql);
  }
  if ($query) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Diubah',delay :2000,autohide:true";
    header('location:daftar_pertanyaan.php?idmd=' . $id_md);
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Diubah',delay :2000,autohide:true";
    header('location:edit_jawabaan?idmd=' . $id_md . '&idks=' . $id_ks);
  }
}
