<?php
session_start();

if(!isset($_SESSION['customer'])){
    header('Location: login.php');
    exit;
}
require 'function.php';

$roleuser = $_SESSION['customer']['role_id'];
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

<?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <?php include 'topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <div class="row">
                        <div class="col-lg-3">
                        <img src="img/Logo_Organik.png" alt="SampahOrganik" class="img-thumbnail">
                        <button class="my-3 my-2 btn btn-sm btn-info rounded" style="color: #fff; font-weight: bold; font-size: 18px;" id="btn_sampah_organik" onclick="sampah_organik()">Sampah Organik</button>
                        </div>

                        <div class="col-lg-3">
                            <img src="img/Logo_Anorganik.png" alt="SampahAnOrganik" class="img-thumbnail">
                            <button class="my-3 my-2 btn btn-sm btn-info rounded" style="color: #fff; font-weight: bold; font-size: 18px;" id="btn_sampah_anorganik" onclick="sampah_anorganik()">Sampah An Organik</button>
                        </div>

                        <div class="col-lg-3">
                            <img src="img/Logo_LimbahB3.png" alt="SampahLimbahB3" class="img-thumbnail">
                            <button class="my-3 my-2 btn btn-sm btn-info rounded" style="color: #fff; font-weight: bold; font-size: 18px;" id="btn_sampah_limbahb3" onclick="sampah_limbahb3()">Sampah Limbah B3</button>
                        </div>

                        <div class="col-lg-3">
                            <img src="img/Logo_Metal.png" alt="SampahMetal" class="img-thumbnail">
                            <button class="my-3 my-2 btn btn-sm btn-info rounded" style="color: #fff; font-weight: bold; font-size: 18px;" id="btn_sampah_metal" onclick="sampah_metal()">Sampah Metal</button>
                        </div>
                    </div>

                    <!-- Detail Sampahnya -->
                    <hr>
                    <div class="row collapse" id="sampah_organik_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah Organik</h3>
                            <p>Ini Sampah Organik</p>
                           <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
                    </div>

                    <div class="row collapse" id="sampah_anorganik_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah AnOrganik</h3>
                            <p>Ini Sampah AnOrganik</p>
                            <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
                    </div>

                    <div class="row collapse" id="sampah_limbahb3_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah Limbah B3</h3>
                            <p>Ini Sampah Limbah B3</p>
                            <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
                    </div>

                    <div class="row collapse" id="sampah_metal_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah Metal</h3>
                            <p>Ini Sampah Metal</p>
                            <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
        function sampah_organik() {
            $("#sampah_organik_detail").collapse('toggle');
            $("#sampah_anorganik_detail").collapse('hide');
            $("#sampah_limbahb3_detail").collapse('hide');
            $("#sampah_metal_detail").collapse('hide');
        }

        function sampah_anorganik() {
            $("#sampah_organik_detail").collapse('hide');
            $("#sampah_anorganik_detail").collapse('toggle');
            $("#sampah_limbahb3_detail").collapse('hide');
            $("#sampah_metal_detail").collapse('hide');
        }

        function sampah_limbahb3() {
            $("#sampah_organik_detail").collapse('hide');
            $("#sampah_anorganik_detail").collapse('hide');
            $("#sampah_limbahb3_detail").collapse('toggle');
            $("#sampah_metal_detail").collapse('hide');
        }

        function sampah_metal() {
            $("#sampah_organik_detail").collapse('hide');
            $("#sampah_anorganik_detail").collapse('hide');
            $("#sampah_limbahb3_detail").collapse('hide');
            $("#sampah_metal_detail").collapse('toggle');
        }
    </script>

</body>

</html>