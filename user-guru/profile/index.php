<?php
include('../../system/akses_guru.php');
include('../../system/koneksi.php');

// ambil data guru sesuai yang login
$id_userLogin = $_SESSION['id_user'];
$sql = "SELECT * FROM tb_guru JOIN tb_user ON tb_guru.id_user = tb_user.id_user WHERE tb_guru.id_user ='$id_userLogin' ";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

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
              <h1>Profil</h1>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../../assets/dist/img/user.png" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?= $data['nama_guru'] ?></h3>

                  <p class="text-muted text-center"><?= $data['email'] ?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item text-center">
                      <span><?= $data['gender'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></span>
                    </li>
                    <li class="list-group-item text-center">
                      <span><?= $data['no_hp'] ?></span>
                    </li>

                  </ul>

                  <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


              <!-- /.card -->
            </div>

            <div class="col-md-9">
              <div class="card">
                <form action="profile_proses.php" method="POST">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">Ubah Data Guru</h3>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                    <div class="form-group row">
                      <label for="InputNama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputNama" name="nama" placeholder="Masukkan Nama Lengkap" class="form-control" value="<?= $data['nama_guru'] ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputGender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-3">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive">Laki - Laki
                            <input type="radio" name="gender" autocomplete="off" value="L" required <?= $data['gender'] == 'L' ? 'checked' : null ?>>
                          </label>
                          <label class="btn bg-olive">Perempuan
                            <input type="radio" name="gender" autocomplete="off" value="P" required <?= $data['gender'] == 'P' ? 'checked' : null ?>>
                          </label>
                        </div>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="InputNohp" class="col-sm-3 col-form-label">Nomor HP</label>
                      <div class="col-sm-9">
                        <input type="text" id="InputNohp" name="no_hp" placeholder="Nomor Hp WhatsApp" class="form-control" value="<?= $data['no_hp'] ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" name="ubahprofile">Ubah</button>
                  </div>
              </div>
              </form>

              <div class="card">
                <form action="profile_proses.php" method="POST">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">Ubah Email dan Password</h3>
                  </div>
                  <div class="card-body">
                    <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">
                    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                    <div class="form-group row">
                      <label for="InputNama" class="col-sm-3 col-form-label">Nama User<small>(nickname)</small></label>
                      <div class="col-sm-9">
                        <input type="text" id="InputNama" name="nama_user" placeholder="Masukkan Nickname" class="form-control" value="<?= $data['nama'] ?>" required />
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
                        <input type="email" id="InputEmail" name="email" placeholder="Masukkan Email" class="form-control <?= $email_error ? 'is-invalid' : '' ?>" value="<?= $data['email'] ?>" required />
                        <?= $email_error ? '<div id="invalid_txt_username" class="invalid-feedback">Email Sudah Dipakai</div>' : '' ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputPassword" class="col-sm-3 col-form-label">Password<small>(isi jika ingin mengganti)</small></label>
                      <div class="col-sm-9">
                        <input type="password" id="InputPassword" name="password" placeholder="*****" minlength="5" class="form-control">
                      </div>
                    </div>


                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" name="ubahuser">Ubah</button>
                  </div>
              </div>
              </form>
            </div>




          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>

    <?php
    include('../fragments-guru/footer.php');
    ?>

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