<?php
session_start();
require 'function.php';

if(isset($_POST['btn_tambah_petugas'])) {
    
    if(tambahpetugas($_POST) > 0 ){
        echo "<script> alert('Berhasil');</script>";
        echo "<script> location='datapetugas.php'; </script>";
    }else {
        echo mysqli_error($conn);
    }
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

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                 <!-- Topbar -->
                 <?php include 'topbar.php'?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Petugas</h1>

                    <form class="user" action="" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user"
                                id="email" name="email"
                                placeholder="Masukkan alamat E-mail Petugas" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="nama" name="nama"
                                placeholder="Masukkan Nama Petugas" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user"
                                id="phone" name="phone"
                                placeholder="Masukkan Nomor Telepon Petugas" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="alamat" name="alamat"
                                placeholder="Masukkan Alamat Rumah Petugas" required>
                        </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                    id="password1" name="password1" 
                                    placeholder="Masukan Password Petugas" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                    id="password2" name="password2" 
                                    placeholder="Masukan Ulang Password Petugas" required>
                                </div>
                            </div>
                            </div>
                        <button type="submit" name="btn_tambah_petugas" class="btn btn-success btn-user btn-block">
                            Tambah Petugas
                        </button>
                        <hr>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website <?= date('Y')?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<!-- Logout Modal -->
<?php include 'logoutmodal.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>