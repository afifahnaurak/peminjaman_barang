<?php
    include('config.php');
    $koneksi = new database();
    $koneksi->edit_data_barang($_POST['kode_barang'],$_POST['nama_barang'],$_POST['merek_barang'],$_POST['tipe_barang'],$_POST['jumlah_barang']);
    header('location:tampil_data_barang.php');
?>