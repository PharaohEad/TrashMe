<?php
session_start();
require 'function.php';
// Require composer autoload
require_once __DIR__ . '/vendor/mpdf/vendor/autoload.php';

$idadmin = $_SESSION['customer']['id'];
$adminprofile = query("SELECT * FROM users WHERE id = '$idadmin' ");
// var_dump($adminprofile);

if (isset($_POST['cetak'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    if ($date1 and $date2 != '') {
        $datapembayaran = query2("SELECT * FROM monthly_bill mb JOIN users u ON mb.id_users = u.id WHERE mb.date BETWEEN '$date1' AND '$date2' ");


        $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laporan Pembayaran</title>
    </head>
    <body>

    
    <div class="text-center justify-content-center">
        <img src="img/Logo_Login.png" class="mx-auto mx-auto d-block img-thumbnail" />
    </div>
    <h1>Laporan Pembayaran Per-periode Bulan</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembayar</th>
                    <th>No. Telf Pembayar</th>
                    <th>Alamat Pemba    yar</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Total Pembayaran</th>
                </tr>';

        $i = 1;
        foreach ($datapembayaran as $row) {
            $html .= '<tr>

        <td>' . $i++ . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['phone_num'] . '</td>
        <td>' . $row['address'] . '</td>
        <td>' . date('d F Y ', strtotime($row['date'])) . '</td>
        <td> Rp.' . number_format($row['payment']) . '</td>
        </tr>';
        }
        $html .= '</thead>
        </table>
    </body>
    </html>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle('Laporan Pembayaran Customer');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan Pembayaran Customer.pdf', 'I');
    } else {
        echo "<script> alert('Tanggal Tidak Boleh Kosong');  </script>";
        return false;
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
                    <h1 class="h3 mb-2 text-gray-800">Cetak Pembayaran User</h1>

                    <div class="row">
                        <div class="col-lg-4">
                        <form method="POST" action="" target="_blank">
                            <div class="form-group">
                                <label for="date1">Dari Bulan Ke -</label>
                                <input type="date" class="form-control form-control-user"
                                    id="date1" name="date1">
                            </div>
                            <div class="form-group">
                                <label for="date2">Sampai Bulan Ke -</label>
                                <input type="date" class="form-control form-control-user"
                                    id="date2" name="date2">
                            </div>
                            <button type="submit" name="cetak" id="cetak" class="btn btn-success btn-md">Cetak Laporan</button>
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