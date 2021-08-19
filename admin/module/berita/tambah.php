<div id="content-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=module/berita/index">Data Berita</a>
            </li>
            <li class="breadcrumb-item active">Tambah Berita</li>
        </ol>
        <h1>Tambah Data Berita</h1>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tambah Data Berita</div>
            <div class="card-body col-md-12">
                <a href="index.php?page=module/berita/index" class="btn btn-primary" style="float: left">Kembali</a> <br><br>
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="judul" autofocus="autofocus" required="required">
                            <label>Judul Berita</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <select class="form-control" name="kategori_id">
                                <option value="">Pilih Kategori</option>
                                <?php
                                //include 'koneksi.php';
                                $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                                while ($data = mysqli_fetch_array($ambil)) {
                                    echo "<option value=" . $data['kategori_id'] . ">" . $data['kategori_nama'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="date" class="form-control" name="tanggal" required="required">
                            <label>Tanggal Post</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="file" class="form-control" name="gambar" required="required">
                            <label>Gambar</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <textarea name="isi" id="editor1" rows="10" cols="80">
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('editor1');
                            </script>
                        </div>
                    </div>

                    <button class="btn btn-primary" name="simpan">Simpan</button>
                    <button class="btn btn-warning" value="reset">Reset</button>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $judul           = $_POST['judul'];
                    $kategori_id    = $_POST['kategori_id'];
                    $tanggal    = $_POST['tanggal'];

                    $nama_gambar    = $_FILES['gambar']['name'];
                    $lokasi_gambar  = $_FILES['gambar']['tmp_name'];
                    $isi      = $_POST['isi'];

                    // echo $nama . "<br>";
                    // echo $stok . "<br>";
                    // echo $nama_gambar . "<br>";
                    // echo $deskripsi . "<br>";
                    move_uploaded_file($lokasi_gambar, "assets/gambar_berita/$nama_gambar");
                    $simpan = $koneksi->query("INSERT INTO tb_berita (kategori_id,
                                                        berita_judul,
                                                        berita_tanggal,
                                                        berita_gambar,
                                                        berita_isi)
                                                        VALUES ('$kategori_id',
                                                        '$judul',
                                                        '$tanggal',
                                                        '$nama_gambar',
                                                        '$isi') ");

                    if ($simpan) {
                        echo "<script>alert('Data Disimpan');
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