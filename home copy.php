<div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img_chania.jpg" alt="Chania">
            </div>

            <div class="item">
                <img src="img_chania2.jpg" alt="Chania">
            </div>

            <div class="item">
                <img src="img_flower.jpg" alt="Flower">
            </div>

            <div class="item">
                <img src="img_flower2.jpg" alt="Flower">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- post -->
    <div class="col-md-12">
        <?php
        $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        ORDER BY berita_tanggal DESC LIMIT 3");
        while ($pecah = $ambil->fetch_object()) {
        ?>
            <div class="post post-thumb">
                <div class="carousel-item">
                    <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="100%" height="400px"></a>
                    <div class="carousel-caption d-none d-md-block">
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                                <span class="post-date"><?= $pecah->berita_tanggal; ?></span>
                            </div>
                            <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>
    <!-- /post -->

    <!-- post -->

    <?php
    $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        ORDER BY berita_tanggal DESC");
    $no = 0;
    while ($pecah1 = $ambil1->fetch_object()) {
        // var_dump($pecah1);
        $no++;
        // echo $no;
        if ($no != 1) { ?>
            <div class="col-md-6">
                <div class="post" style="height:400px;">
                    <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                        <?php
                        // var_dump($pecah1);
                        // $pecah1
                        if (!empty($pecah1->berita_gambar)) { ?>
                            <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                        <?php } else { ?>
                            <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                        <?php } ?>
                    </a>
                    <div class=" post-body">
                        <div class="post-meta">
                            <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                            <span class="post-date"><?= $pecah1->berita_tanggal; ?></span>
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

    <!-- /post -->

    <!-- post -->

    <!-- /post -->
</div>





<div class="row">
    <!-- post -->
    <div class="col-md-12">
        <?php
        $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        ORDER BY berita_tanggal DESC LIMIT 1");
        $pecah = $ambil->fetch_object();
        ?>

        <div class="post post-thumb">
            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="100%" height="400px"></a>
            <div class="post-body">
                <div class="post-meta">
                    <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                    <span class="post-date"><?= $pecah->berita_tanggal; ?></span>
                </div>
                <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>
            </div>
        </div>
    </div>
    <!-- /post -->

    <!-- post -->

    <?php

    $halaman = 8; /* page halaman*/
    $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

    $result = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                ORDER BY berita_tanggal DESC");
    $total = $result->num_rows;

    $pages = ceil($total / $halaman);

    $tampilMas    = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                    WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                    ORDER BY berita_tanggal DESC LIMIT $mulai, $halaman");
    $nomor    = $mulai + 1;
    $no = 0;
    while ($pecah1    = $tampilMas->fetch_object()) {



        // $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        //     WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        //     ORDER BY berita_tanggal DESC");
        // $no = 0;
        // while ($pecah1 = $ambil1->fetch_object()) {
        //     // var_dump($pecah1);
        //     $no++;
        // echo $no;
        if ($no != 1) { ?>
            <div class="col-md-6">
                <div class="post" style="height:400px;">
                    <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                        <?php
                        // var_dump($pecah1);
                        // $pecah1
                        if (!empty($pecah1->berita_gambar)) { ?>
                            <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                        <?php } else { ?>
                            <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                        <?php } ?>
                    </a>
                    <div class=" post-body">
                        <div class="post-meta">
                            <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                            <span class="post-date"><?= $pecah1->berita_tanggal; ?></span>
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
            <ul class="pagination">
                <center>
                    Paging
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                        <li class="page-item"><a href="index.php?halaman=<?php echo $i; ?>" style="text-decoration:none"> <u><?php echo $i; ?></u></a></li>

                    <?php
                    }
                    ?>

                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                        <a href="index.php?halaman=<?php echo $i; ?>" style="text-decoration:none"><?php echo $i; ?></a>

                    <?php } ?>
                </center>
            </ul>
        </div>
    </div>


    <!-- /post -->

    <!-- post -->

    <!-- /post -->
</div>



<?php

$halaman = 8; /* page halaman*/
$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

$result = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                ORDER BY berita_tanggal DESC");
$total = $result->num_rows;

$pages = ceil($total / $halaman);

$tampilMas    = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                    WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                    ORDER BY berita_tanggal DESC LIMIT $mulai, $halaman");
$nomor    = $mulai + 1;
$no = 0;
while ($pecah1    = $tampilMas->fetch_object()) {



    // $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
    //     WHERE tb_kategori.kategori_id=tb_berita.kategori_id
    //     ORDER BY berita_tanggal DESC");
    // $no = 0;
    // while ($pecah1 = $ambil1->fetch_object()) {
    //     // var_dump($pecah1);
    //     $no++;
    // echo $no;
    if ($no != 1) { ?>
        <div class="col-md-6">
            <div class="post" style="height:400px;">
                <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                    <?php
                    // var_dump($pecah1);
                    // $pecah1
                    if (!empty($pecah1->berita_gambar)) { ?>
                        <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                    <?php } else { ?>
                        <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                    <?php } ?>
                </a>
                <div class=" post-body">
                    <div class="post-meta">
                        <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                        <span class="post-date"><?= $pecah1->berita_tanggal; ?></span>
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
        <ul class="pagination">
            <center>
                Paging
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                ?>
                    <li class="page-item"><a href="index.php?halaman=<?php echo $i; ?>" style="text-decoration:none"> <u><?php echo $i; ?></u></a></li>

                <?php
                }
                ?>

                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <a href="index.php?halaman=<?php echo $i; ?>" style="text-decoration:none"><?php echo $i; ?></a>

                <?php } ?>
            </center>
        </ul>
    </div>
</div>




















<div class="row">
    <!-- post -->
    <div class="col-md-12">
        <?php
        $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        ORDER BY berita_tanggal DESC LIMIT 1");
        $pecah = $ambil->fetch_object();
        ?>

        <div class="post post-thumb">
            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="100%" height="400px"></a>
            <div class="post-body">
                <div class="post-meta">
                    <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                    <span class="post-date"><?= $pecah->berita_tanggal; ?></span>
                </div>
                <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>
            </div>
        </div>
    </div>
    <!-- /post -->

    <!-- post -->

    <?php
    $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        ORDER BY berita_tanggal DESC");
    $no = 0;
    while ($pecah1 = $ambil1->fetch_object()) {
        // var_dump($pecah1);
        $no++;
        // echo $no;
        if ($no != 1) { ?>
            <table id="example">
                <div class="col-md-6">
                    <div class="post" style="height:400px;">
                        <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                            <?php
                            // var_dump($pecah1);
                            // $pecah1
                            if (!empty($pecah1->berita_gambar)) { ?>
                                <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                            <?php } else { ?>
                                <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                            <?php } ?>
                        </a>
                        <div class=" post-body">
                            <div class="post-meta">
                                <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                                <span class="post-date"><?= $pecah1->berita_tanggal; ?></span>
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
            </table>
        <?php }
        ?>

    <?php } ?>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType": "full_numbers"
            });
        });
    </script>


    <!-- /post -->

    <!-- post -->

    <!-- /post -->
