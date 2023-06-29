<?php
    include('config.php');
    $koneksi = new database();
    
    $cekdir = is_dir("foto_nim");
    if ($cekdir) {
        opendir("foto_nim");
    } else {
        mkdir("foto_nim");
        chmod("foto_nim", 0755);
        opendir("foto_nim");
    }
    $daftar_list = array("jpeg", "jpg", "png");
    $nama_file = $_FILES['foto_nim']['name'];
    $pecah = explode(".", $nama_file);
    $ekstensi = $pecah[1];
    if (in_array($ekstensi, $daftar_list)) {
        $lokasi_foto_nim = $_FILES['foto_nim']['tmp_name'];
        $nama_foto_nim = $_FILES['foto_nim']['name'];
        $dir_foto_nim = "foto_nim/$nama_foto_nim";
        move_uploaded_file($lokasi_foto_nim, $dir_foto_nim);
        $koneksi->edit_data_peminjam($_POST['kode_peminjam'], $_POST['nama_peminjam'],$_POST['prodi'],$_POST['kelas'],$_POST['nim'],$_POST['no_hp'], $dir_foto_nim);
        header('location:tampil_data_peminjam.php');
    } 
    else {
        echo "Type file harus berupa gambar <br>";
        header('location:tampil_data_peminjam.php');
    }
?>