<?php
include_once 'config.php';

$id_siswa=$_GET['id'];
$sql="DELETE FROM siswa  WHERE id_siswa='".$id_siswa."'";
$query=mysqli_query($db,$sql);

if ($query) {
    header('Location:admin_page.php');
}else{
    die("Gagal menghapus data");
}

$id_orangtua=$_GET['id'];
$proses="DELETE FROM orang_tua  WHERE id_orangtua='".$id_orangtua."'";
$kueri=mysqli_query($db,$proses);

if ($kueri) {
    header('Location:admin_page.php');
}else{
    die("Gagal menghapus data");
}
?>