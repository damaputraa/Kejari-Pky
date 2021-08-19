<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="assets/vendor/chart.js/Chart.min.js"></script>
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="assets/js/demo/datatables-demo.js"></script>
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-bar-demo.js"></script>
<script src="assets/js/demo/chart-bar-demo.js"></script>
<script src="assets/vendor/chart.js/Chart.js"></script>

<script>
    var ctx = document.getElementById("myBarChart1").getContext('2d');
    var myBarChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sport", "Tech", "Travel", "Food"],
            datasets: [{
                label: 'Jumlah Berita Perkategori',
                data: [
                    <?php
                    $jumlah_sport = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Sport'");
                    echo $jumlah_sport->num_rows;
                    ?>,
                    <?php
                    $jumlah_tech = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Tech'");
                    echo $jumlah_tech->num_rows;
                    ?>,
                    <?php
                    $jumlah_travel = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Travel'");
                    echo $jumlah_travel->num_rows;

                    ?>,
                    <?php
                    $jumlah_food = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Food'");
                    echo $jumlah_food->num_rows;
                    ?>
                ],
                backgroundColor: [
                    'rgba(0, 210, 21)',
                    'rgba(255, 162, 0)',
                    'rgba(17, 0, 255)',
                    'rgba(179, 0, 255)'
                ],
                borderColor: [
                    // 'rgba(255,99,132,1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById("myBarChart2").getContext('2d');
    var myBarChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sport", "Tech", "Travel", "Food"],
            datasets: [{
                label: 'Kategori Paling Banyak Dibaca',
                data: [
                    <?php
                    $jumlah_sport = $koneksi->query("SELECT SUM(berita_lihat) AS berita_lihat FROM `tb_berita` JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Sport'");
                    $a = $jumlah_sport->fetch_object();
                    echo $a->berita_lihat;
                    ?>,
                    <?php
                    $jumlah_tech = $koneksi->query("SELECT SUM(berita_lihat) AS berita_lihat FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Tech'");
                    $a = $jumlah_tech->fetch_object();
                    echo $a->berita_lihat;
                    ?>,
                    <?php
                    $jumlah_travel = $koneksi->query("SELECT SUM(berita_lihat) AS berita_lihat FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Travel'");
                    $a = $jumlah_travel->fetch_object();
                    echo $a->berita_lihat;
                    ?>,
                    <?php
                    $jumlah_food = $koneksi->query("SELECT SUM(berita_lihat) AS berita_lihat FROM tb_berita JOIN tb_kategori ON tb_berita.kategori_id = tb_kategori.kategori_id WHERE tb_kategori.kategori_nama='Food'");
                    $a = $jumlah_food->fetch_object();
                    echo $a->berita_lihat;
                    ?>
                ],
                backgroundColor: [
                    'rgba(0, 210, 21)',
                    'rgba(255, 162, 0)',
                    'rgba(17, 0, 255)',
                    'rgba(179, 0, 255)'
                ],
                borderColor: [
                    // 'rgba(255,99,132,1)',
                    // 'rgba(54, 162, 235, 1)',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
</script>



<?php
$bulan = date('m');
$tahun = date('Y');

if (isset($_POST['cari'])) {
    $bulan = $_POST['bulan_statistik'];
    $tahun = $_POST['tahun_statistik'];
}
//$a = $koneksi->query("SELECT SUM(statistik_hits) AS hits, CONCAT(MONTHNAME(statistik_tanggal),' ', YEAR(statistik_tanggal)) AS statistik_tanggal FROM tb_statistik WHERE MOUNT(statistik_tanggal) ='$bulan2' YEAR(statistik_tanggal) = '$tahun' GROUP BY LEFT(statistik_tanggal, 7)");

$a = $koneksi->query("SELECT * FROM tb_statistik WHERE LEFT(statistik_tanggal, 7 ) = '" . $tahun . "-" . $bulan . "' ORDER BY statistik_tanggal ASC");
?>
<script>
    var ctx = document.getElementById("myLineChart1");
    var myLineChart1 = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                while ($pecah = $a->fetch_array()) {
                ?>

                    "<?= tgl_indo2($pecah['statistik_tanggal']); ?>",

                <?php
                }
                ?>
            ],
            datasets: [{
                label: "",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $a = $koneksi->query("SELECT * FROM tb_statistik WHERE LEFT(statistik_tanggal, 7 ) = '" . $tahun . "-" . $bulan . "' ORDER BY statistik_tanggal ASC");
                    while ($pecah = $a->fetch_array()) {
                    ?>

                        "<?= $pecah['statistik_hits']; ?>",

                    <?php
                    }
                    ?>

                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        <?php
                        $a = $koneksi->query("SELECT * FROM tb_statistik");
                        $pecah = $a->fetch_object();
                        if ($pecah->statistik_hits <= 100) {
                        ?>
                            max: 100,
                        <?php
                        } elseif ($pecah->statistik_hits <= 500) {
                        ?>
                            max: 500,
                        <?php
                        } elseif ($pecah->statistik_hits <= 1000) {
                        ?>
                            max: 1000,
                        <?php
                        }
                        ?>

                        // max: 500,

                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
</script>


<?php
$tahun = date('Y');
if (isset($_POST['cari2'])) {
    $tahun = $_POST['tahun_statistik2'];
}
$b = $koneksi->query("SELECT SUM(statistik_hits) AS hits, CONCAT(MONTHNAME(statistik_tanggal),' ', YEAR(statistik_tanggal)) AS statistik_tanggal FROM tb_statistik WHERE YEAR(statistik_tanggal) = '$tahun' GROUP BY LEFT(statistik_tanggal, 7)");

?>
<script>
    var ctx = document.getElementById("myLineChart2");
    var myLineChart2 = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php

                while ($pecah1 = $b->fetch_array()) {
                ?>

                    "<?= $pecah1['statistik_tanggal']; ?>",

                <?php
                }
                ?>
            ],
            datasets: [{
                label: "",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $b = $koneksi->query("SELECT SUM(statistik_hits) AS hits, CONCAT(MONTHNAME(statistik_tanggal),' ', YEAR(statistik_tanggal)) AS statistik_tanggal FROM tb_statistik WHERE YEAR(statistik_tanggal) = '$tahun' GROUP BY LEFT(statistik_tanggal, 7)");
                    while ($pecah1 = $b->fetch_array()) {
                    ?>

                        "<?= $pecah1['hits']; ?>",

                    <?php
                    }
                    ?>

                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 300,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
</script>