<?php
session_start();
include 'components/koneksi.php';
include '../components/tgl_indo.php';
if (empty($_SESSION['akun'])) {
  echo "
    <script>
    alert('Anda Harus Login');
    window.location='login.php';
    </script>
    ";
}

//var_dump($_SESSION['akun']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrator </title>
  <link rel="icon" href="../assets/image/icon.png">
  <?php include 'components/head.php'; ?>
</head>

<body id="page-top">

  <?php include 'components/top-bar.php'; ?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'components/menu.php'; ?>

    <!-- Content -->
    <?php include 'content.php'; ?>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div> -->

  <?php include 'components/script.php'; ?>

</body>

</html>