</div>




fix

<?php

$halaman = 2; /* page halaman*/
$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

$result = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                ORDER BY berita_tanggal DESC");
$total = $result->num_rows;

$pages = ceil($total / $halaman);

$tampilMas    = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                    WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                    ORDER BY berita_tanggal DESC LIMIT $mulai, $halaman");
$nomor    = $mulai + 1;
$no = 0;
while ($pecah1    = $tampilMas->fetch_object()) {



    // $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
    //     WHERE tb_kategori.kategori_id=tb_berita.kategori_id
    //     ORDER BY berita_tanggal DESC");
    // $no = 0;
    // while ($pecah1 = $ambil1->fetch_object()) {
    //     // var_dump($pecah1);
    //     $no++;
    // echo $no;
    if ($no != 1) { ?>
        <div class="col-md-6">
            <div class="post" style="height:400px;">
                <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                    <?php
                    // var_dump($pecah1);
                    // $pecah1
                    if (!empty($pecah1->berita_gambar)) { ?>
                        <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                    <?php } else { ?>
                        <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                    <?php } ?>
                </a>
                <div class=" post-body">
                    <div class="post-meta">
                        <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                        <span class="post-date"><?= $pecah1->berita_tanggal; ?></span>
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
        <ul class="pagination">
            <center>
                <?php
                $a = 1;
                for ($i = 1; $i <= $pages; $i++) { ?>
                    <?php $i ?>
                <?php } ?>


                <a class="" href="index.php?halaman=<?php echo $_GET['halaman'] - 1; ?>" style="text-decoration:none">Previous</a>
                <a class="" href="index.php?halaman=<?php echo  $_GET['halaman'] + 1; ?>" style="text-decoration:none">Next
                </a>
            </center>
        </ul>
    </div>
</div>










<?php

$halaman = 1; /* page halaman*/
$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

$result = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                            WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                            ORDER BY berita_tanggal DESC");
$total = $result->num_rows;

$pages = ceil($total / $halaman);

$tampilMas    = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                ORDER BY berita_tanggal DESC LIMIT $mulai, $halaman");
$nomor    = $mulai + 1;
$no = 0;
while ($pecah1    = $tampilMas->fetch_object()) {



    // $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
    //     WHERE tb_kategori.kategori_id=tb_berita.kategori_id
    //     ORDER BY berita_tanggal DESC");
    // $no = 0;
    // while ($pecah1 = $ambil1->fetch_object()) {
    //     // var_dump($pecah1);
    //     $no++;
    // echo $no;
    if ($no != 1) { ?>
        <div class="col-md-6">
            <div class="post" style="height:400px;">
                <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                    <?php
                    // var_dump($pecah1);
                    // $pecah1
                    if (!empty($pecah1->berita_gambar)) { ?>
                        <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                    <?php } else { ?>
                        <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
                    <?php } ?>
                </a>
                <div class=" post-body">
                    <div class="post-meta">
                        <a class="post-category cat-<?php echo $pecah1->kategori_id ?>" href="blog-post.html"><?= $pecah1->kategori_nama; ?></a>
                        <span class="post-date"><?= $pecah1->berita_tanggal; ?></span>
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
        <ul class="pagination">
            <center>
                <a class="" href="index.php?halaman=<?php echo $_GET['halaman'] - 1; ?>" style="text-decoration:none">Previous</a>
                <?php
                $a = 1;
                for ($i = 1; $i <= $pages; $i++) { ?>
                    <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>



                <a class="" href="index.php?halaman=<?php echo  $_GET['halaman'] + 1; ?>" style="text-decoration:none">Next
                </a>
            </center>
        </ul>
    </div>
</div>


<!-- /post -->

<!-- post -->

<!-- /post -->
</div>





fix benar

<?php

$halaman = 8; /* page halaman*/
$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

$result = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                ORDER BY berita_tanggal DESC");
$total = $result->num_rows;

$pages = ceil($total / $halaman);

$tampilMas    = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                    WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                    ORDER BY berita_tanggal DESC LIMIT $mulai, $halaman");
$nomor    = $mulai + 1;
$no = 0;
while ($pecah1    = $tampilMas->fetch_object()) {



    // $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
    //     WHERE tb_kategori.kategori_id=tb_berita.kategori_id
    //     ORDER BY berita_tanggal DESC");
    // $no = 0;
    // while ($pecah1 = $ambil1->fetch_object()) {
    //     // var_dump($pecah1);
    //     $no++;
    // echo $no;
    if ($no != 1) { ?>
        <div class="col-md-6">
            <div class="post" style="height:400px;">
                <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                    <?php
                    // var_dump($pecah1);
                    // $pecah1
                    if (!empty($pecah1->berita_gambar)) { ?>
                        <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:250px;">
                    <?php } else { ?>
                        <img src="admin/assets/gambar_berita/2.png" alt="load gagal" style="width:100%;height:240px;">
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
        <ul class="pagination">
            <center>
                <!-- <a class="" href="index.php?halaman=<?php //echo $_GET['halaman'] - 1; 
                                                            ?>" style="text-decoration:none">Previous</a> -->
                <?php
                $a = 1;
                for ($i = 1; $i <= $pages; $i++) { ?>
                    <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>



                <!-- <a class="" href="index.php?halaman=<?php //echo  $_GET['halaman'] + 1; 
                                                            ?>" style="text-decoration:none">Next
                    </a> -->
            </center>
        </ul>
    </div>
</div>






$per_hal = 2; // Batas data per halaman

$hal = @$_GET['hal'];

if ($hal <= 1) { $st=0; } else { $st=($hal - 1) * $per_hal; } $prev=$hal - 1; $next=$hal + 1; $st=$st; $nd=$per_hal; $limit="limit $st,$nd" ; $ambil_data=$koneksi->query("SELECT * FROM tb_berita,tb_kategori
    WHERE tb_kategori.kategori_id=tb_berita.kategori_id
    ORDER BY berita_tanggal DESC $limit");

    $no = 0;
    //$exec = $koneksi->query($ambil_data);
    while ($pecah1 = $ambil_data->fetch_object()) {

    <?php
    $exec2 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                                 WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                                 ORDER BY berita_tanggal DESC");

    $hitung_data = $exec2->num_rows;
    $hitung_data = ceil($hitung_data / $per_hal);

    if ($prev < 1) {
        echo "&laquo; Sebelumnya";
    } else {
        echo "<a href='?hal=$prev'>&laquo; Sebelumnya</a>";
    }


    if ($next > $hitung_data) {
        echo "Selanjutnya &raquo;";
    } else {
        echo "<a href='?hal=$next'>Selanjutnya &raquo;</a>";
    }
    ?>





    fixx


    <div class="col-md-12">
        <div class="post post-thumb">
            <?php
            $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                        ORDER BY berita_tanggal DESC LIMIT 1");
            $pecah = $ambil->fetch_object();
            ?>
            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="100%" height="400px"></a>
            <div class="post-body">
                <div class="post-meta">
                    <a class="post-category cat-<?php echo $pecah->kategori_id ?>" href="blog-post.html"><?= $pecah->kategori_nama; ?></a>
                    <span class="post-date"><?= tgl_indo($pecah->berita_tanggal); ?></span>
                </div>
                <h2><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>" style="color: white;"><?= $pecah->berita_judul; ?></a></h2>
            </div>

        </div>
    </div>






    coraousel
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
                        ORDER BY berita_tanggal DESC LIMIT 1");
                while ($pecah = $ambil->fetch_object()) {
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
                }
                ?>
                <?php
                $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
                        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
                        ORDER BY berita_tanggal DESC LIMIT 3");
                while ($pecah = $ambil->fetch_object()) {
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
                ?>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
            <span class="sr-only">Next</span>
        </a>
    </div>