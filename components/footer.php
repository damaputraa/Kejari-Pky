<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.php" class="logo"><img src="assets/image/icon.png" height="200" alt=""></a>
                    </div>
                    <ul class="footer-nav">
                        <li><a href="#">SATYA</a></li>
                        <li><a href="#">ADHI</a></li>
                        <li><a href="#">WICAKSANA</a></li>
                    </ul>
                    <div class="footer-copyright">
                        <span>&copy;
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Copyright <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Kejaksaan Negeri Palangka Raya</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">ORGANISASI</h3>
                            <ul class="footer-links">
                                <li class="sub"><a href="#">Pembinaan</a></li>
                                <li class="sub"><a href="#">Intelijen</a></li>
                                <li class="sub"><a href="#">Perkara Perdata & Tata Usaha</a></li>
                                <li class="sub"><a href="#">Pengelolaan Barang Bukti dan Barang Rampasan</a></li>
                                <li class="sub"><a href="#">Pidana Umum</a></li>
                                <li class="sub"><a href="#">Pidana Khusus</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">KATEGORI</h3>
                            <ul class="footer-links">
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                                while ($pecah = $ambil->fetch_object()) {
                                ?>
                                    <li class="cat-<?php echo $pecah->kategori_id ?>"><a href="index.php?page=kategori&id=<?php echo $pecah->kategori_id; ?>"><?php echo $pecah->kategori_nama; ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">PETA LOKASI</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.8386339941194!2d113.92419611464372!3d-2.2144882379672697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb2f52485c53f%3A0x40393d0ae91ffd58!2sKejaksaan%20Negeri%20Palangkaraya!5e0!3m2!1sid!2sid!4v1626617592680!5m2!1sid!2sid" width="300" height="180" style="border-radius:8px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-3.3.1.js"></script>
