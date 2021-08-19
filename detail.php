<?php
$id = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM tb_berita,tb_kategori
        WHERE tb_kategori.kategori_id=tb_berita.kategori_id
        AND berita_id = '$id'");

$detail = $koneksi->query("UPDATE tb_berita SET berita_lihat = berita_lihat + 1 WHERE berita_id = $id");

$pecah = $ambil->fetch_object();
?>

<div class="section-row sticky-container">
    <div class="main-post">
        <div class="post post-thumb">
            <a class="post-img" href="index.php?page=detail&id=<?php echo $pecah->berita_id ?>"><img src="admin/assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="100%" height="600px"></a>
        </div>

        <h3><?php echo $pecah->berita_judul ?></h3>
        <h5> Dibaca Sebanyak: <?php echo $pecah->berita_lihat ?></h5>
        <p><?php echo $pecah->berita_isi ?></p>
    </div>
    <div class="post-shares sticky-shares">
        <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
        <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
    </div>
    <div class="chatbox">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tulis Komentar Anda
            </div>
            <div class="panel-body" style="height: 300px; overflow:auto;">
                <table class=" table-responsive">
                    <?php
                    $id = $_GET['id'];
                    $ambil1 = $koneksi->query("SELECT * FROM tb_komentar,tb_berita WHERE tb_komentar.berita_id=tb_berita.berita_id AND tb_komentar.berita_id ='$id'");
                    while ($pecah1 = $ambil1->fetch_object()) {
                    ?>
                        <tr>
                            <td>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <h4> <?php echo $pecah1->komentar_nama; ?> </h4>
                                    </div>
                                    <p>
                                    <h5>
                                        <i>"
                                            <?php echo $pecah1->komentar_isi;  ?>
                                            "
                                        </i>
                                    </h5>
                                    </p>
                                    <hr>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
            <div class="panel-footer">
                <form method="POST" action="">
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input name="nama" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Instagram</label>
                        <div class="controls">
                            <input name="ig" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Komentar Anda</label>
                        <div class="controls">
                            <textarea name="komen" class="form-control" id="" cols="20" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="control-group">

                        <label class="control-label">Captcha</label>
                        <img src="captcha.php" alt="gambar captcha">

                        <div class="controls">
                            <input name="kodecaptcha" type="text" class="form-control" required="required">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="simpan"></label>
                        <div class="controls">
                            <input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
                        </div>
                    </div>

                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    //session_start();
                    $id = $_GET['id'];
                    $nama = $_POST['nama'];
                    $ig = $_POST['ig'];
                    $komen = $_POST['komen'];
                    // var_dump($_SESSION["code"]);
                    // exit;
                    if ($_SESSION["code"] != $_POST["kodecaptcha"]) {
                        echo "
                            <script>
                            alert('Kode Captcha Salah');
                            window.location.href = 'index.php?page=detail&id=" . $id . "';
                            </script>
                            ";
                    } else { // jika captcha benar, maka perintah yang bawah akan dijalankan
                        $simpan = $koneksi->query("INSERT INTO tb_komentar (
                                                                berita_id,
                                                                komentar_nama,
                                                                komentar_ig,
                                                                komentar_isi)
                                                                VALUES (
                                                                '$id',
                                                                '$nama',
                                                                '$ig',
                                                                '$komen') ");

                        if ($simpan) {
                            echo "
                            <script>
                            alert('Komentar Disimpan');
                            window.location.href = 'index.php?page=detail&id=" . $id . "';
                            </script>
                            ";
                        }
                    }
                }

                ?>


            </div>
        </div>
    </div>
</div>
