<?php
session_start();

if(!isset($_SESSION['customer'])){
    header('Location: login.php');
    exit;
}

$namauser = $_SESSION['customer']['name'];
$iduser = $_SESSION['customer']['id'];
$id = $_GET['id'];
require 'function.php';

$daftarbill = query("SELECT * FROM monthly_bill WHERE id = '$id' ");

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

    <style>
    @media print {

        *{
            margin-top: 10px;
        }
        .navbar-nav {
            display: none;
        }

        .btn {
            display: none;
        }

        footer {
            display: none;
        }

        #new{
            display: inline !important;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            padding: 50px !important;
        }
    }
    </style>

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
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" id="printhere">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tagihan">Tagihan Bulanan</label>
                            <input type="text" class="form-control form-control-user"
                                id="tagihan" name="tagihan" value="Rp. <?= number_format($daftarbill['payment']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Anda</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $namauser; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="month">Bulan ke-</label>
                            <input type="text" class="form-control" id="month" name="month" value="<?= date('F-Y', strtotime($daftarbill['date']))?>" readonly>
                        </div>
                        <button class="btn btn-success btn-md" onclick="print()">Cetak</button>
                        <a href="paylog.php" class="btn btn-info btn-md">Kembali</a>
                        </div>

                    </div>
                        <div id="new" style="display: none;">
                            <p>Terima Kasih</p>
                        </div>

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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script>
        function print{
            window.print();
        }
    </script>

</body>

</html>