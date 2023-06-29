<?php
session_start();
include"koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];

  $filter=mysqli_query($conn,"select * from user where username='$username' and password='$password' ");
  $cek = mysqli_num_rows($filter);
  $data = mysqli_fetch_array($filter);

  if($cek>0){

    if($data['level']=='1'){

    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = 'admin';
    $_SESSION['id'] = $data['id'];
    
    header("location:halaman_admin.php");

  
  }else if($data['level']=='2'){
    
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = 'user';
    $_SESSION['id'] = $data['id'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

    header("location:halaman_user.php");

}
}else{
    $_SESSION['message'] = 'Invalid Username or Password';
    header("location:login.php");
}
?>