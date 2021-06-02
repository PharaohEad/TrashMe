<?php
$conn = mysqli_connect("localhost", "root", "","db_trashme");


function registeruser($data){

    global $conn;

    $email=mysqli_real_escape_string($conn,$data['email']);
    $nama=mysqli_real_escape_string($conn, $data['nama']);
    $phone=$data['phone'];
    $alamat=$data['alamat'];
    $password1=mysqli_real_escape_string($conn, $data['password1']);
    $password2=mysqli_real_escape_string($conn, $data['password2']);

    // Cek Email
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' ");

    if (mysqli_fetch_assoc($result)){
        echo "<script> alert('Email Sudah Terdaftar'); </script>";
        return false;
    }

    // Cek Password 1 = Password 2
    if ($password1 != $password2){
        echo "<script> alert('Password Anda TIdak Sama'); </script>";
        return false;
    }

    // Enkripsi Password
    $password1 = password_hash($password1, PASSWORD_DEFAULT);
    $password2 = password_hash($password2, PASSWORD_DEFAULT);

    // Tambah User Ke DB / Insert User
    $query = "INSERT INTO users VALUE ('','$email','$password1','$password2','$nama','$alamat','$phone','3','default.jpg')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function petugas($data){
    global $conn;

    $result = mysqli_query($conn, $data);

    $rows = [];

    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;

}

function query($data){
    global $conn;

    $result = mysqli_query($conn, $data);

    // $rows = [];

    while ( $row = mysqli_fetch_assoc($result)){
        return $row;
    }
    // return $rows;

}

function request($data){
    global $conn;

    $result = mysqli_query($conn, $data);

    $rows = [];

    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;

}

function payment($data){
    global $conn;

    $result = mysqli_query($conn, $data);

    $rows = [];

    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;

}
