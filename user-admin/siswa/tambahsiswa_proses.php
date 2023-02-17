<?php
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';
// fungsi membuat id otomatis
include '../../function/generate_id.php';
include '../../system/akses_admin.php';

// cek apabila form dikirimkan dari nama buttonnya
if (isset($_POST['tambahsiswa'])) {
  // ambil data yang dari form
  $nama = $_POST['nama'];
  $nama_user = $_POST['nama_user'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['no_hp'];
  $kelas = $_POST['kelas'];

  // query cek apakah ada username yang sama
  $sql_uniq_email = "SELECT email FROM tb_user WHERE email = '$email'";
  $query_uniq_email = mysqli_query($koneksi, $sql_uniq_email);
  if ($row = mysqli_num_rows($query_uniq_email) > 0) {
    header('location:tambahsiswa.php?status_email=gagal');
  } else {
    // query tambah tb_user
    $sqluser = "INSERT INTO tb_user(id_user,nama,email,password,level) VALUES('$id_user','$nama_user','$email','$password','siswa')";
    // tambahkan ke tabel user
    $query1 = mysqli_query($koneksi, $sqluser);

    // query tambah tb_guru
    $sqlsiswa = "INSERT INTO tb_siswa(id_siswa,id_user,nama_siswa,kelas,gender,no_hp) VALUES('$id_siswa','$id_user','$nama','$kelas','$gender','$no_hp')";
    // tambahkan ke tabel guru
    $query2 = mysqli_query($koneksi, $sqlsiswa);

    if ($query2 && $query1) {
      $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Ditambahkan',delay :2000,autohide:true";
      header('location:datasiswa.php');
    } else {
      $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Ditambahkan',delay :2000,autohide:true";

      header('location:tambahsiswa.php');
    }
  }
} else {
  die("Akses dilarang..");
}
