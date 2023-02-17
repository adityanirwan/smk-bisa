<?php
include('../system/akses_admin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../fragments/header.php');
  if (isset($_GET['statususername'])) {
    if ($_GET['statususername'] == 'gagal') {
      $username_err = true;
    }
  } else {
    $username_err = false;
  }


  ?>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('../fragments/nav.php');
    ?>

    <!-- Main Sidebar Container -->
    <?php
    include('../fragments/sidebar.php');
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Data Guru</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main Section -->
      <!-- general form elements -->
      <div class="card card-primary">
        <!-- form start -->
        <form action="admin_tambahguru_proses.php" method="POST">
          <div class=" card-body">
            <div class="form-group">
              <label for="InputNama">Nama</label>
              <input type="text" class="form-control" id="InputNama" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group has-validation">
              <label for="InputUsername">Username</label>
              <input type="text" class="form-control <?= $username_err ? 'is-invalid' : '' ?>" id="InputUsername" name="username" placeholder="Masukkan Username" required />
              <?= $username_err ? '<div id="invalid_txt_username" class="invalid-feedback">Username Sudah Dipakai</div>' : '' ?>
            </div>
            <div class="form-group">
              <label for="InputPassword">Password</label>
              <input type="password" class="form-control" id="InputPassword" name="password" placeholder="*****" required>
            </div>
            <div class="form-group">
              <label for="InputAlamat">Alamat</label>
              <input type="text" class="form-control" id="InputAlamat" name="alamat" placeholder="Masukkan Alamat">
            </div>
            <div class="form-group">
              <label for="InputNohp">Nomor HP</label>
              <input type="text" class="form-control" id="InputNohp" name="no_hp" placeholder="Nomor Hp">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="tambahguru">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

      <!-- general form elements -->
      <!-- End of Main Section -->
    </div>
    <?php
    include('../fragments/footer.php');
    ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
</body>

</html>