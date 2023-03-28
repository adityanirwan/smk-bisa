<?php

include './proses_nilai.php';
include '../../system/koneksi.php';
include '../../function/generate_uniq.php';

if (isset($_POST['simpankuis'])) {
  // ambil data 
  print_r($_POST);
  $dt = date("Y-m-d H:i:s");
  $id_pel = $_POST['idp'];
  $id_md = $_POST['idmd'];
  $id_kuis = $_POST['id_kuis'];
  $id_user = $_POST['id_user'];

  // cari id siswa berdasarkan id user
  $cari_id_siswa = "SELECT * FROM tb_siswa WHERE id_user = '$id_user'";
  $query_cari_siswa = mysqli_query($koneksi, $cari_id_siswa);
  $rs_siswa = mysqli_fetch_array($query_cari_siswa);
  $id_siswa = $rs_siswa['id_siswa'];

  // untuk mengambil pertanyaan dan jawaban harus tau dulu ada berapa pertanyaan
  $cari_jumlah_pertanyaan = "SELECT COUNT(id_pertanyaan) as jumlah_pertanyaan FROM tb_pertanyaan WHERE id_kuis='$id_kuis' ";
  $query = mysqli_query($koneksi, $cari_jumlah_pertanyaan);
  $rs_jml_pertanyaan = mysqli_fetch_array($query);
  $jml_pertanyaan = $rs_jml_pertanyaan['jumlah_pertanyaan'];
  //print_r($jml_pertanyaan);

  // cari dulu apakah ada id jawaban tersimpan berdasarkan idkuis dan id user
  $sql_cari_jawaban_tersimpan = "SELECT id_simpan FROM tb_jawaban_tersimpan WHERE id_kuis='$id_kuis' AND id_user='$id_user'";
  $q_cari_jawaban_tersimpan = mysqli_query($koneksi, $sql_cari_jawaban_tersimpan);
  $jml_id_jawaban_tersimpan = 0;
  // $jml_id_jawaban_tersimpan = mysqli_num_rows($q_cari_jawaban_tersimpan);
  // masukan data ID tersimpan ke array
  $id_tersimpan = array();
  while ($rs = mysqli_fetch_array($q_cari_jawaban_tersimpan)) {
    array_push($id_tersimpan, $rs['id_simpan']);
    $jml_id_jawaban_tersimpan += 1;
  }


  // lakukan perulangan untuk pertanyaan dan jawaban
  $sql = "";
  $no = 1;
  for ($i = 0; $i < $jml_pertanyaan; $i++) {
    // ambil data nya
    $id_pertanyaan = $_POST['id_pertanyaan' . $no];
    $id_jawaban = $_POST['jawaban' . $no];


    if ($id_tersimpan[$i] != null) {
      // jika masih ada update saja
      $sql .= "UPDATE tb_jawaban_tersimpan SET id_jawaban='$id_jawaban',id_pertanyaan='$id_pertanyaan',dt='$dt' WHERE id_simpan='$id_tersimpan[$i]';";
    } else {
      $uniq = generate();
      // jika blm ditemukan maka insert
      $sql .= "INSERT INTO tb_jawaban_tersimpan(id_simpan,id_kuis,id_pertanyaan,id_jawaban,id_user,dt) VALUES('$uniq','$id_kuis','$id_pertanyaan','$id_jawaban','$id_user','$dt');";
    }

    $no += 1;
  }
  $rs_simpan_jawaban = mysqli_multi_query($koneksi, $sql);
  if ($rs_simpan_jawaban) {
    mysqli_next_result($koneksi);
    // proses hitung nilai
    // cari hanya jawaban benar
    $sql_nilai = "SELECT * FROM `tb_jawaban` JOIN tb_jawaban_tersimpan ON tb_jawaban.id_jawaban = tb_jawaban_tersimpan.id_jawaban WHERE  tb_jawaban_tersimpan.id_user='$id_user' AND tb_jawaban.benar = '1' AND tb_jawaban_tersimpan.id_kuis = '$id_kuis'";
    $query_nilai = mysqli_query($koneksi, $sql_nilai);
    if ($query_nilai) {
      $sql_input_nilai = "";
      $jawaban_benar = mysqli_num_rows($query_nilai);
      $nilai = hitungNilai($jawaban_benar, $jml_pertanyaan);

      // cari dulu apakah sudah pernah melakukan kuis
      $sql_cari_kuis_selesai = "SELECT id_kuis_selesai FROM tb_kuis_selesai WHERE id_kuis='$id_kuis' AND id_siswa='$id_siswa'";
      $q_cari_kuis_selesai = mysqli_query($koneksi, $sql_cari_kuis_selesai);


      // jika ada maka update
      if (!empty($rs_kuis_selesai = mysqli_fetch_array($q_cari_kuis_selesai))) {
        $sql_input_nilai = "UPDATE tb_kuis_selesai SET nilai='$nilai',dt='$dt' WHERE id_kuis_selesai='$rs_kuis_selesai[id_kuis_selesai]'";
      } else {
        // jika blm melakukan kuis sebelumnya
        $uniq2 = generate();
        // masukkan ke kuis selesai
        $sql_input_nilai = "INSERT INTO tb_kuis_selesai(id_kuis_selesai,id_siswa,id_kuis,nilai,dt) VALUES('$uniq2','$id_siswa','$id_kuis','$nilai','$dt')";
      }

      $query_input_nilai = mysqli_query($koneksi, $sql_input_nilai);

      if ($query_input_nilai) {
        header('Location: preview_kuis.php?idp=' . $id_pel . '&idmd=' . $id_md . '&idks=' . $id_kuis);
      } else {
        header('Location: preview_kuis.php?idp=' . $id_pel . '&idmd=' . $id_md . '&idks=' . $id_kuis);
      }
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
  }
}
