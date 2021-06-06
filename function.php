<?php
$conn = mysqli_connect("localhost", "root", "","db_trashme");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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

function query2($data){
    global $conn;

    $result = mysqli_query($conn, $data);

    $rows = [];

    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;

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


// Edit Profile + Upload Foto
function updateprofile($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $phone = $data["telp"];
    $foto = $_FILES['gambar']['name'];
    // $passwordbaru = mysqli_real_escape_string($conn, $data["password"]);
    // $konfirmasipasswordbaru = mysqli_real_escape_string($conn, $data["password2"]);

   // pengupload gambar
    if ($foto != '') {
        $foto = uploadprofile();
        if ($foto == '') {
            return false;
        } else {
        $query = "UPDATE users SET 
        name = '$nama',
        address = '$alamat',
        phone_num = '$phone',
        profile_pict = '$foto'
        WHERE id = $id
        ";
        }
    } else {
        $query = "UPDATE users SET 
        name = '$nama',
        address = '$alamat',
        phone_num = '$phone'
        WHERE id = $id
        ";
    }
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updatepasswordprofile($data){
    global $conn;

    $id = $data["id"];
    $passwordbaru = mysqli_real_escape_string($conn, $data["password1"]);
    $konfirmasipasswordbaru = mysqli_real_escape_string($conn, $data["password2"]);

      // pengecekan konfirmasi password
     if ($passwordbaru !== $konfirmasipasswordbaru) {
        echo "<script>
		alert('konfirmasi password tidak sesuai');
		</script>";
        return false;
    }
    $passwordbaru = password_hash($passwordbaru, PASSWORD_DEFAULT);

    $query = "UPDATE users SET 
       password = '$passwordbaru',
       conf_password = '$passwordbaru'
        WHERE id = $id
        ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function uploadprofile()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $eksGambarValid = ['jpg', 'jpeg', 'png'];

    // pemecah string
    $ekstensiGambar = explode('.', $namaFile);

    // pengambilan ektensi dan mengubah huruf menjadi huruf kecil semua
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $eksGambarValid)) {
        echo "<script>
        alert('Yang Anda Upload Bukan Gambar');
        </script>";
        return false;
    }

    // pengecekan ukuran gambar
    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
    }

    // penguploadan gambar
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

// Forgot Password
function forgotpassword($data)
{
    global $conn;

    $email = mysqli_real_escape_string($conn, $data['email']);

    // cek email
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 0) {
        echo "<script> alert('Email Tidak Ada Atau Salah'); </script>";
        echo "<script>location='login.php';</script>";
    } else {
        $token = "qwertyupasdfghjkzxcvbnmQWERTYUPASDFGHJKZXCVBNM123456789";
        $token = str_shuffle($token);
        $token = substr($token, 0, 5);
    
        $datecreated = time();
    
        // tambah user ke database forgot
        $query = "INSERT INTO forgotpassword VALUES ('','$email','$token','$datecreated')";
    
        // autoemail
        $mail = new PHPMailer;
        $mail->Host = 'smtp.gmail.com';
        $mail->IsSMTP(); // enable SMTP
        //$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->Username = "tessubyek69420@gmail.com";
        $mail->Password = "Bl1zz4rd$";
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Port = 587; // or 587	
        $mail->isHTML(true);
        $mail->setFrom('tessubyek69420@gmail.com');
        $mail->addAddress($email);
        $mail->Subject = 'Forgot Password Trash Me';
        $body = $mail->Body =
            "
        Password Anda Telah Di Reset, Silahkan Klik Link Berikut Mengganti Password.<br>
        <a href='http://localhost/Trashme/reset.php?email=$email&token=$token'>Reset Password</a><br><br>
        Salam Hangat,<br>
        Management Trash Me
        ";
    
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }
   
}

// Reset Password
function resetpassword()
{
    global $conn;
    $email =  $_GET['email'];
    $token =  $_GET['token'];

    // cek email
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {

        // Cek token
        $token2 = mysqli_query($conn, "SELECT token FROM forgotpassword WHERE token = '$token'");

        if (mysqli_num_rows($token2) === 1) {

            $_SESSION['reset_email'] = $email;

            $newEmail = $_SESSION['reset_email'];

            $newPassword = mysqli_real_escape_string($conn, $_POST['password1']);

            $password = password_hash($newPassword, PASSWORD_DEFAULT);

            $query = "UPDATE users SET 
                password = '$password',
                conf_password = '$password'
                WHERE email = '$newEmail'
                ";

            $query2 = "DELETE FROM forgotpassword WHERE email = '$newEmail' ";

            mysqli_query($conn, $query);
            mysqli_query($conn, $query2);

            $newEmail = session_unset();

            return mysqli_affected_rows($conn);
        }
        else {
            echo "<script> alert('Token Salah, Silahkan Cek Email Anda'); </script>";
            echo "<script>location='login.php';</script>";
        }
    }
}

// Admin Tambah Petugas
function tambahpetugas($data){

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
    $query = "INSERT INTO users VALUE ('','$email','$password1','$password2','$nama','$alamat','$phone','2','default.png')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
