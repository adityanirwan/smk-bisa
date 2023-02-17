<?php
// menghubungkan php dengan koneksi database
include '../system/koneksi.php';
include '../function/generate_id.php';

//  hasilkan random number untuk dimasukkan ke id
// $uniq_iduser = substr((md5(uniqid(rand(), true))), 0, 4);
// $uniq_idguru = substr((md5(uniqid(rand(), true))), 0, 4);

// cek apabila form dikirimkan dari nama buttonnya
if (isset($_POST['tambahguru'])) {
  // ambil data yang dari form
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];

  // query cek apakah ada username yang sama
  $sqlusername = "SELECT * FROM tb_user WHERE username = '$username'";
  $queryusername = mysqli_query($koneksi, $sqlusername);
  if ($row = mysqli_num_rows($queryusername) > 0) {
    header('Location: ../user-admin/admin_tambahguru.php?statususername=gagal');
  } else {
    // query tambah tb_user
    $sqluser = "INSERT INTO tb_user(id_user,username,password,level) VALUES('$id_user','$username','$password','guru')";
    // tambahkan ke tabel user
    $query1 = mysqli_query($koneksi, $sqluser);


    // query tambah tb_guru
    $sqlguru = "INSERT INTO tb_guru(id_guru,id_user,nama_guru,alamat,no_hp) VALUES('$id_guru','$id_user','$nama','$alamat','$no_hp')";

    // tambahkan ke tabel guru
    $query2 = mysqli_query($koneksi, $sqlguru);

    if ($query2 && $query1) {
      header('Location: ../user-admin/admin_dataguru.php');
    } else {
      header('Location: ../user-admin/admin-tambahguru.php');
    }
  }
} else {
  die("Akses dilarang..");
}
