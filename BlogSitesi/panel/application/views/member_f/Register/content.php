<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-5 center">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("Member/PostRegister")?>">

                    <?php if (!empty($errors)) { ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Dikkat!</strong>
                            <span><?php echo $errors ?></span>

                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="user_name">Kullanıcı Adı</label>
                        <input type="text" id = "user_name" class = "form-control" name = "user_name" placeholder = "Kullanıcı adınız..." value="<?php echo (isset($errors))? set_value("user_name"):""?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Adresi</label>
                        <input type="text" id = "email" class = "form-control" name = "email" placeholder = "E-mail..." value="<?php echo (isset($errors))? set_value("email"):""?>">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="password">Şifre</label>
                                <input  id = "password" class = "form-control" name = "password" placeholder = "Şifre ..."  type="password" data-eye = "true">
                            </div>
                            <div class="col-md-6">
                                <label for="repassword">Şifre (Tekrar)</label>
                                <input id = "repassword" class = "form-control" name = "repassword" placeholder = "Şifre (Tekrar) ..." type = "password" data-eye = "true" >
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-block">
                        Kayıt Ol
                    </button>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3 text-info" href="<?php echo base_url("Member/Login")?>">Giriş Yap</a>
                    <a class="d-block small text-info" href="<?php echo base_url("Member/ForgotPassword")?>">Şifremi Unuttum?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>
    <?php $this->load->view("category_tags_v/content") ?>

</div>

