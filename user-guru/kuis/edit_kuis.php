<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');
$id_pel = null;
$id_md = null;
if (isset($_GET['idp']) && isset($_GET['idks'])) {
  $id_pel = $_GET['idp'];
  $id_ks = $_GET['idks'];
}

$sql2 = "SELECT * FROM tb_kuis WHERE id_kuis = '$id_ks'";
$query2 = mysqli_query($koneksi, $sql2);
$data = mysqli_fetch_array($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../fragments-guru/header.php');
  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('../fragments-guru/nav.php');
    ?>

    <!-- Main Sidebar Container -->
    <?php
    include('../fragments-guru/sidebar.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Kuis Modul</h1>
            </div>
          </div>
        </div>
      </section>

      <!-- Main Section -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <form action="kuis_proses.php" method="POST">
                <div class="card">
                  <div class="card-header ">
                    <a href="../pelajaran/daftar_modul.php?idp=<?= $id_pel ?>" class="btn btn-warning btn-sm mb-1 mt-2">Kembali</a>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="idp" value="<?= $id_pel ?>">
                    <input type="hidden" name="idks" value="<?= $id_ks ?>">
                    <div class="form-group row">
                      <label for="InputJudul" class="col-sm-3 col-form-label">Judul Kuis</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputJudul" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="desc">Deskripsi Kuis</label>
                      <textarea id="desc" name="desc_kuis"><?= $data['deskripsi_kuis'] ?></textarea>
                    </div>
                    <div class="form-group row">
                      <label for="InputJudul" class="col-sm-3 col-form-label">Waktu Kuis <small>Dalam Menit</small></label>
                      <div class="col-sm-9">
                        <input type="number" id="InputWaktu" name="waktu" class="form-control" required>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="editkuis">Tambah</button>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End of Main Section -->
    </div>

    <?php
    include('../fragments-guru/footer.php');
    ?>
    <script>
      $(function() {
        // Summernote
        $('#desc').summernote({
          height: 300, // set editor height
          placeholder: 'Silahkan Tuliskan Kisi Kisi Yang akan keluar di Kuis',
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['undo', 'redo', 'fullscreen', 'help']]
          ]
        })
      })
    </script>
  </div>
  <!-- ./wrapper -->


  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>

  <!-- Alert -->
  <?php if (isset($_SESSION['alert'])) {
    if ($_SESSION['alert'] != null) {
      echo "<script type='text/javascript'>
            $(document).Toasts('create', {
                $_SESSION[alert]
            })
        </script>";
    }
  }
  // reset alert session jadi kosong
  $_SESSION['alert'] = "";
  ?>
</body>

</html>