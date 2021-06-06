<?php
session_start();

if(!isset($_SESSION['customer'])){
    header('Location: login.php');
    exit;
}

require 'function.php';

$iduser = $_SESSION['customer']['id'];
// Ambil Data Dari ID URL
$iddetail = $_GET['id'];
// Ambil Seluruh Data Dari Table
$detail = query("SELECT * FROM pickup_process WHERE id = '$iddetail' ");
$complaindate= $detail['pickup_date_req'];
// datenow 
$datenow = date('y-m-d');

if (isset($_POST['submit'])) {
    $complain = $_POST['complain'];
    mysqli_query($conn, "INSERT INTO complains VALUE ('','$iduser','$complain', '$complaindate') ");
    echo "<script>alert('Berhasil Mengajukan Complain');</script>";
    echo "<script>location='requested.php';</script>";
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
                        <form class="" method="post" action="">
                            <div class="form-group">
                                <label for="request">Ajukan Komplain Anda</label>
                                    <textarea name="complain" id="complain" class="form-control"></textarea>
                            </div>
                            
                            <button type="submit" id="submit" name="submit" class="btn btn-danger btn-md">Submit</button>
                            <a href="requested.php" class="btn btn-success btn-md">Kembali</a>
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