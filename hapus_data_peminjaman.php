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
        $kode_peminjaman = $_GET['id'];
        $peminjaman = $db->kode_peminjaman($kode_peminjaman);
        $kode_peminjaman = $peminjaman[0]['kode_peminjaman'];
        $db->hapus_data_peminjaman($kode_peminjaman);
        header('Location: tampil_peminjaman.php');
    }
    else
    {
        header('Location: tampil_peminjaman.php');
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