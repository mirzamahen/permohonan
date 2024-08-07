<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Permohonan</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="icon" href="../adminlte/dist/img/kemenag.png">
    <style>
      .main-footer {
          padding: 10px;
          background-color: #f8f9fa;
          border-top: 1px solid #dee2e6;
      }

      .float-right {
          float: right;
      }

      .float-right a {
          margin-right: 10px;
      }

      .float-right a img {
          vertical-align: middle;
          width: 20px;
          height: 20px;
      }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../home.php" class="nav-link">Beranda</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Fullscreen -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="../adminlte/index3.html" class="brand-link">
      <img src="../adminlte/dist/img/kemenag.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KANWIL DIY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="fa-solid fa-house"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-paper-plane"></i>
              <p>
                Permohonan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="magang.php" class="nav-link">
                  <i class="fa-solid fa-briefcase"></i>
                  <p>Magang/PKL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="penelitian.php" class="nav-link">
                  <i class="fa-solid fa-microscope"></i>
                  <p>Penelitian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rohaniwan.php" class="nav-link">
                  <i class="fa-solid fa-book"></i>
                  <p>Rohaniwan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../tracking" class="nav-link">
              <i class="fa-solid fa-magnifying-glass"></i>
              <p>
                Tracking Permohonan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Permohonan Penelitian/Observasi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="submit_penelitian.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Pemohon</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <label for="nik">NIK Pemohon</label>
                    <input type="number" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" required>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">NO HP Pemohon</label>
                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Yang Tersambung Ke Whatsapp" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Pemohon</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="123@gmail.com" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat_domisili">Alamat Domisili Pemohon</label>
                    <textarea class="form-control" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat Domisili" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="universitas">Universitas/Instansi Asal</label>
                    <input type="text" class="form-control" name="universitas" id="universitas" placeholder="Universitas/Instansi Asal" required>
                  </div>
                  <div class="form-group">
                    <label for="pdf_ktp">Upload KTP Pemohon</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pdf_ktp" id="pdf_ktp" accept="application/pdf" required>
                        <label class="custom-file-label" for="pdf_ktp">Upload KTP Anda Disini</label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="pdf_ktp">Upload KTM Pemohon</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pdf_ktm" id="pdf_ktm" accept="application/pdf" required>
                        <label class="custom-file-label" for="pdf_ktp">Upload KTM Anda Disini</label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="pdf_surat">Upload Surat Izin/Permohonan Penelitian</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pdf_surat" id="pdf_surat" accept="application/pdf" required>
                        <label class="custom-file-label" for="pdf_surat">Upload Surat Anda Disini</label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="pdf_proposal">Upload Proposal Penelitian/Observasi</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pdf_proposal" id="pdf_proposal" accept="application/pdf" required>
                        <label class="custom-file-label" for="pdf_proposal">Upload Proposal Penelitian/Observasi Anda Disini</label>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <a href="https://www.instagram.com/kemenag_diy?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
      <img src="../adminlte/dist/img/ig.png" alt="Instagram" style="width:20px;height:20px;">
    </a>
    <a href="#" target="_blank">
      <img src="../adminlte/dist/img/fb.png" alt="Facebook" style="width:20px;height:20px;">
    </a>
    <a href="https://x.com/Kemenag_DIY" target="_blank">
      <img src="../adminlte/dist/img/x.png" alt="Twitter" style="width:20px;height:20px;">
    </a>
    <a href="https://youtube.com/@kemenagdiy-hl6ux?si=MQv1TebCUS2tBZlp" target="_blank">
      <img src="../adminlte/dist/img/yt.png" alt="YouTube" style="width:20px;height:20px;">
    </a>
    <a href="https://diy.kemenag.go.id/" target="_blank">
      <img src="../adminlte/dist/img/web.png" alt="Website" style="width:20px;height:20px;">
    </a>
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2024 <a href="https://diy.kemenag.go.id/">KEMENAG RI KANWIL DIY</a>.</strong> All rights reserved.
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
