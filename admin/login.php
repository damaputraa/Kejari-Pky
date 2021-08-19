<?php
session_start();
include 'components/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin </title>
    <link rel="icon" href="../assets/image/icon.png">
    <?php include 'components/head.php'; ?>
</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" name="username" class="form-control" required="required" autofocus="autofocus">
                            <label>Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" name="password" class="form-control" required="required">
                            <label>Password</label>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Password
                            </label>
                        </div>
                    </div> -->
                    <button class="btn btn-primary btn-block" name="login">Login</button>
                    <!-- <input type="submit" name="login" value="login" class="btn btn-primary btn-block"> -->
                </form>
                <!-- <div class="text-center">
                    <a class="d-block small mt-3" href="register.html">Register an Account</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div> -->
                <?php

                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // echo $username;
                    // echo $password;
                    // exit;

                    $ambil = $koneksi->query("SELECT * FROM tb_admin WHERE admin_username='$username' AND admin_password='$password'");
                    $akun = $ambil->fetch_object();

                    $cek = $ambil->num_rows;
                    // $cek = mysqli_num_rows($ambil);  sama dengan diatas  
                    if ($cek == 1) {
                        $_SESSION['akun'] = $akun;
                        echo "
                        <script>
                        alert ('Login Sukses');
                        window.location='index.php';
                        </script>";
                    } else {
                        echo "
                        <script>
                        alert ('Login Gagal');
                        </script>";
                    }
                }

                ?>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <?php include 'components/script.php'; ?>
</body>

</html>
