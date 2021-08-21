<div id="content-wrapper">

  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?page=module/admin/index">Data Admin</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>

    <h1>Data Admin</h1>

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Admin
      </div>
      <div class="card-body">
        <a href="index.php?page=module/admin/tambah" class="btn btn-primary" style="float: right">Tambah Data</a> <br><br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <!-- Hide Password -->
                <!-- <th>Password</th> -->
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $no = 1;
              $ambil = $koneksi->query("SELECT * FROM tb_admin");
              //$pecah = $ambil->fetch_array(); //menggunalkan [''] utk panggila data
              //$pecah = $ambil->fetch_assoc(); //menggunalkan [''] utk panggila data
              //$pecah = $ambil->fetch_object(); //menggunakan -> utk panggil data
              while ($pecah = $ambil->fetch_object()) {
                //var_dump($pecah);
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $pecah->admin_nama ?></td>
                  <td><?php echo $pecah->admin_username ?></td>
                  <!-- Hide Password -->
                  <!-- <td><?php echo $pecah->admin_password ?></td> -->
                  <td>
                    <a href="index.php?page=module/admin/edit&id= <?php echo $pecah->admin_id ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?page=module/admin/hapus&id= <?php echo $pecah->admin_id ?>" class="btn btn-danger" onClick="alert('Apakah Yakin Ingin Menghapus ini ?')">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Admin Kejaksaan Negeri Palangka Raya</div>
    </div>

  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Kejaksaan Negeri <?= date("Y") ?></span>
      </div>
    </div>
  </footer>

</div>
