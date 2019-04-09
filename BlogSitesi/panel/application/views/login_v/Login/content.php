<div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php }
        $failed=$this->input->get("failed");
        if (isset($failed)){?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo "Email ya da Şifre yanlış" ?></span>

             </div>
      <?php  }

        ?>
        <form method="post" action="<?php echo base_url("Admin/Login/PostLogin")?>">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?php echo isset($errors)? set_value("email"):"" ?>" name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                    <label for="inputEmail">Email address</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?php echo isset($errors)? set_value("password"):"" ?>" name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                </div>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfacYIUAAAAABht14pl-ebq7o7pSHR1SVxdLcQ2"></div>
            </div>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
        <div class="text-center mt-5">
            <a class="d-block small" href="<?php echo base_url("Admin/Login/ForgotPassword") ?>">Forgot Password?</a>
        </div>
    </div>
</div>