<?php
include('config.php');
$database = new database();
$database->tambah_user($_POST['nama_lengkap'],$_POST['nohp'],$_POST['username'], $_POST['password']);
header('location:login.php');
