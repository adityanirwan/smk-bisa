<?php
include "../../system/koneksi.php";
// controller utama saat view di load
// akan menyimpan state dan pengaturan next prev

// ambil id modul ,  ini untuk mencari list materi yang bisa di next dan prev
// cari posisi materi dari id mapel dan materi yg dikirim awal
$id_materi = "";
$id_modul = "";
$id_pel = "";

if (isset($_GET['idmt']) && isset($_GET['idmd'])) {
  $id_materi = $_GET['idmt'];
  $id_modul = $_GET['idmd'];
  $id_pel = $_GET['idp'];
}
$sql_list_materi = "SELECT * FROM tb_materi WHERE id_modul = '$id_modul'";

$urutan_materi = array();
$query = mysqli_query($koneksi, $sql_list_materi);
while ($list_materi = mysqli_fetch_array($query)) {
  array_push($urutan_materi, $list_materi['id_materi']);
}
$next = "";
$prev = "";
$last = false;
if (count($urutan_materi) == 1) {
  $next = false;
  $prev = false;
} else {
  for ($i = 0; $i < count($urutan_materi); $i++) {
    // cari posisi materi sekarang
    if ($urutan_materi[$i] == $id_materi) {
      // cek jika posisi saat ini adalah awal atau akhir array
      if ($urutan_materi[$i] == $urutan_materi[0]) {
        $prev = false;
        $next = $urutan_materi[$i + 1];
      } else if ($urutan_materi[$i] == $urutan_materi[count($urutan_materi) - 1]) {
        $next = false;
        $prev = $urutan_materi[$i - 1];
        $last = true;
      } else {
        $next = $urutan_materi[$i + 1];
        $prev = $urutan_materi[$i - 1];
        $last = false;
      }
    }
  }
}
