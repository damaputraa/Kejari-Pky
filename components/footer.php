<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.php" class="logo"><img src="assets/image/icon.png" height="100" alt=""></a>
                    </div>
                    <ul class="footer-nav">
                        <li><a href="#">SATYA</a></li>
                        <li><a href="#">ADHI</a></li>
                        <li><a href="#">WICAKSANA</a></li>
                    </ul>
                    <div class="footer-copyright">
                        <span>&copy;
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
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
                            <h3 class="footer-title">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="index.php?page=about">About Us</a></li>
                                <li><a href="index.php?page=contact">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Catagories</h3>
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
                    <h3 class="footer-title">Join our Newsletter</h3>
                    <div class="footer-newsletter">
                        <form>
                            <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                            <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
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
