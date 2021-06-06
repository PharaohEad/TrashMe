<?php
session_start();

if(!isset($_SESSION['customer'])){
    header('Location: login.php');
    exit;
}

require 'function.php';

// Select Petugas
$petugas = petugas("SELECT * FROM users WHERE role_id = '2' ");

if(isset($_POST['request'])){
    // Cek Apakah User Sudah Membayar Bulanan
    $iduser = $_SESSION['customer']['id'];

    $hasil = query("SELECT * FROM monthly_bill WHERE id_users = '$iduser' ");

    $date_request = date('m-Y', strtotime($_POST['request']));
    $bill = date('m-Y', strtotime($hasil['date']));
    
    //$unpaid = date('m-Y', strtotime($hasil, "-1 months"));

    if(!$hasil){
        echo "<script>alert('Silahkan Lakukan Pembayaran');</script>";
        echo "<script>location='payment.php';</script>";
    }else if ($date_request != $bill){
        echo "<script>alert('Request Hanya Dapat Dilakukan Dalam 30 Hari Kedepan Di Bulan Yang Sama');</script>";
        echo "<script>location='request.php';</script>";
    }else {
        $date = date('Y-m-d', strtotime($_POST['request']));
        $besok = date('Y-m-d', strtotime($date . "+1 days"));
        $tipesampah = $_POST['tipesampah'];
        $idpetugas = $_POST['staffname'];

        mysqli_query($conn, "INSERT INTO pickup_process VALUE ('','$iduser','$date','$besok','requested', '$tipesampah', '$idpetugas') ");

        echo "<script>alert('Berhasil Request');</script>";
        echo "<script>location='requested.php';</script>";
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
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-4">
                        <form class="" method="POST" action="">
                                        <div class="form-group">
                                            <label for="request">Request Pengambilan</label>
                                            <input type="date" class="form-control form-control-user"
                                                id="request" name="request">
                                        </div>
                                        <div class="form-group">
                                            <label for="staffname">Nama Petugas</label>
                                            <select class="form-control" name="staffname" id="staffname">
                                                <option value="">Pilih Petugas</option>
                                                <?php foreach( $petugas as $petugas ):?>
                                                <option value="<?= $petugas['id'] ?>"><?= $petugas['name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipesampah">Tipe Sampah</label>
                                            <select class="form-control" name="tipesampah" id="tipesampah">
                                                <option value="">Pilih Tipe Sampah</option>
                                                <option value="organik">Organik</option>
                                                <option value="anogarnik">Anorganik</option>
                                                <option value="logam">Logam</option>
                                                <option value="limbah">Limbah B3</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-success btn-md" id="btn_request">Request Angkut</button>
                                    </form>
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

</body>

</html>