<?php
// menghubungkan php dengan koneksi database
include '../../system/koneksi.php';
// fungsi membuat id otomatis
include '../../function/generate_id.php';
include '../../system/akses_admin.php';


// cek apabila form dikirimkan dari nama buttonnya
if (isset($_POST['tambahguru'])) {
    // ambil data yang dari form
    $nama = $_POST['nama'];
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $no_hp = $_POST['no_hp'];

    // query cek apakah ada username yang sama
    $sql_uniq_email = "SELECT email FROM tb_user WHERE email = '$email'";
    $query_uniq_email = mysqli_query($koneksi, $sql_uniq_email);
    if ($row = mysqli_num_rows($query_uniq_email) > 0) {
        header('location:tambahguru.php?status_email=gagal');
    } else {
        // query tambah tb_user
        $sqluser = "INSERT INTO tb_user(id_user,nama,email,password,level) VALUES('$id_user','$nama_user','$email','$password','guru')";
        // tambahkan ke tabel user
        $query1 = mysqli_query($koneksi, $sqluser);

        // query tambah tb_guru
        $sqlguru = "INSERT INTO tb_guru(id_guru,id_user,nama_guru,gender,no_hp) VALUES('$id_guru','$id_user','$nama','$gender','$no_hp')";
        // tambahkan ke tabel guru
        $query2 = mysqli_query($koneksi, $sqlguru);

        if ($query2 && $query1) {
            $_SESSION['alert'] = "title: 'Berhasil',class: 'bg-success',body : 'Data Berhasil Ditambahkan',delay :2000,autohide:true";

            header('location:dataguru.php');
        } else {
            $_SESSION['alert'] = "title: 'Gagal',class: 'bg-danger',body : 'Data Gagal Ditambahkan',delay :2000,autohide:true";

            header('location:tambahguru.php');
        }
    }
} else {
    die("Akses dilarang..");
}
