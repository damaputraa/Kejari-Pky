<div class="row">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="post post-thumb">
            <div class="carousel-inner" role="listbox">
                <?php
                $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                        ORDER BY berita_tanggal DESC LIMIT 3");
                $no = 0;
                while ($pecah = $ambil->fetch_object()) {
                    $no++;
                    if ($no == 1) {
                ?>

                        <div class="item active">
                            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" style="width:100%;height:400px"></a>

                            <div class="post-body">

                                <div class="post-meta">
                                    <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                                    <span class="post-date"><?= tgl_indo($pecah->berita_tanggal); ?></span>
                                </div>

                                <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>
                            </div>

                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="item">
                            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" style="width:100%;height:400px"></a>

                            <div class="post-body">

                                <div class="post-meta">
                                    <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                                    <span class="post-date"><?= tgl_indo($pecah->berita_tanggal); ?></span>
                                </div>
                                <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>

                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <?php
                // $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                //         WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                //         ORDER BY berita_tanggal DESC LIMIT 3");
                // while ($pecah = $ambil->fetch_object()) {
                ?>
                <!-- <div class="item">
                        <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" style="width:100%;height:400px"></a>

                        <div class="post-body">

                            <div class="post-meta">
                                <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                                <span class="post-date"><?= tgl_indo($pecah->berita_tanggal); ?></span>
                            </div>
                            <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>

                        </div>
                    </div> -->

                <?php
                //}
                ?>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- post -->

    <!-- /post -->

    <!-- post -->

    <?php
    $kata_kunci = "";
    $sql_cari = "";
    if (isset($_GET['search'])) {
        $kata_kunci = $_GET['search'];
        $sql_cari = " AND tb_berita.berita_judul LIKE '%" . $kata_kunci . "%' OR tb_berita.berita_isi LIKE '%" . $kata_kunci . "%' OR tb_kategori.kategori_nama LIKE '%" . $kata_kunci . "%'";
    }

    $per_hal = 8; // banyak berita perhalaman
    $hal = 1; // halaman bawaan
    if (isset($_GET['hal'])) { // jika halaman telah dipilih, ganti halaman bawaan jadi halaman yg dipilih
        $hal = $_GET['hal'];
    }

    // $data_berita = $koneksi->query("SELECT COUNT(tb_berita.berita_id) AS total FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE 1 $sql_cari 
    // ")->fetch_object();

    $data_berita = $koneksi->query("SELECT COUNT(tb_berita.berita_id) AS total FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id")->fetch_object();

    $banyak_berita = $data_berita->total; // total data yang akan dipaginasi
    $banyak_halaman = ceil($banyak_berita / $per_hal); // banyak halaman atau nomor paginasinya

    $limit = ($hal - 1) * $per_hal; // menghitung limit yang akan dimasukan ke query sql


    $ambil_data = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE 1 $sql_cari 
    ORDER BY berita_tanggal DESC LIMIT " . $limit . "," . $per_hal);

    // $ambil_data = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.kategori_id=tb_berita.kategori_id WHERE 1 $sql_cari 
    // ORDER BY berita_tanggal DESC LIMIT " . $limit . "," . $per_hal);

    $no = 0;
    //$exec = $koneksi->query($ambil_data);
    while ($pecah1 = $ambil_data->fetch_object()) {

        //$no++;

        if ($no != 1) { ?>
            <div class="col-md-6">
                <div class="post" style="height:500px;">
                    <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                        <?php
                        // var_dump($pecah1);
                        // $pecah1
                        if (!empty($pecah1->berita_gambar)) { ?>
                            <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:400px;">
                        <?php } else { ?>
                            <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                        <?php } ?>
                    </a>
                    <div class=" post-body">
                        <div class="post-meta">
                            <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                            <span class="post-date"><?= tgl_indo($pecah1->berita_tanggal); ?></span>
                        </div>
                        <h2>
                            <a href="index.php?page=detail&id=<?php echo $pecah1->berita_id ?>">
                                <?php
                                $kalimat = $pecah1->berita_judul;
                                $cetak = substr($kalimat, 0, 60);
                                //var_dump($cetak);
                                $p = strlen($kalimat);
                                //                                echo $p;
                                if ($p <= 60) {
                                    echo $cetak;
                                } elseif ($p > 60) {
                                    echo $cetak . ".....";
                                }


                                ?>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        <?php }
        ?>

    <?php } ?>


    <div class="col-md-12">
        <div style="font-weight:bold;">
            <center>
                <ul class="pagination">

                    <?php
                    if ($hal == 1) {
                        echo "<a style='text-decoration:none' disable>&laquo; Sebelumnya</a>";
                    } else {
                        echo "<a href='?hal=" . ($hal - 1) . "' style='text-decoration:none'>&laquo; Sebelumnya</a>";
                    }
                    if ($hal == $banyak_halaman) {
                        echo "<a style='text-decoration:none' disable>Selanjutnya &raquo;</a>";
                    } else {
                        echo "<a href='?hal=" . ($hal + 1) . "' style='text-decoration:none'>Selanjutnya &raquo;</a>";
                    }
                    ?>

                </ul>
            </center>
        </div>
    </div>
</div>
