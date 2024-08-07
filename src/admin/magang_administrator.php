<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrator') {
    header("Location: login.php");
    exit;
}

// Include database connection
require 'includes/config.php';

// Query to get data from magang table
$sql = "SELECT * FROM magang";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
      h3 {
          text-align: center;
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
        <a href="index.php" class="nav-link">Beranda</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contact.php" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Logout Button -->
      <li class="nav-item">
        <a class="nav-link" href="includes/logout.php">
           <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="adminlte/index3.html" class="brand-link">
      <img src="../adminlte/dist/img/kemenag.png" alt="kemenag" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KANWIL DIY</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../adminlte/dist/img/users.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>
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
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard_administrator.php" class="nav-link">
              <i class="fa-solid fa-house"></i>
              <p>Beranda</p>
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
                <a href="magang_administrator.php" class="nav-link">
                  <i class="fa-solid fa-briefcase"></i>
                  <p>Magang/PKL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="penelitian_administrator.php" class="nav-link">
                  <i class="fa-solid fa-microscope"></i>
                  <p>Penelitian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rohaniwan_administrator.php" class="nav-link">
                  <i class="fa-solid fa-book"></i>
                  <p>Rohaniwan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link">
              <i class="fa-solid fa-users"></i>
              <p>User</p>
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

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Permohonan Magang</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Universitas/Instansi</th>
                        <th>KTP</th>
                        <th>KTM</th>
                        <th>Permohonan</th>
                        <th>Proposal</th>
                        <th>No Tracking</th>
                        <th>Status</th>
                        <th>Edit Status</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php
                            if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $no++ . "</td>";
                              echo "<td>" . $row['nama'] . "</td>";
                              echo "<td>" . $row['nik'] . "</td>";
                              echo "<td>" . $row['no_hp'] . "</td>";
                              echo "<td>" . $row['email'] . "</td>";
                              echo "<td>" . $row['alamat_domisili'] . "</td>";
                              echo "<td>" . $row['universitas'] . "</td>";
                              echo "<td><a href='" . $row['ktp_path'] . "' target='_blank'><i class='fa-solid fa-eye'></i></a></td>";
                              echo "<td><a href='" . $row['ktm_path'] . "' target='_blank'><i class='fa-solid fa-eye'></i></a></td>";
                              echo "<td><a href='" . $row['pdf_path'] . "' target='_blank'><i class='fa-solid fa-eye'></i></a></td>";
                              echo "<td><a href='" . $row['proposal_path'] . "' target='_blank'><i class='fa-solid fa-eye'></i></a></td>";
                              echo "<td>" . $row['tracking_number'] . "</td>";
                              echo "<td>" . $row['status'] . "</td>";
                              echo "<td>
                                      <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editModal" . $row['id'] . "'>
                                          <i class='fa-solid fa-pen-to-square'></i></button>
                                    </td>";
                              echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='12'>No data available</td></tr>";
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
        </section>

    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

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
</div>

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../.adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<!-- DataTables  & Plugins -->
<script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.colvis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<?php
// Query to get data from magang table (again for modal data)
$result_modal = $conn->query($sql);

if ($result_modal->num_rows > 0) {
    while ($row_modal = $result_modal->fetch_assoc()) {
        // Modal for editing status
        echo "<div class='modal fade' id='editModal" . $row_modal['id'] . "' tabindex='-1' aria-labelledby='editModalLabel" . $row_modal['id'] . "' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editModalLabel" . $row_modal['id'] . "'>Edit Status Magang</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <form action='edit_status_administrator.php' method='post'>
                            <div class='modal-body'>
                                <div class='form-group'>
                                    <label for='status'>Status:</label>
                                    <select class='form-control' id='status' name='status'>
                                        <option value='Sedang Ditinjau' " . ($row_modal['status'] == 'Sedang Ditinjau' ? 'selected' : '') . ">Sedang Ditinjau</option>
                                        <option value='Sedang Diproses' " . ($row_modal['status'] == 'Sedang Diproses' ? 'selected' : '') . ">Sedang Diproses</option>
                                        <option value='Selesai' " . ($row_modal['status'] == 'Selesai' ? 'selected' : '') . ">Selesai</option>
                                    </select>
                                </div>
                                <input type='hidden' name='id' value='" . $row_modal['id'] . "'>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>";
    }
}
?>

</body>
</html>

<?php
$conn->close();
?>
