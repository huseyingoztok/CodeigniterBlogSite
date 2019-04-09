<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Authors/GetAdd") ?>">Yazar Ekle</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file"></i>
        Yazar Ekleme Formu
    </div>
    <div class="card-body">

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url("Admin/Authors/PostAdd") ?>" >


            <div class="row">
                <div class="form-group col-md-6">
                    <label>E-posta</label>
                    <input name="email" type="text" class="form-control" value="<?php echo (isset($errors)) ? set_value("send_title") : "" ?>" placeholder="Mail Başlık Giriniz...">
                </div>

                <div class="form-group col-md-6">
                    <label>Host</label>
                    <input name="host" type="text" class="form-control" value="<?php echo (isset($errors)) ? set_value("host") : "" ?>" placeholder="Host Giriniz...">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Protocol</label>
                    <input name="protocol" type="text" class="form-control" value="<?php echo (isset($errors)) ? set_value("protocol") : "" ?>" placeholder="Protocol Giriniz...">
                </div>

                <div class="form-group col-md-6">
                    <label>Port</label>
                    <input name="port" type="text" class="form-control" value="<?php echo (isset($errors)) ? set_value("port") : "" ?>" placeholder="Port Giriniz...">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Mail Adresi</label>
                    <input name="_from" type="email" class="form-control" value="<?php echo (isset($errors)) ? set_value("_from") : "" ?>" placeholder="Mail Adresi Giriniz...">
                </div>

                <div class="form-group col-md-6">
                    <label>Şifre</label>
                    <input name="password" type="password" class="form-control" value="<?php echo (isset($errors)) ? set_value("password") : "" ?>" placeholder="Şifre Giriniz...">
                </div>
            </div>



            <div class="form-check">
                <input  <?php echo (isset($checkState))? (($checkState==1)? "checked":"" ):"" ?> class="form-check-input" type="checkbox" name="isActive" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Aktif Mi?
                </label>
            </div>


            <button type="submit" class="btn btn-primary btn-outline btn-md"><span class="fa fa-check"></span> Kaydet
            </button>
            <a class="btn btn-outline btn-warning btn-md" href="<?php echo base_url("Admin/Authors") ?>"><span
                        class="fa fa-thumbs-down"></span> Vazgeç</a>
        </form>


    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>