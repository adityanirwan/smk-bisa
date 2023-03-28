<?php
include("../../system/koneksi.php");
include("../../system/akses_admin.php");

// delete siswa dari id siswa
if (isset($_GET['ids'])) {
  $id_siswa = $_GET['ids'];

  // ambil data dari id guru untuk dapat id usernya
  $sql_siswa = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'";
  $query_siswa = mysqli_query($koneksi, $sql_siswa);
  $data_siswa = mysqli_fetch_array($query_siswa);
  $id_user = $data_siswa['id_user'];

  // unlink foto jika ada
  if ($data_siswa['foto'] != null) {
    // hapus foto sebelumnya
    unlink('../../uploads/' . $data_siswa['foto']);
  }
  // delete tb user dulu
  $sql_deluser = "DELETE FROM tb_user WHERE id_user='$id_user'";
  $query_deluser = mysqli_query($koneksi, $sql_deluser);

  // delete tb siswa
  $sql_delsiswa = "DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'";
  $query_delsiswa = mysqli_query($koneksi, $sql_delsiswa);

  if ($query_delsiswa && $query_deluser) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Dihapus',delay :2000,autohide:true";
    header('location:datasiswa.php');
  }
} else {
  die("Akses Dilarang");
}
