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
                            <p>Sampah organik adalah sampah yang bisa mengalami pelapukan (dekomposisi) dan terurai 
                            menjadi bahan yang lebih kecil dan tidak berbau (sering disebut dengan kompos). Kompos 
                            merupakan hasil pelapukan bahan-bahan organik seperti daun-daunan, jerami, alang-alang, 
                            sampah, rumput, dan bahan lain.
                            </p>
                            <table class="table table-bordered">
                                <tr>
                                    <th> Sampah Organik Kering</th>
                                    <th> Sampah Organik Basah</th>
                                </tr>
                                <tr>
                                    <td> Kertas</td>
                                    <td> Kulit Buah</td>
                                </tr>
                                <tr>
                                    <td> Kayu</td>
                                    <td> Sisa Sayuran</td>
                                </tr>
                                <tr>
                                    <td> Ranting Pohon</td>
                                    <td> Sampah Daun</td>
                                </tr>
                            </table>
                           <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
                    </div>

                    <div class="row collapse" id="sampah_anorganik_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah Anorganik</h3>
                            <p>Sampah anorganik merupakan limbah yang dihasilkan dari bahan-bahan yang bukan berasal dari 
                            alam (bahan hayati), melainkan bahan-bahan buatan manusia atau bahan sintetik (sampah non
                            alami)
                            </p>
                            <table class="table table-bordered">
                                <tr>
                                    <th> Sampah Anorganik Lunak</th>
                                    <th> Sampah Anorganik Keras</th>
                                </tr>
                                <tr>
                                    <td> Plastik</td>
                                    <td> Ban Bekas</td>
                                </tr>
                                <tr>
                                    <td> Sterefoam</td>
                                    <td> Batu Bata</td>
                                </tr>
                                <tr>
                                    <td> Baju</td>
                                    <td> Pecahan Kaca</td>
                                </tr>
                            </table>
                            <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
                    </div>

                    <div class="row collapse" id="sampah_limbahb3_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah Limbah B3</h3>
                            <p>pengertian limbah B3 dapat diartikan sebagai suatu buangan atau limbah yang sifat dan
                            konsentrasinya mengandung zat yang beracun dan berbahaya sehingga secara langsung
                            maupun tidak langsung dapat merusak lingkungan, mengganggu kesehatan, dan mengancam 
                            kelangsungan hidup manusia serta organisme lainya.
                            </p>
                            <table class="table table-bordered">
                                <tr>
                                    <td> Aki Bekas</td>
                                    <td> Oli</td>
                                </tr>
                                <tr>
                                    <td> Limbah Deterjen</td>
                                    <td> Baterai</td>
                                </tr>
                                <tr>
                                    <td> Obat-Obatan</td>
                                    <td> Narkoba</td>
                                </tr>
                                <tr>
                                    <td> Cat</td>
                                    <td> Pasir Semen</td>
                                </tr>
                            </table>
                            <?php if($roleuser == "3"):?>
                            <a href="request.php" class="btn btn-success">Request Angkut</a>
                           <?php endif;?>
                        </div>
                    </div>

                    <div class="row collapse" id="sampah_metal_detail">
                        <div class="col">
                            <h3 class="mt-3 text-gray-800">Sampah Metal</h3>
                            <p>Sampah metal merupakan barang yang dihasilkan dari bahan-bahan yang berasal dari 
                            bahan padat.
                            </p>
                            <table class="table table-bordered">
                                <tr>
                                    <td> Kaleng</td>
                                    <td> Wajan</td>
                                </tr>
                                <tr>
                                    <td> Tembaga</td>
                                    <td> Ember Besi</td>
                                </tr>
                                <tr>
                                    <td> Perkakas Besi</td>
                                    <td> Botol Alumunium</td>
                                </tr>
                                <tr>
                                    <td> Kabel Fiber</td>
                                    <td> Pisau</td>
                                </tr>
                            </table>
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


<!-- Logout Modal -->
<?php include 'logoutmodal.php';?>

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