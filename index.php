<?php
include "./admin/components/koneksi.php";
include "components/tgl_indo.php";
session_start();

$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = time(); //

// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
$s = $koneksi->query("SELECT * FROM tb_statistik WHERE statistik_ip='$ip' AND statistik_tanggal='$tanggal'");
$a = $s->num_rows;
// Kalau belum ada, simpan data user tersebut ke database
if ($a == 0) {
    $koneksi->query("INSERT INTO tb_statistik(statistik_ip, statistik_tanggal, statistik_hits, statistik_online) VALUES('$ip','$tanggal','1','$waktu')");
}
// Jika sudah ada, update
else {
    $koneksi->query("UPDATE tb_statistik SET statistik_hits=statistik_hits+1, statistik_online='$waktu' WHERE statistik_ip='$ip' AND statistik_tanggal='$tanggal'");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/header.php'; ?>
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header id="header">
        <!-- Nav -->
        <?php
        include "components/sidebar.php";
        ?>
        <!-- /Nav -->
    </header>
    <!-- /Header -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php include 'conten.php'; ?>
                </div>

                <div class="col-md-4">
                    <?php include 'components/main2.php'; ?>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <!-- /section -->
    </div>

    <!-- section -->

    <!-- /section -->

    <!-- section -->

    <!-- /section -->

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

</body>

</html>
