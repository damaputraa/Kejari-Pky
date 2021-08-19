<div class="row">
    <!-- post -->
    <div class="col-md-12">

        <?php
        $id = $_GET['id'];

        $ambil = $koneksi->query("SELECT * FROM tb_berita RIGHT JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE tb_kategori.kategori_id = '$id' ORDER BY berita_tanggal DESC LIMIT 1 ");
        $pecah = $ambil->fetch_object();
        if ($pecah->berita_id == NULL) {
            echo "<h1>Data Berita Belum Ada</h1>";
        } else {

        ?>

            <h1>
                <center>Berita Terbaru Seputar <?= $pecah->kategori_nama; ?></center>
            </h1>
            <div class="post post-thumb">
                <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="100%" height="400px"></a>
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                        <span class="post-date"><?= date("d F Y", strtotime($pecah->berita_tanggal)); ?></span>
                    </div>
                    <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- /post -->

    <!-- post -->

    <?php
    $id = $_GET['id'];

    $per_hal = 5; // banyak berita perhalaman
    $hal = 1; // halaman bawaan
    if (isset($_GET['hal'])) { // jika halaman telah dipilih, ganti halaman bawaan jadi halaman yg dipilih
        $hal = $_GET['hal'];
    }

    $data_berita = $koneksi->query("SELECT COUNT(tb_berita.kategori_id) AS total FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE tb_berita.kategori_id= $id
    ")->fetch_object();

    $banyak_berita = $data_berita->total; // total data yang akan dipaginasi
    $banyak_halaman = ceil($banyak_berita / $per_hal); // banyak halaman atau nomor paginasinya



    $limit = ($hal - 1) * $per_hal; // menghitung limit yang akan dimasukan ke query sql


    // $ambil_data = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE tb_berita.kategori_id = '$id' ORDER BY berita_tanggal DESC LIMIT " . $limit . "," . $per_hal);

    $ambil_data = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE tb_berita.kategori_id = '$id' ORDER BY berita_tanggal DESC LIMIT $limit,$per_hal");

    $no = 0;
    if ($ambil_data->num_rows == 0) {
        echo "<p>Kembali ke home</p>";
    } else {

        while ($pecah1 = $ambil_data->fetch_object()) {
            if ($no != 1) { ?>
                ?>
                <div class="col-md-12">
                    <div class="post post-row">
                        <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah1->berita_id ?>">
                            <?php
                            // var_dump($pecah1);
                            // $pecah1
                            if (!empty($pecah1->berita_gambar)) { ?>
                                <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:240px;">
                            <?php } else { ?>
                                <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;">
                            <?php } ?>
                        </a>
                        <div class=" post-body">
                            <div class="post-meta">
                                <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                                <span class="post-date"><?= date("d F Y", strtotime($pecah1->berita_tanggal)); ?></span>
                            </div>
                            <h2>
                                <a href="index.php?page=detail&id=<?php echo $pecah1->berita_id ?>">
                                    <?php
                                    echo $pecah1->berita_judul;
                                    ?>
                                </a>
                            </h2>
                            <p>
                                <?php
                                $kalimat = $pecah1->berita_isi;
                                $cetak = substr($kalimat, 0, 150);
                                echo $cetak . ".....";
                                ?>
                                <!-- <h3><a href='berita_detail.php?kode=<?php echo $pecah1->berita_id; ?>'>Read More</a></h3> -->
                            </p>

                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>

        <div class="col-md-12">
            <div style="font-weight:bold;">
                <center>
                    <ul class="pagination">

                        <?php
                        if ($hal == 1) {
                            echo "<a style='text-decoration:none' disable>&laquo; Sebelumnya</a>";
                        } else {
                            echo "<a href='?page=kategori&id=$id&hal=" . ($hal - 1) . "' style='text-decoration:none'>&laquo; Sebelumnya</a>";
                        }
                        if ($hal == $banyak_halaman) {
                            echo "<a style='text-decoration:none' disable>Selanjutnya &raquo;</a>";
                        } else {
                            echo "<a href='?page=kategori&id=$id&hal=" . ($hal + 1) . "' style='text-decoration:none'>Selanjutnya &raquo;</a>";
                        }
                        ?>

                    </ul>
                </center>
            </div>
        </div>
    <?php } ?>
    <!-- /post -->

    <!-- post -->

    <!-- /post -->
</div>