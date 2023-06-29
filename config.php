<?php
    class database{
        var $host = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "peminjaman_barang";
        var $koneksi = "";
        function __construct(){
            $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (mysqli_connect_error()){
                echo "Koneksi database gagal : " . mysqli_connect_error();
            }
        }
        function tampil_data()
        {
            $data = mysqli_query($this->koneksi,"select * from data_peminjam");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function tambah_data_peminjam($password,$kode_peminjam,$nama_peminjam,$prodi,$kelas,$nim,$no_hp,$foto)
        {
            mysqli_query($this->koneksi,"insert into data_peminjam values ('','$kode_peminjam','$nama_peminjam','$prodi','$kelas', '$nim', '$no_hp', '$foto')");
            $ambil_id = mysqli_query($this->koneksi, "select id from data_peminjam ORDER BY id DESC LIMIT 1");
            $row_id = mysqli_fetch_array($ambil_id);
            $hasil_id = $row_id['id'];
            mysqli_query($this->koneksi, "insert into user values ('','$nama_peminjam', '$no_hp','$kode_peminjam','$password','2','$hasil_id')");

        }
        function kode_peminjam($kode_peminjam)
        {
            $data_peminjam = mysqli_query($this->koneksi,"select * from data_peminjam where kode_peminjam='$kode_peminjam'");
            while($row_peminjam = mysqli_fetch_assoc($data_peminjam)){
                $hasil_peminjam[] = $row_peminjam;
            }
            return $hasil_peminjam;
        }
        function edit_data_peminjam($kode_peminjam,$nama_peminjam,$prodi,$kelas,$nim,$no_hp,$foto)
        {
            mysqli_query($this->koneksi,"UPDATE data_peminjam set nama_peminjam = '$nama_peminjam', prodi = '$prodi', kelas = '$kelas', nim = '$nim', no_hp = '$no_hp', foto = '$foto' where kode_peminjam = '$kode_peminjam'");
        }
        function hapus_data_peminjam($kode_peminjam)
        {
            mysqli_query($this->koneksi,"DELETE from data_peminjam where kode_peminjam = '$kode_peminjam'");
        }
        function tambah_data_barang($kode_barang,$nama_barang,$merek_barang,$tipe_barang,$jumlah_barang)
        {
            mysqli_query($this->koneksi,"insert into data_barang values ('','$kode_barang','$nama_barang','$merek_barang','$tipe_barang','$jumlah_barang')");
        }
        function kode_barang($kode_barang){
            $data_barang = mysqli_query($this->koneksi,"select * from data_barang where kode_barang='$kode_barang'");
            while($row_barang = mysqli_fetch_assoc($data_barang)){
                $hasil_barang[] = $row_barang;
            }
            return $hasil_barang;
        }
        function edit_data_barang($kode_barang,$nama_barang,$merek_barang,$tipe_barang,$jumlah_barang)
        {
            mysqli_query($this->koneksi,"UPDATE data_barang set nama_barang = '$nama_barang', merek_barang = '$merek_barang', tipe_barang = '$tipe_barang', jumlah_barang = '$jumlah_barang' where kode_barang = '$kode_barang'");
        }
        function hapus_data_barang($kode_barang)
        {
            mysqli_query($this->koneksi,"DELETE from data_barang where kode_barang = '$kode_barang'");
        }
        function tampil_data_barang()
        {
            $data = mysqli_query($this->koneksi,"select * from data_barang");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function ambil_data_barang()
        {
            $data_barang = mysqli_query($this->koneksi,"select * from data_barang");
            while($row_data_barang = mysqli_fetch_array($data_barang)){
                $hasil_data_barang[] = $row_data_barang;
            }
            return $hasil_data_barang;
        }
        function ambil_data_peminjam()
        {
            $data_peminjam = mysqli_query($this->koneksi,"select * from data_peminjam");
            while($row_data_peminjam = mysqli_fetch_array($data_peminjam)){
                $hasil_data_peminjam[] = $row_data_peminjam;
            }
            return $hasil_data_peminjam;
        }
        function tambah_peminjaman($kode_peminjaman,$matkul,$dosen,$ruangan,$kode_barang,$kode_peminjam,$tanggal_pinjam,$tanggal_kembali,$kode_status)
        {
            mysqli_query($this->koneksi,"insert into peminjaman values ('','$kode_peminjaman','$matkul','$dosen','$ruangan','$kode_barang','$kode_peminjam','$tanggal_pinjam','$tanggal_kembali','$kode_status')");
        }
        function kode_peminjaman($kode_peminjaman)
        {
            $peminjaman = mysqli_query($this->koneksi,"select * from peminjaman where kode_peminjaman='$kode_peminjaman'");
            while($row_peminjaman = mysqli_fetch_assoc($peminjaman)){
                $hasil_peminjaman[] = $row_peminjaman;
            }
            return $hasil_peminjaman;
        }
        function edit_data_peminjaman($kode_peminjaman,$matkul,$dosen,$ruangan,$kode_barang,$kode_peminjam,$tanggal_pinjam,$tanggal_kembali,$kode_status)
        {
            mysqli_query($this->koneksi,"UPDATE peminjaman set matkul = '$matkul', dosen = '$dosen', ruangan = '$ruangan', kode_barang = '$kode_barang', kode_peminjam = '$kode_peminjam', tanggal_pinjam = '$tanggal_pinjam', tanggal_kembali = '$tanggal_kembali', kode_status = '$kode_status' where kode_peminjaman = '$kode_peminjaman'");
        }
        function hapus_data_peminjaman($kode_peminjaman)
        {
            mysqli_query($this->koneksi,"DELETE from peminjaman where kode_peminjaman = '$kode_peminjaman'");
        }
        function tampil_peminjaman()
        {
            $data = mysqli_query($this->koneksi,"select a.*,b.*,c.*,d.* from peminjaman a INNER JOIN data_barang b ON b.kode_barang = a.kode_barang INNER JOIN data_peminjam c ON c.kode_peminjam = a.kode_peminjam INNER JOIN status d ON d.kode_status = a.kode_status");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function tampil_data_status()
        {
            $data_status = mysqli_query($this->koneksi,"select * from status");
            while($row_status = mysqli_fetch_array($data_status)){
                $hasil_status[] = $row_status;
            }
            return $hasil_status;
        }
        function login($username)
        {
            $data = mysqli_query($this->koneksi,"SELECT * FROM user where username = '$username'");
            if (mysqli_num_rows($data) == 0) {
                echo "<b>Data user tidak valid</br>";
                $hasil = [];
                header('location:login.php');
            }
            else{
                while($row = mysqli_fetch_array($data)){
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tambah_user($nama_lengkap,$no_hp,$username,$password)
        {
    
            mysqli_query($this->koneksi,"insert into user values ('','$nama_lengkap','$no_hp','$username','$password','2', '')");
        }
        function tampil_peminjaman_user($username)
        {
            $data = mysqli_query($this->koneksi,"select a.*,b.*,c.*,d.* from peminjaman a INNER JOIN data_barang b ON b.kode_barang = a.kode_barang INNER JOIN data_peminjam c ON c.kode_peminjam = a.kode_peminjam INNER JOIN status d ON d.kode_status = a.kode_status WHERE a.kode_peminjam = '$username'");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
?>