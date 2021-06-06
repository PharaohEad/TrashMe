<?php
session_start();
require 'function.php';

// Jika Telah Login
if(isset($_SESSION['masuk'])){
    header("Location: index.php");
    exit;
}

// Jika Tombol Login Dipencet
if(isset($_POST['btn_login'])){

    // cek Login
    // Cek Email
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");

    if(mysqli_num_rows($result) === 1){
        // cek Password
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            // Set Session
            $_SESSION['customer'] = $row;
            $_SESSION['customer_email'] = $row['email'];
            $_SESSION['masuk'] = true;
            echo "<script> alert('Berhasil');</script>";
            echo "<script> location='index.php'; </script>";
        }
    }
    $error = true;

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">


<?php if(isset($error)) : ?>
<script>alert('Email / Password Anda Salah');</script>
<?php endif;?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img class="img-thumbnails img-fluid mb-4" src="img/Logo_Login.png">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di TrashMe</h1>
                                    </div>

                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" required
                                                placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" required
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block" name="btn_login">
                                            Login
                                        </button>
                                        <hr>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot.php">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">
                                       <span>Tidak Punya Akun ? </span> <a class="small" href="register.php">Daftar Disini</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>