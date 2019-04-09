<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3 center">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Forgot Password</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("Member/PostChangePassword")?>">

                    <?php if (!empty($errors)) { ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Dikkat!</strong>
                            <span><?php echo $errors ?></span>

                        </div>
                    <?php } ?>

                    <input type="hidden" name="Id" value="<?php echo $Id ?>">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"  id = "password" class= "form-control" name = "password" autofocus = "true" placeholder = "Şifre...">
                    </div>

                    <div class="form-group">
                        <label for="re_password">Password</label>
                        <input type="password"  id = "re_password" class= "form-control" name = "re_password"  placeholder = "Şifre (Tekrar)...">
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
    <div class="col-md-2">

    </div>
    <?php $this->load->view("category_tags_v/content") ?>

</div>



