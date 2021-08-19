<div id="content-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?page=module/user/index">Data User</a>
            </li>
            <li class="breadcrumb-item active">Tambah User</li>
        </ol>
        <h1>Tambah Data User</h1>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Tambah Data User</div>
            <div class="card-body col-md-6">
                <a href="index.php?page=module/user/index" class="btn btn-primary" style="float: left">Kembali</a> <br><br>
                <form method="POST">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="username" autofocus="autofocus">
                            <label>Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" class="form-control" name="password">
                            <label>Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" class="form-control" name="nama">
                            <label>Nama</label>
                        </div>
                    </div>

                    <button class="btn btn-primary" name="simpan">Simpan</button>
                    <button class="btn btn-warning" value="reset">Reset</button>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $nama = $_POST['nama'];

                    // echo $username . "<br>";
                    // echo $password . "<br>";
                    // echo $nama . "<br>";

                    $simpan = $koneksi->query("INSERT INTO tb_user (user_nama,
                                                        user_username,
                                                        user_password)
                                                        VALUES ('$nama',
                                                        '$username',
                                                        '$password') ");

                    if ($simpan) {
                        echo "<script>alert('Data Disimpan');
                    window.location='index.php?page=module/user/index';
                    </script>";
                    } else {
                        echo "<script>alert('Data Tidak Disimpan');
                    window.location='index.php?page=module/user/index';
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