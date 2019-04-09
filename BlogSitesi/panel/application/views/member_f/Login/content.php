<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-5 center">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Login an Account</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("Member/PostLogin")?>">

                    <?php if (!empty($errors)) { ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Dikkat!</strong>
                            <span><?php echo $errors ?></span>

                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="user_name">Username</label>
                        <input type="text" value="<?php echo (isset($errors))? set_value("user_name") : ""?>" id = "user_name" class= "form-control" name = "user_name" autofocus = "true" placeholder = "Kullanıcı Adınız...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" type = "password" id = "password" class = "form-control" name = "password"  placeholder = "Şifreniz..." data-eye = "true">
                    </div>

                    <div class="form-group no-margin ">
                        <button type="submit" class="btn btn-info btn-block">
                            Giriş Yap
                        </button>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

                </form>
                <div class="text-center">
                    <a class="d-block small mt-3 text-info" href="<?php echo base_url("Member/Register")?>">Register an Account</a>
                    <a class="d-block small text-info" href="<?php echo base_url("Member/ForgotPassword")?>">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>
    <?php $this->load->view("category_tags_v/content") ?>

</div>



