<?php
session_start();

if(!isset($_SESSION['customer'])){
    header('Location: login.php');
    exit;
}

require 'function.php';
$id_user=$_SESSION['customer']['id'];
$user = query("SELECT * FROM users WHERE id = '$id_user' ");

// pengecekan tombol submit
if (isset($_POST["edit"])) {

    // pengecekan data berhasil ditambahkan atau tidak
    if (updatepasswordprofile($_POST) > 0) {
        echo "<script> 
		alert('Password Baru Berhasil DiUbah'); 
        </script>";
        echo "<script>location='profile.php';</script>";
    } else {
        echo "<script> alert('Password Gagal Diubah'); </script>";
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

<?php include 'sidebar.php'; ?>

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
                    <h1 class="h3 mb-4 text-gray-800">Change Password Profile</h1>

                    <form class="form-signin" action="" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">

                        <label for="password1">Password Baru</label>
                        <input type="password" name="password1" id="password1" placeholder="Password Baru Anda" class="form-control">

                        <label for="password2">Konfirmasi Password Baru</label>
                        <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password Baru Anda" class="form-control">

                        <button class="btn btn-md btn-primary mt-3" type="submit" name="edit" id="edit">Ubah Password Profile</button>
                        <a href="profile.php" class="btn btn-md btn-warning mt-3">Kembali</a>

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
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>