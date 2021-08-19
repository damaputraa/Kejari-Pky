<div id="content-wrapper">

  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?page=home">Home</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>
    <!-- Icon Cards-->
    <!-- <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-comments"></i>
            </div>
            <div class="mr-5">26 New Messages!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-list"></i>
            </div>
            <div class="mr-5">11 New Tasks!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5">123 New Orders!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-life-ring"></i>
            </div>
            <div class="mr-5">13 New Tickets!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div> -->



    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Views Perhari
        <hr>
        <div class="col-md-12">
          <form action="" method="POST">
            <div class="form-group row">

              <label class="col-form-label col-md-1">Bulan</label>
              <div class="col-md-2">
                <select name="bulan_statistik" id="" class="form-control">
                  <option value="">Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>

              <label class="col-form-label col-md-1">Tahun</label>
              <div class="col-md-2">
                <select name="tahun_statistik" id="" class="form-control">
                  <option value="">Pilih Tahun</option>
                  <?php
                  $ambil = $koneksi->query("SELECT SUM(statistik_hits) AS hits, YEAR(statistik_tanggal) AS statistik_tanggal FROM tb_statistik GROUP BY LEFT(statistik_tanggal, 4) ORDER BY statistik_tanggal DESC");
                  while ($pecah = $ambil->fetch_object()) {
                  ?>
                    <option value="<?php echo $pecah->statistik_tanggal ?>"><?php echo $pecah->statistik_tanggal ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary" name="cari">Cari</button>
              </div>

            </div>


          </form>
        </div>
      </div>
      <div class="card-body">
        <canvas id="myLineChart1" width="100%" height="30">

        </canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


    <?php
    //$ambil = $koneksi->query("SELECT * FROM tb_statistik GROUP BY LEFT(statistik_tanggal, 4) DESC");
    //$ambil = $koneksi->query("SELECT YEAR(statistik_tanggal) AS statistik_tanggal FROM tb_statistik GROUP BY LEFT(statistik_tanggal, 4) ");
    //$hasil = [];
    //while ($pecah = $ambil->fetch_object()) {

    // if($pecah)
    //$hasil[] = $pecah;
    //echo $tgll = $pecah->statistik_tanggal;
    // $tgl = explode('-', $tgll);
    //$tgl = explode("-", $tgll);
    //echo $tgl;
    //}

    //var_dump($hasil);

    // $tahun = date('Y');
    // $q = $koneksi->query("SELECT SUM(statistik_hits) AS hits,statistik_id, CONCAT(MONTHNAME(statistik_tanggal),' ', YEAR(statistik_tanggal)) AS statistik_tanggal FROM tb_statistik WHERE YEAR(statistik_tanggal) = '$tahun'");

    // while ($result = $q->fetch_array()) {

    //   echo "<option value=" . $result['statistik_id'] . ">" . $result[''] . "</option>";
    // }

    ?>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Views Perbulan
        <hr>
        <div class="col-md-12">
          <form action="" method="POST">
            <div class="form-group row">
              <label class="col-form-label col-md-1">Tahun</label>
              <div class="col-md-2">
                <select name="tahun_statistik2" id="" class="form-control">
                  <option value="">Pilih Tahun</option>
                  <?php
                  $ambil = $koneksi->query("SELECT SUM(statistik_hits) AS hits, YEAR(statistik_tanggal) AS statistik_tanggal FROM tb_statistik GROUP BY LEFT(statistik_tanggal, 4) ORDER BY statistik_tanggal DESC");
                  while ($pecah = $ambil->fetch_object()) {
                  ?>
                    <option value="<?php echo $pecah->statistik_tanggal ?>"><?php echo $pecah->statistik_tanggal ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary" name="cari2">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card-body">
        <canvas id="myLineChart2" width="100%" height="30">

        </canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>


    <!-- Area Chart Example-->
    <div class="row">
      <div class="col-xl-6 col-sm-6 mb-6">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-bar"></i>
            Jumlah Berita Berdasarkan Kategori</div>
          <div class="card-body">
            <canvas id="myBarChart1" width="100%" height="50"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 mb-6">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-bar"></i>
            Kategori Paling Banyak Dibaca</div>
          <div class="card-body">
            <canvas id="myBarChart2" width="100%" height="50"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
    </div>
    <!-- DataTables Example -->
  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © 2019 | Syahrul</span>
      </div>
    </div>
  </footer>

</div>