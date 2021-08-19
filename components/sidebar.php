<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="nav">
    <!-- Main Nav -->
    <div id="nav-fixed">
        <div class="container">
            <!-- logo -->
            <div class="nav-logo">
                <a href="index.php" class="logo"><img src="assets/image/icon.png" alt=""></a>
            </div>
            <!-- /logo -->

            <!-- nav -->
            <div class="topnav" id="myTopnav">
                <header class="header">
                    <ul class="nav-menu nav navbar-nav">
                        <li class="main">
                            <a href="">
                                Beranda
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Profil<span style="color: #04AA6D; margin-left:3px;">
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                </i></a>
                            <ul class="dropdown-content">
                                <li class="sub"><a href="index.php?page=detail&id=23">Doktrin Adhyaksa</a></li>
                                <li class="sub"><a href="index.php?page=detail&id=25">Tugas Pokok & Fungsi</a></li>
                                <li class="sub"><a href="index.php?page=detail&id=24">Visi & Misi</a></li>
                                <li class="sub"><a href="index.php?page=detail&id=26">Perintah Harian Jasa Agung RI</a></li>
                                <li class="sub"><a href="index.php?page=detail&id=27">Kata Sambutan</a></li>
                                <li class="sub"><a href="#">Struktur Organisasi</a></li>
                            </ul>
                        </li>
                        <li class="main">
                            <a href="">
                                PTSP Online
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Perkara<span style="color: #04AA6D; margin-left:3px;">
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                </i></a>
                            <ul class="dropdown-content">
                                <li class="sub"><a href="#">Pidana Umum</a></li>
                                <li class="sub"><a href="#">Pidana Khusus</a></li>
                                <li class="sub"><a href="#">Perkara Perdata & Tata Usaha</a></li>
                                <li class="sub"><a href="#">Jadwal Sidang</a></li>
                                <li class="sub"><a href="#">Barang Bukti</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Organisasi<span style="color: #04AA6D; margin-left:3px;">
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                </i></a>
                            <ul class="dropdown-content">
                                <li class="sub"><a href="#">Pembinaan</a></li>
                                <li class="sub"><a href="#">Intelijen</a></li>
                                <li class="sub"><a href="#">Perkara Perdata & Tata Usaha</a></li>
                                <li class="sub"><a href="#">Pengelolaan Barang Bukti dan Barang Rampasan</a></li>
                                <li class="sub"><a href="#">Pidana Umum</a></li>
                                <li class="sub"><a href="#">Pidana Khusus</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Informasi<span style="color: #04AA6D; margin-left:3px;">
                                    <i class="fas fa-caret-down"></i>
                                </span>
                                </i></a>
                            <ul class="dropdown-content">
                                <li class="sub"><a href="#">Berita</a></li>
                                <li class="sub"><a href="#">Galeri</a></li>
                                <li class="sub"><a href="#">Peraturan</a></li>
                                <li class="sub"><a href="admin/login.php" target="_blank">Login</a></li>
                            </ul>
                        </li>
                        <!-- <?php
                                $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                                while ($pecah = $ambil->fetch_object()) {
                                ?>
						<li class="cat-<?php echo $pecah->kategori_id ?>">
							<a href="index.php?page=kategori&id=<?php echo $pecah->kategori_id; ?>"><?php echo $pecah->kategori_nama; ?></a>
						</li>
					<?php
                                }
                    ?> -->
                    </ul>
                </header>
            </div>
            <!-- /nav -->

            <!-- search & aside toggle -->
            <div class="nav-btns">

                <button class="aside-btn"><i class="fa fa-bars"></i></button>
                <button class="search-btn"><i class="fa fa-search"></i></button>
                <div class="search-form">
                    <input class="search-input" type="text" name="search" placeholder="Cari Disini . . ." onkeydown="return cariBerita(event)">
                    <button name="search" class="search-close"><i class="fa fa-times"></i></button>
                </div>
                <script>
                    function cariBerita(e) { //kejadian
                        if (e.keyCode == 13) { //mendeteksi apa yg ditekan user & 13 adalah enter
                            var kata_kunci = document.getElementsByName("search")[0].value;
                            window.location.href = "index.php?search=" + kata_kunci;
                        }

                    }
                </script>


            </div>
            <!-- /search & aside toggle -->
        </div>
    </div>
    <!-- /Main Nav -->

    <!-- Aside Nav -->
    <div id="nav-aside">
        <!-- nav -->
        <div class="section-row">
            <ul class="nav-aside-menu">
                <li><a href="index.php">Beranda</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Profil<span style="color: #04AA6D; margin-left:3px;">
                            <i class="fas fa-caret-down"></i>
                        </span>
                        </i></a>
                    <ul class="dropdown-content">
                        <li class="sub"><a href="#">Doktrin Adhyaksa</a></li>
                        <li class="sub"><a href="#">Tugas Pokok & Fungsi</a></li>
                        <li class="sub"><a href="#">Visi & Misi</a></li>
                        <li class="sub"><a href="#">Perintah Harian Jasa Agung RI</a></li>
                        <li class="sub"><a href="#">Kata Sambutan</a></li>
                        <li class="sub"><a href="#">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Perkara<span style="color: #04AA6D; margin-left:3px;">
                            <i class="fas fa-caret-down"></i>
                        </span>
                        </i></a>
                    <ul class="dropdown-content">
                        <li class="sub"><a href="#">Pidana Umum</a></li>
                        <li class="sub"><a href="#">Pidana Khusus</a></li>
                        <li class="sub"><a href="#">Perkara Perdata & Tata Usaha</a></li>
                        <li class="sub"><a href="#">Jadwal Sidang</a></li>
                        <li class="sub"><a href="#">Barang Bukti</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Organisasi<span style="color: #04AA6D; margin-left:3px;">
                            <i class="fas fa-caret-down"></i>
                        </span>
                        </i></a>
                    <ul class="dropdown-content">
                        <li class="sub"><a href="#">Pembinaan</a></li>
                        <li class="sub"><a href="#">Intelijen</a></li>
                        <li class="sub"><a href="#">Perkara Perdata & Tata Usaha</a></li>
                        <li class="sub"><a href="#">Pengelolaan Barang Bukti dan Barang Rampasan</a></li>
                        <li class="sub"><a href="#">Pidana Umum</a></li>
                        <li class="sub"><a href="#">Pidana Khusus</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Informasi<span style="color: #04AA6D; margin-left:3px;">
                            <i class="fas fa-caret-down"></i>
                        </span>
                        </i></a>
                    <ul class="dropdown-content">
                        <li class="sub"><a href="#">Berita</a></li>
                        <li class="sub"><a href="#">Galeri</a></li>
                        <li class="sub"><a href="#">Peraturan</a></li>
                    </ul>
                </li>
                <li><a href="admin/login.php" target="_blank">Login</a></li>
            </ul>
        </div>
        <!-- /nav -->

        <!-- widget posts -->
        <!-- <div class="section-row">
            <h3>Recent Posts</h3>

            <div class="post post-widget">
                <a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
                <div class="post-body">
                    <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
                </div>
            </div>
        </div> -->
        <!-- /widget posts -->

        <!-- social links -->
        <div class="section-row">
            <h3>Ikuti Social Media Kami</h3>
            <ul class="nav-aside-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
        <!-- /social links -->

        <!-- aside nav close -->
        <button class="nav-aside-close"><i class="fa fa-times"></i></button>
        <!-- /aside nav close -->
    </div>
    <!-- Aside Nav -->
</div>
