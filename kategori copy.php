<div class="row">
    <!-- post -->
    <div class="col-md-12">

        <?php
        $id = $_GET['id'];

        $ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        AND tb_berita.kategori_id = '$id'
        ORDER BY berita_tanggal DESC LIMIT 1");
        $pecah = $ambil->fetch_object();
        ?>
        <h1>
            <center>Berita Terbaru Seputar <?= $pecah->kategori_nama; ?></center>
        </h1>
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
        $id = $_GET['id'];
        $ambil1 = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        AND tb_berita.kategori_id = '$id'
        ORDER BY berita_tanggal DESC");
        $no = 0;
        while ($pecah1 = $ambil1->fetch_object()) {
        // var_dump($pecah1);
        $no++;
        // echo $no;
        if ($no != 1) { ?>
            <div class="col-md-6">
                <div class="post">
                    <a class="post-img" href="index.php?page=detail&id= <?php echo $pecah1->berita_id ?>">
                        <?php
                        // var_dump($pecah1);
                        // $pecah1
                        if (!empty($pecah1->berita_gambar)) { ?>
                            <img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="load gagal" style="width:100%;height:240px;">
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
                                echo $cetak . ".....";
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