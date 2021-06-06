<?php
session_start();
require 'function.php';
date_default_timezone_set('Asia/Jakarta');

$idangkut = $_GET['id'];

$dataangkut = query("SELECT * FROM pickup_process WHERE id = '$idangkut' ");

$iduser = $dataangkut['id_users'];
$pickupdates = date('Y-m-d');

mysqli_query($conn, "UPDATE pickup_process SET status ='success' WHERE id = '$idangkut' ");
mysqli_query($conn, "INSERT INTO pickup_log VALUE ('','$pickupdates','$iduser','$idangkut') ");


echo "<script>alert('Berhasil Angkut Sampah');</script>";
echo "<script>location='dataangkut.php';</script>";
?>
