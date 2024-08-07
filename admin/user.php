<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'administrator') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
                    <li class="nav-item">
                        <a href="dashboard_administrator.php" class="nav-link">
                            <i class="fas fa-home"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-paper-plane"></i>
                            <p>
                                Permohonan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="magang_administrator.php" class="nav-link">
                                    <i class="fas fa-briefcase"></i>
                                    <p>Magang/PKL</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="penelitian_administrator.php" class="nav-link">
                                    <i class="fas fa-microscope"></i>
                                    <p>Penelitian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="rohaniwan_administrator.php" class="nav-link">
                                    <i class="fas fa-book"></i>
                                    <p>Rohaniwan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link">
                            <i class="fas fa-users"></i>
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
                        <h1>Administrator Dashboard</h1>
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
                                <h3 class="card-title">Data Pengguna</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add">
                                    Tambah User
                                </button>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include 'includes/config.php';
                                    $sql = "SELECT * FROM user";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>{$row['id']}</td>
                                                <td>{$row['username']}</td>
                                                <td>{$row['nama']}</td>
                                                <td>{$row['nip']}</td>
                                                <td>{$row['role']}</td>
                                                <td>
                                                    <button class='btn btn-info btn-sm editBtn' 
                                                            data-id='{$row['id']}' 
                                                            data-username='{$row['username']}' 
                                                            data-nama='{$row['nama']}' 
                                                            data-nip='{$row['nip']}' 
                                                            data-role='{$row['role']}'>Edit</button>
                                                    <button class='btn btn-danger btn-sm deleteBtn' data-id='{$row['id']}'>Delete</button>
                                                </td>
                                              </tr>";
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

    <!-- Modal Add -->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add_user.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" required>
                                <option value="administrator">Administrator</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit_user.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label for="edit-username">Username</label>
                            <input type="text" name="username" id="edit-username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-password">Password</label>
                            <input type="password" name="password" id="edit-password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="edit-nama">Nama</label>
                            <input type="text" name="nama" id="edit-nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-nip">NIP</label>
                            <input type="text" name="nip" id="edit-nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-role">Role</label>
                            <select name="role" id="edit-role" class="form-control" required>
                                <option value="administrator">Administrator</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
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
            <b>Versi</b> 1.0
        </div>
        <strong>Hak Cipta &copy; 2024 <a href="https://diy.kemenag.go.id/">KEMENAG RI KANWIL DIY</a>.</strong> Seluruh hak dilindungi undang-undang.
    </footer>
</div>

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    // Edit button click handler
    $(document).on('click', '.editBtn', function () {
        var id = $(this).data('id');
        var username = $(this).data('username');
        var nama = $(this).data('nama');
        var nip = $(this).data('nip');
        var role = $(this).data('role');

        $('#edit-id').val(id);
        $('#edit-username').val(username);
        $('#edit-nama').val(nama);
        $('#edit-nip').val(nip);
        $('#edit-role').val(role);

        $('#modal-edit').modal('show');
    });

    // Delete button click handler
    $(document).on('click', '.deleteBtn', function () {
        var id = $(this).data('id');

        if (confirm("Apakah Anda yakin untuk menghapus pengguna ini?")) {
            $.ajax({
                type: "POST",
                url: "delete_user.php", // Ubah sesuai dengan nama halaman penghapusan
                data: { id: id },
                success: function (response) {
                    // Handle response, misalnya reload tabel atau memberikan notifikasi
                    alert("Pengguna berhasil dihapus.");
                    window.location.reload(); // Contoh: reload halaman setelah penghapusan
                },
                error: function () {
                    alert("Gagal menghapus pengguna.");
                }
            });
        }
    });
</script>
</body>
</html>

<?php
$conn->close();
?>
