<?php
include('../system/akses_admin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../fragments/header.php');
  // if (isset($_GET['statususername'])) {
  //     if ($_GET['statususername'] == 'gagal') {
  //         $username_err = true;
  //     }
  // } else {
  //     $username_err = false;
  // }
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
              <h1>Tambah Siswa</h1>
            </div>
          </div>
        </div>
      </section>

      <!-- Main Section -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <form action="tambahsiswa_proses.php" method="POST">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="card-title">Form Data Siswa</h4>
                    <!-- <h3 class="card-title">Judul</h3> -->
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="InputNama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputNama" name="nama" placeholder="Masukkan Nama Lengkap" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputNama" class="col-sm-3 col-form-label">Nama User<small>(nickname)</small></label>
                      <div class="col-sm-9">
                        <input type="text" id="InputNama" name="nama_user" placeholder="Masukkan Nickname" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputKelas" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <select name="kelas" id="InputKelas" class="custom-select rounded-0">
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row has-validation">
                      <label for="InputEmail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <?php
                        if (isset($_GET['status_email'])) {
                          if ($_GET['status_email'] == 'gagal') {
                            $email_error = true;
                          }
                        } else {
                          $email_error = false;
                        }
                        ?>
                        <input type="email" id="InputEmail" name="email" placeholder="Masukkan Email" class="form-control <?= $email_error ? 'is-invalid' : '' ?>" required />
                        <?= $email_error ? '<div id="invalid_txt_username" class="invalid-feedback">Email Sudah Dipakai</div>' : '' ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputPassword" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" id="InputPassword" name="password" placeholder="*****" minlength="5" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputGender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-3">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive">Laki - Laki
                            <input type="radio" name="gender" autocomplete="off" value="L" required>
                          </label>
                          <label class="btn bg-olive">Perempuan
                            <input type="radio" name="gender" autocomplete="off" value="P" required>
                          </label>
                        </div>
                      </div>
                      <!-- <div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" id="lk" type="radio" name="gender" value="L" required>
                          <label class="form-check-label" for="lk">Laki - Laki</label>
                        </div>
                      </div> -->
                      <!-- <div class="col-sm-3">
                        <div class="form-check">
                          <input class="form-check-input" id="pr" type="radio" name="gender" value="P" required>
                          <label class="form-check-label" for="pr">Perempuan</label>
                        </div>
                      </div> -->
                    </div>
                    <div class="form-group row">
                      <label for="InputNohp" class="col-sm-3 col-form-label">Nomor HP</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputNohp" name="no_hp" placeholder="Nomor Hp WhatsApp" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="tambahsiswa">Tambah</button>
                    <a href="datasiswa.php" class="btn btn-secondary float-right">Batal</a>
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
</body>

</html>