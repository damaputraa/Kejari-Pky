<div id="content-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=module/kategori/index">Data Kategori</a>
            </li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
        <h1>Tambah Data Kategori</h1>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tambah Data Kategori</div>
            <div class="card-body col-md-6">
                <a href="index.php?page=module/kategori/index" class="btn btn-primary" style="float: left">Kembali</a> <br><br>
                <form method="POST">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="namakategori" autofocus="autofocus">
                            <label>Nama Kategori</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" name="simpan">Simpan</button>
                    <button class="btn btn-warning" value="reset">Reset</button>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $namakategori = $_POST['namakategori'];

                    $simpan = $koneksi->query("INSERT INTO tb_kategori (kategori_nama) VALUES ('$namakategori')");

                    if ($simpan) {
                        echo "<script>alert('Data Disimpan');
                    window.location='index.php?page=module/kategori/index';
                    </script>";
                    } else {
                        echo "<script>alert('Data Tidak Disimpan');
                    window.location='index.php?page=module/kategori/index';
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