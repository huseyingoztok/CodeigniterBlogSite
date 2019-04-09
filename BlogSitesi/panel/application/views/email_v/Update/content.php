<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Email/GetUpdate/$emailSetting->Id") ?>">Email Güncelle</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file"></i>
        Email Ayarları Güncelleme Formu
    </div>
    <div class="card-body">

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url("Admin/Email/PostUpdate") ?>" >

            <input name="Id" type="hidden" value="<?php echo $emailSetting->Id ?>">

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Mail Başlık</label>
                    <input name="send_title" type="text" class="form-control" value="<?php echo isset($errors)?  set_value("send_title"):$emailSetting->send_title ?>" placeholder="Mail Başlık Giriniz...">
                </div>

                <div class="form-group col-md-6">
                    <label>Host</label>
                    <input name="host" type="text" class="form-control" value="<?php echo isset($errors)?  set_value("host"):$emailSetting->host ?>" placeholder="Host Giriniz...">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Protocol</label>
                    <input name="protocol" type="text" class="form-control" value="<?php echo isset($errors)?  set_value("protocol"):$emailSetting->protocol ?>" placeholder="Protocol Giriniz...">
                </div>

                <div class="form-group col-md-6">
                    <label>Port</label>
                    <input name="port" type="text" class="form-control" value="<?php echo isset($errors)?  set_value("port"):$emailSetting->port ?>" placeholder="Port Giriniz...">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Mail Adresi</label>
                    <input name="_from" type="email" class="form-control" value="<?php echo isset($errors)?  set_value("_from"):$emailSetting->_from ?>" placeholder="Mail Adresi Giriniz...">
                </div>

                <div class="form-group col-md-6">
                    <label>Şifre</label>
                    <input name="password" type="password" class="form-control" value="<?php echo isset($errors)?  set_value("password"):$emailSetting->password ?>" placeholder="Şifre Giriniz...">
                </div>
            </div>



            <div class="form-check">
                <input  <?php echo (isset($checkState))? (($checkState==1)? "checked":"" ):($emailSetting->isActive==1)? "checked":"" ?> class="form-check-input" type="checkbox" name="isActive" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Aktif Mi?
                </label>
            </div>


            <button type="submit" class="btn btn-primary btn-outline btn-md"><span class="fa fa-check"></span> Kaydet
            </button>
            <a class="btn btn-outline btn-warning btn-md" href="<?php echo base_url("Admin/Email") ?>"><span
                        class="fa fa-thumbs-down"></span> Vazgeç</a>
        </form>


    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>