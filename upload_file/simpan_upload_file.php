<?php
    $cekdir=is_dir("foto_nim");
    if($cekdir){
        opendir("foto_nim");
    }
    else{
        mkdir("foto_nim");
        chmod("foto_nim", 0755);
        opendir("foto_nim");
    }
    $lokasi_foto_nim = $_FILES['foto_nim']['tmp_name'];
    $nama_foto_nim = $_FILES['foto_nim']['name'];
    $dir_foto_nim = "foto_nim/$nama_foto_nim";
    move_uploaded_file($lokasi_foto_nim, $dir_foto_nim);
?>