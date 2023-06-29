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
        $kode_peminjam = $_GET['id'];
        $data_peminjam = $db->kode_peminjam($kode_peminjam);
        $kode_peminjam = $data_peminjam[0]['kode_peminjam'];
        $db->hapus_data_peminjam($kode_peminjam);
        header('Location: tampil_data_peminjam.php');
    }
    else
    {
        header('Location: tampil_data_peminjam.php');
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