<div id="content-wrapper">

  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?page=module/kategori/index">Data Kategori</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>
    <h1>Data Kategori</h1>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">

        <i class="fas fa-table"></i>
        Data Table Kategori</div>
      <div class="card-body">
        <a href="index.php?page=module/Kategori/tambah" class="btn btn-primary" style="float: right">Tambah Data</a> <br><br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $no = 1;
              $ambil = $koneksi->query("SELECT * FROM tb_kategori");
              //$pecah = $ambil->fetch_array(); //menggunalkan [''] utk panggila data
              //$pecah = $ambil->fetch_assoc(); //menggunalkan [''] utk panggila data
              //$pecah = $ambil->fetch_object(); //menggunakan -> utk panggil data
              while ($pecah = $ambil->fetch_object()) {
                //var_dump($pecah);
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $pecah->kategori_nama ?></td>
                  <td>
                    <a href="index.php?page=module/kategori/edit&id= <?php echo $pecah->kategori_id ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?page=module/kategori/hapus&id= <?php echo $pecah->kategori_id ?>" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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