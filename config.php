<?php
$server="localhost";
$user="root";
$password="";
$nama_db="buku_induk";

$db=mysqli_connect($server,$user,$password,$nama_db);

if(!$db){
    die("Koneksi ke database gagal".mysqli_connect_error());
}
?>