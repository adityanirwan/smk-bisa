<?php
include '../../system/koneksi.php';
include '../../system/akses_admin.php';
// delete guru lewat id guru
if (isset($_GET['idg'])) {
  $id_guru = $_GET['idg'];

  // ambil data dari id guru untuk dapat id usernya
  $sql_guru = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru'";
  $query_guru = mysqli_query($koneksi, $sql_guru);
  $data_guru = mysqli_fetch_array($query_guru);
  $id_user = $data_guru['id_user'];

  // delete tb user dulu
  $sql_deluser = "DELETE FROM tb_user WHERE id_user='$id_user'";
  $query_deluser = mysqli_query($koneksi, $sql_deluser);

  // delete tb guru
  $sql_delguru = "DELETE FROM tb_guru WHERE id_guru='$id_guru'";
  $query_delguru = mysqli_query($koneksi, $sql_delguru);

  if ($query_delguru && $query_deluser) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Dihapus',delay :2000,autohide:true";
    header('location:dataguru.php');
  }
}
