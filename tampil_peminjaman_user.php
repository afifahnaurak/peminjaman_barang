<?php
    session_start();
    $username = $_SESSION['username'];
    include "config.php";
    $db = new Database();

    foreach($db->login($username) as $x){
        $level = $x['level'];
        if($level=='2'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo_polines.png" type="image/x-icon"/>
    <title>Peminjaman Barang Jurusan Teknik Elektro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="hlmn2/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="hlmn1/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Peminjaman Barang</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="halaman_user.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="tampil_peminjaman_user.php">Peminjaman</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="tampil_data_barang_user.php">List Barang</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="halaman_user.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="halaman_user.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Peminjaman Barang</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Jurusan Teknik Elektro</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <br><br><h2>Data Peminjaman</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered table-hover" id="datatablesSimple">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Peminjam</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Dosen Pengampu</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Peminjam</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Status Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($db->tampil_peminjaman_user($username) as $x){
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
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="hlmn2/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="hlmn2/js/datatables-simple-demo.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="hlmn1/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
<!-- Footer-->
<footer class="footer bg-white small text-center text-black-50"><div class="container px-4 px-lg-5">Copyright &copy; Politeknik Negeri Semarang 2022</div></footer>
</html>
<?php
        }
        else{
            echo "Anda belum login";
            header("Location: login.php");
        }
    }
?>