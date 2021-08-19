<?php
$id = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM tb_berita WHERE berita_id = '$id'");
$pecah = $ambil->fetch_object();
//var_dump($pecah);
?>

<div id="content-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=module/berita/index">Data Berita</a>
            </li>
            <li class="breadcrumb-item active">Edit Data Berita</li>
            <li class="breadcrumb-item">
                <?php echo $pecah->berita_id ?>
            </li>


        </ol>
        <h1>Edit Data berita</h1>

        <!-- DataTables Example -->
        <div class=" card mb-12">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Edit Data berita</div>
            <div class="card-body col-md-12">
                <a href="index.php?page=module/berita/index" class="btn btn-primary" style="float: left">Kembali</a> <br><br>
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="hidden" class="form-control" name="id" autofocus="autofocus" required="required" value=" <?php echo $pecah->berita_id ?> ">
                            <input type="text" class="form-control" name="judul" autofocus="autofocus" required="required" value="<?php echo $pecah->berita_judul ?>">
                            <label>Judul Berita</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" name="kategori_id">
                                <option value="">Pilih Kategori</option>

                                <!-- echo "
                                    <option value=$data->kategori_id " . ($pecah->kategori_id == $data->kategori_id ? 'selected' : '') . ">
                                    " . $data->kategori_nama . "
                                    </option>"; -->
                                <!-- <option value="$data->kategori_id" 
                                        <?php // if ($data->kategori_id == $pecah->kategori_id) { 
                                        ?> selected <?php // } 
                                                    ?>>
                                        <?php // echo $data->kategori_nama 
                                        ?>
                                    </option> -->

                                <?php
                                $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                                while ($data = $ambil->fetch_object()) { ?>
                                    <option value="<?= $data->kategori_id ?>"><?= $data->kategori_nama ?></option>
                                <?php }
                                ?>

                                <script>
                                    document.getElementsByName('kategori_id')[0].value = "<?php echo $pecah->kategori_id ?>";
                                </script>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="date" class="form-control" name="tanggal" required="required" value="<?php echo $pecah->berita_tanggal ?>">
                            <label>Tanggal Post</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <center><img src="assets/gambar_berita/<?php echo $pecah->berita_gambar ?>" alt="load gagal" width="300px"></center>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <textarea name="isi" id="editor1" rows="10" cols="80">
                                <?php echo $pecah->berita_isi; ?>
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('editor1');
                            </script>
                        </div>
                    </div>


                    <button class="btn btn-primary" name="edit">Update</button>
                    <button class="btn btn-warning" value="reset">Reset</button>
                </form>
                <?php
                if (isset($_POST['edit'])) {
                    $id = $_POST['id'];
                    $judul = $_POST['judul'];
                    $kategori_id = $_POST['kategori_id'];
                    $tanggal = $_POST['tanggal'];
                    //$gambar = $_POST['gambar'];
                    $nama_gambar    = $_FILES['gambar']['name'];
                    $lokasi_gambar  = $_FILES['gambar']['tmp_name'];
                    $isi = $_POST['isi'];


                    // echo $id;
                    // echo "<br>";
                    // echo $judul;
                    // echo "<br>";
                    // echo $kategori_id;
                    // echo "<br>";
                    // echo $tanggal;
                    // echo "<br>";
                    // echo $nama_gambar;
                    // echo "<br>";
                    // echo $lokasi_gambar;
                    // echo "<br>";
                    // echo $isi;
                    // echo "<br>";

                    // exit;

                    if ($nama_gambar != "") {
                        $gambar = $pecah->berita_gambar;

                        unlink('assets/gambar_berita/' . $gambar);
                        move_uploaded_file($lokasi_gambar, "assets/gambar_berita/$nama_gambar");

                        $edit = $koneksi->query("UPDATE tb_berita SET kategori_id= '$kategori_id',
                                                                    berita_judul= '$judul',
                                                                    berita_tanggal= '$tanggal',
                                                                    berita_gambar= '$nama_gambar',
                                                                    berita_isi='$isi'
                                                                    WHERE berita_id='$id'");
                    } else {
                        $edit = $koneksi->query("UPDATE tb_berita SET kategori_id= '$kategori_id',
                                                                    berita_judul= '$judul',
                                                                    berita_tanggal= '$tanggal',
                                                                    berita_isi= '$isi'
                                                                    WHERE berita_id='$id'");
                    }



                    if ($edit) {
                        echo "<script>
                        Swal.fire(
                            'Update!',
                            'Your file has been Update.',
                            'success'
                        );
                        window.location='index.php?page=module/berita/index';
                        </script>";
                    } else {
                        echo "<script>alert('Data Tidak Disimpan');
                        window.location='index.php?page=module/berita/index';
                        </script>";
                    }
                }

                ?>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>

</div>