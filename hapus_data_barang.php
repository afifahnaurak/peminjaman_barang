<?php
    session_start();
    $username = $_SESSION['username'];
    include "config.php";
    $db = new Database();

    foreach($db->login($username) as $x){
        $level = $x['level'];
        if($level=='1'){
?>

<?php
    $db = new Database();
    if(isset($_GET['id'])){
        $kode_barang = $_GET['id'];
        $data_barang = $db->kode_barang($kode_barang);
        $kode_barang = $data_barang[0]['kode_barang'];
        $db->hapus_data_barang($kode_barang);
        header('Location: tampil_data_barang.php');
    }
    else
    {
        header('Location: tampil_data_barang.php');
    }
?>
<?php
        }
        else{
            echo "Anda belum login";
            header("Location: login.php");
        }
    }
?>