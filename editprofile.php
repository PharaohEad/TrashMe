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
    if (updateprofile($_POST) > 0) {
        echo "<script> 
		alert('Data Berhasil DiUbah'); 
        </script>";
        echo "<script>location='profile.php';</script>";
    } else {
        echo "<script> alert('Data Gagal Diubah'); </script>";
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

                    <form class="form-signin" enctype="multipart/form-data" action="" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">

                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="email" class="form-control" readonly value="<?= $user['email']; ?>">

                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" value="<?= $user['name']; ?>">

                        <label for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" placeholder="Alamat Lengkap" class="form-control"><?= $user['address']; ?></textarea>

                        <label for="telp">No. Tlp</label>
                        <input type="varchar" name="telp" id="telp" placeholder="No. Telfon" class="form-control" value="<?= $user['phone_num']; ?>">


                        <div class="form-group row mt-3">
                        <div class="col-sm-2">Foto</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="img/<?= $user['profile_pict']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" value="<?= $user['profile_pict']; ?>">
                                        <label for="gambar" class="custom-file-label">Choose File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-md btn-primary mt-3" type="submit" name="edit" id="edit">Edit Profile</button>
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
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>