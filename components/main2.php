<!-- post widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Info Populer</h2>
    </div>
    <?php
    $ambil = $koneksi->query("SELECT * FROM tb_berita JOIN tb_kategori WHERE tb_berita.kategori_id = tb_kategori.kategori_id ORDER BY berita_lihat DESC LIMIT 5");
    while ($pecah = $ambil->fetch_object()) {
    ?>
        <div class="post post-widget">
            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="" style="width: 100px; height: 100px"></a>
            <div class="post-body">
                <div class="post-meta">
                    <h3 class="post-title"><a href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><?= $pecah->berita_judul; ?></a></h3>
                    <a class="post-category cat-<?php echo $pecah->kategori_id;  ?> " href="?page=kategori&id=<?php echo $pecah->kategori_id;  ?>"><?= $pecah->kategori_nama; ?></a>
                    <span class="post-date"><?= tgl_indo($pecah->berita_tanggal); ?></span>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<!-- /post widget -->

<!-- post widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Comment Terbanyak</h2>
    </div>
    <?php

    // $ambil1 = $koneksi->query("SELECT * FROM tb_berita, tb_komentar
    // WHERE tb_berita.berita_id = tb_komentar.berita_id
    // GROUP BY tb_komentar.berita_id 
    // ORDER BY tb_komentar.berita_id ASC");

    $ambil1 = $koneksi->query(
        "SELECT hasil.* FROM 
    (   SELECT 
        tb_berita.berita_judul
        ,tb_berita.berita_tanggal
        ,tb_berita.berita_gambar
        ,tb_berita.berita_isi
        ,tb_komentar.berita_id
        ,tb_kategori.kategori_id
        ,tb_kategori.kategori_nama
        ,
        count( tb_komentar.berita_id) AS banyak_komentar 
        FROM tb_komentar
        INNER JOIN tb_berita
        ON tb_komentar.berita_id=tb_berita.berita_id
        INNER JOIN tb_kategori
        ON tb_kategori.kategori_id = tb_berita.kategori_id
        
         group by tb_komentar.berita_id) 
         hasil ORDER BY hasil.banyak_komentar DESC LIMIT 5"
    );

    while ($pecah1 = $ambil1->fetch_object()) {
        //var_dump($pecah1->banyak_komentar);
    ?>
        <div class="post post-thumb">
            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah1->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah1->berita_gambar ?>" alt="" style="width: 360px; height: 200px"></a>
            <div class="post-body">
                <div class="post-meta">
                    <a class="post-category cat-<?php echo $pecah1->kategori_id;  ?> " href="?page=kategori&id=<?php echo $pecah1->kategori_id;  ?>"><?= $pecah1->kategori_nama; ?></a>
                    <span class="post-date"><?= tgl_indo($pecah1->berita_tanggal); ?></span>

                </div>
                <h3 class="post-title"><a href="index.php?page=detail&id=<?php echo $pecah1->berita_id ?>"><?= $pecah1->berita_judul; ?></a></h3>
            </div>
        </div>
    <?php } ?>

    <!-- <div class="post post-thumb">
        <a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
        <div class="post-body">
            <div class="post-meta">
                <a class="post-category cat-2" href="category.html">JavaScript</a>
                <span class="post-date">March 27, 2018</span>
            </div>
            <h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
        </div>
    </div> -->
</div>
<!-- /post widget -->

<!-- ad -->
<!-- <div class="aside-widget text-center">
    <a href="#" style="display: inline-block;margin: auto;">
        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
    </a>
</div> -->
<!-- /ad -->
