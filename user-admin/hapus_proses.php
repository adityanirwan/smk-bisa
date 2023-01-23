<?php
include("../system/koneksi.php");
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
    header('location:../user-admin/dataguru.php');
  }
}
// delete siswa dari id siswa
else if (isset($_GET['ids'])) {
  $id_siswa = $_GET['ids'];

  // ambil data dari id guru untuk dapat id usernya
  $sql_siswa = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'";
  $query_siswa = mysqli_query($koneksi, $sql_siswa);
  $data_siswa = mysqli_fetch_array($query_siswa);
  $id_user = $data_siswa['id_user'];

  // delete tb user dulu
  $sql_deluser = "DELETE FROM tb_user WHERE id_user='$id_user'";
  $query_deluser = mysqli_query($koneksi, $sql_deluser);

  // delete tb siswa
  $sql_delsiswa = "DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'";
  $query_delsiswa = mysqli_query($koneksi, $sql_delsiswa);

  if ($query_delsiswa && $query_deluser) {
    header('location:../user-admin/datasiswa.php');
  }
} else {
  die("Akses Dilarang");
}
