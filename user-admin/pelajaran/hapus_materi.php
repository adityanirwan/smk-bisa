<?php include '../../system/koneksi.php';

if (isset($_GET['hmt'])) {
  // ambil id yg akan dihapus
  $id_mt = $_GET['hmt'];
  $id_pel = $_GET['idp'];

  // sql delete
  $sql = "DELETE FROM tb_materi WHERE id_materi = '$id_mt'";

  // hapus data
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    header('Location:materi.php?idp=' . $id_pel);
  }
}
