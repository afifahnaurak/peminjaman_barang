<?php
    session_start();
    $username = $_SESSION['username'];
    include "config.php";
    $db = new Database();

    foreach($db->login($username) as $x){
        $level = $x['level'];
        if($level=='1'){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo_polines.png" type="image/x-icon"/>
    <link rel="icon" href="assets/img/logo_polines.png" type="image/x-icon"/>
    <title>Peminjaman Barang Jurusan Teknik Elektro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="hlmn2/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php
        $db = new Database();
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="halaman_admin.php">Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="halaman_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-desktop"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                Input
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tambah_data_barang.php">Barang</a>
                                    <a class="nav-link" href="tambah_data_peminjam.php">Peminjam</a>
                                    <a class="nav-link" href="peminjaman_barang.php">Peminjaman</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="tampil_data_barang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Barang
                            </a>
                            <a class="nav-link" href="tampil_data_peminjam.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Peminjam
                            </a>
                            <a class="nav-link" href="tampil_peminjaman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Peminjaman
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">List Data Peminjaman</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Peminjaman Barang Jurusan Teknik Elektro</li>
                        </ol>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-hover" id="datatablesSimple">
                                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen Pengampu</th>
                    <th scope="col">Ruangan</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Peminjam</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no= 1;
                    foreach($db->tampil_peminjaman() as $x){
                ?>
                <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $x['kode_peminjaman']; ?></td>
                    <td><?php echo $x['matkul']; ?></td>
                    <td><?php echo $x['dosen']; ?></td>
                    <td><?php echo $x['ruangan']; ?></td>
                    <td><?php echo $x['nama_barang']; ?></td>
                    <td><?php echo $x['nama_peminjam']; ?></td>
                    <td><?php 
                        $tanggal_pinjam = $x['tanggal_pinjam'];
                        $tanggal_pinjam_ganti_format = date("d F Y", strtotime($tanggal_pinjam));
                        echo $tanggal_pinjam_ganti_format;
                        ?>
                    </td>
                    <td><?php 
                        $tanggal_kembali = $x['tanggal_kembali'];
                        $tanggal_kembali_ganti_format = date("d F Y", strtotime($tanggal_kembali));
                        echo $tanggal_kembali_ganti_format;
                        ?>
                    </td>
                    <td><?php echo $x['keterangan_status']; ?></td>
                    <td><a href="edit_data_peminjaman.php?id=<?php echo $x['kode_peminjaman']; ?>">Edit</a></td>
                    <td><a href="hapus_data_peminjaman.php?id=<?php echo $x['kode_peminjaman']; ?>" onClick="return confirm('Anda yakin akan menghapus?'); if (ok) return true; else return false"><font color="red">Hapus</font></a></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Politeknik Negeri Semarang 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="hlmn2/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="hlmn2/js/datatables-simple-demo.js"></script>
</body>
</html>
<?php
        }
        else{
            echo "Anda belum login";
            header("Location: login.php");
        }
    }
?>