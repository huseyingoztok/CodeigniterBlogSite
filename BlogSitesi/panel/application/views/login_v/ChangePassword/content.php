<div class="card card-login mx-auto mt-5">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
        <div class="text-center mb-4">
            <h4>Change Password</h4>
        </div>

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>
        <form method="post" action="<?php echo base_url("Admin/Login/ResetPassword")?>">

            <input type="hidden" name="Id" value="<?php echo $id ?>">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?php echo isset($errors)? set_value("password"):"" ?>" name="password" type="password" id="inputPassword1" class="form-control" placeholder="Enter password" required="required" autofocus="autofocus">
                    <label for="inputPassword1">Enter password</label>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?php echo isset($errors)? set_value("re_password"):"" ?>" name="re_password" type="password" id="inputPassword2" class="form-control" placeholder="Enter password" required="required" autofocus="autofocus">
                    <label for="inputPassword2">Enter re-password</label>
                </div>
            </div>

            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfacYIUAAAAABht14pl-ebq7o7pSHR1SVxdLcQ2"></div>
            </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
            <button class="btn btn-primary btn-block"  type="submit">Reset Password</button>
        </form>
        <div class="text-center mt-4">
            <a class="d-block small" href="<?php echo base_url("Admin/Login")?>">Login Page</a>
            <a class="d-block small" href="<?php echo base_url("Admin/Login/ForgotPassword")?>">Forgot Password</a>
        </div>
    </div>
</div>