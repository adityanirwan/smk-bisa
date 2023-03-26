<?php
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';
// fungsi membuat id otomatis
// include '../function/generate_id.php';
include '../../system/akses_admin.php';
include '../../function/generate_uniq.php';




if (isset($_POST['ubahguru'])) {
  // hanya ubah record guru
  // ambil data yang dari form
  $id_guru = $_POST['id_guru'];
  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['no_hp'];
  $nama_user = $_POST['nama_user'];
  $email = $_POST['email'];
  $password = $_POST['password'] == null ? null : $_POST['password'];

  // minta data guru yg diedit
  $sql_dataguru = "SELECT *
  FROM tb_user
  JOIN tb_guru ON tb_guru.id_user = tb_user.id_user
  WHERE tb_guru.id_guru='$id_guru' ";
  $q_dataguru = mysqli_query($koneksi, $sql_dataguru);
  $data_guru = mysqli_fetch_array($q_dataguru);


  // proses upload foto
  $ekstensi_diperbolehkan  = array('png', 'jpg');
  $namafoto = $_FILES['foto']['name'];
  $x = explode('.', $namafoto);
  $ekstensi = strtolower(end($x));
  $ukuran  = $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];
  $ukuran_max = 1500000; // +- 1.5mb


  if ($_FILES['foto']['size'] != 0) {

    $namabaru = 'fotoguru-' . generate() . "." . $ekstensi;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === TRUE) {
      // jika foto sudah ada hapus sebelum diganti
      if ($data_guru['foto'] != null) {
        // hapus foto sebelumnya
        unlink('../../uploads/' . $data_guru['foto']);
      }
      if ($ukuran < $ukuran_max) {
        move_uploaded_file($file_tmp, '../../uploads/' . $namabaru);
      } else {
        $_SESSION['alert'] = "title: 'Gagal Upload',class: 'bg-danger',body : 'Ukurang Gambar Terlalu Besar',delay :2000,autohide:true";

        header('location:editguru.php?id_user=' . $id_user);
      }
      $sql = "UPDATE tb_guru SET nama_guru='$nama',gender='$gender',no_hp='$no_hp',foto='$namabaru' WHERE id_guru='$id_guru'";
    } else {
      // ekstensi tidak diperbolehkan
      $_SESSION['alert'] = "title: 'Gagal Upload',class: 'bg-danger',body : 'Extensi Tidak diperbolehkan',delay :2000,autohide:true";

      header('location:editguru.php?id_user=' . $id_user);
    }
  } else if ($_FILES['foto']['size'] == 0) {
    $sql = "UPDATE tb_guru SET nama_guru='$nama',gender='$gender',no_hp='$no_hp' WHERE id_guru='$id_guru'";
  }




  $sql2 = "";
  if ($password == null) {
    $sql2 = "UPDATE tb_user SET nama='$nama_user',email='$email' WHERE id_user='$id_user'";
  } else {
    $sql2 = "UPDATE tb_user SET nama='$nama_user',email='$email',password='$password' WHERE id_user='$id_user'";
  }

  // eksekusi
  $query = mysqli_query($koneksi, $sql);

  // eksekusi update tabel guru
  $query2 = mysqli_query($koneksi, $sql2);
  if ($query && $query2) {
    $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Diubah',delay :2000,autohide:true";

    header('location:dataguru.php');
  } else {
    $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Diubah',delay :2000,autohide:true";
    header('location:editguru.php?id_user=' . $id_user);
  }
} else {
  die("Akses Dilarang");
}
