<?php
    include('config.php');
    $koneksi = new database();
    $koneksi->tambah_peminjaman($_POST['kode_peminjaman'], $_POST['matkul'], $_POST['dosen'], $_POST['ruangan'], $_POST['kode_barang'], $_POST['kode_peminjam'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali'], $_POST['kode_status']);
    header('location:tampil_peminjaman.php');
?>