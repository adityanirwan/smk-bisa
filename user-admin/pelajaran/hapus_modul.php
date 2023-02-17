<?php include '../../system/koneksi.php';

if (isset($_GET['hmd'])) {
  // ambil id yg akan dihapus
  $id_md = $_GET['hmd'];
  $id_pel = $_GET['idp'];

  // sql delete
  $sql = "DELETE FROM tb_modul WHERE id_modul = '$id_md'";

  // hapus data
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    header('Location:materi.php?idp=' . $id_pel);
  }
}
