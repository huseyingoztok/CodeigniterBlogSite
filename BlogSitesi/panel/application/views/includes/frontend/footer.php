<footer class="py-xl-5" style="background: linear-gradient(45deg,darkslategray, darkcyan);">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center text-white">
                <h5><strong>Follow Me</strong></h5>
                <hr />
                <a target="_blank" href="<?php echo getSettings()->facebook ?>" class="btn btn-social-icon btn-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a target="_blank" href="<?php echo getSettings()->twitter ?>" class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>

                <a target="_blank" href="<?php echo getSettings()->linkedin ?>" class="btn btn-social-icon btn-linkedin">
                    <span class="fa fa-linkedin"></span>
                </a>

                <a target="_blank" href="<?php echo getSettings()->instagram ?>" class="btn btn-social-icon btn-instagram">
                    <span class="fa fa-instagram"></span>
                </a>


            </div>

            <div class="col-md-4 text-center text-white">
                <a class="siteLogo navbar-brand" style="color: #FFF" href="<?php echo base_url() ?>"><h5><span class="fa fa-share-alt-square"></span> <strong><?php echo getSettings()->site_name?></strong></h5></a>

                <p class="text-center text-white"><?php echo getSettings()->footer ?> <?php echo date('Y') ?></p>
            </div>

            <div class="col-md-4 text-center text-white">
                <h5><strong>Bülten üyeliği için</strong></h5>
                <hr />
                <div class="col-md-10 offset-md-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="E-posta adresiniz..." />
                        <span class="input-group-btn">
                                <button type="submit" class="btn btn-outline-light">
                                    <span class="fa fa-send"> Gönder</span>
                                </button>
                            </span>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
</footer>

