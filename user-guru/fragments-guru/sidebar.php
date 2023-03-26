<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../../assets/dist/img/handayani.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
        <span class="brand-text font-weight-light">SMK Bisa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if (isset($_SESSION['foto'])) { ?>
                    <img src="../../uploads/<?= $_SESSION['foto'] ?>" class="img-circle elevation-1" alt="User Image">
                <?php } else { ?>
                    <img src="../../assets/dist/img/user.png" class="img-circle elevation-1" alt="User Image">
                <?php } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block">Guru</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="../dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../profile" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../pelajaran/daftar_pelajaran.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Daftar Pelajaran
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="../kuis/daftar_kuis.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kuis
                        </p>
                    </a>
                </li> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>