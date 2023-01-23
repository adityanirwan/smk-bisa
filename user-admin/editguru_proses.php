<?php
// menghubungkan php dengan koneksi database
include '../system/koneksi.php';
// fungsi membuat id otomatis
// include '../function/generate_id.php';
if (isset($_POST['ubahguru'])) {
  // hanya ubah record guru
  // ambil data yang dari form
  $id_guru = $_POST['id_guru'];
  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['no_hp'];

  $sql = "UPDATE tb_guru SET nama_guru='$nama',gender='$gender',no_hp='$no_hp' WHERE id_guru='$id_guru'";

  // eksekusi update tabel guru
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    header('location:../user-admin/dataguru.php');
  } else {
    header('location:../user-admin/dataguru.php?id_user=' . $id_user);
  }
} else if (isset($_POST['ubahuser'])) {
  // hanya ubah record user
  // ambil data yang dari form
  $id_guru = $_POST['id_guru'];
  $id_user = $_POST['id_user'];
  $nama_user = $_POST['nama_user'];
  $email = $_POST['email'];
  $password = $_POST['password'] == null ? null : $_POST['password'];

  $sql = "";
  if ($password == null) {
    $sql = "UPDATE tb_user SET nama='$nama_user',email='$email' WHERE id_user='$id_user'";
  } else {
    $sql = "UPDATE tb_user SET nama='$nama_user',email='$email',password='$password' WHERE id_user='$id_user'";
  }

  // eksekusi
  $query = mysqli_query($koneksi, $sql);
  if ($query) {
    header('location:../user-admin/dataguru.php');
  } else {
    header('location:../user-admin/dataguru.php?id_user=' . $id_user);
  }
} else {
  die("Akses Dilarang");
}
