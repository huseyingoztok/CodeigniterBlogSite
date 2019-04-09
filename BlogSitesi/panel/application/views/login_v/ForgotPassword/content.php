<div class="card card-login mx-auto mt-5">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
        <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>
        <form method="post" action="<?php echo base_url("Admin/Login/PostEmail")?>">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?php echo isset($errors)? set_value("email"):"" ?>" name="email" type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                    <label for="inputEmail">Enter email address</label>
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
        </div>
    </div>
</div>