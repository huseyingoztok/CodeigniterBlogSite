<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        Site Ayarları
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file"></i>
        Site Ayarları Güncelleme Formu
    </div>
    <div class="card-body">
        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>
        <form action="<?php echo base_url("Admin/Settings/UpdateSettings")?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Id" value="<?php echo $setting->Id ?>">
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Site İsmi</label>
                    <input name="site_name" value="<?php echo $setting->site_name ?>" type="text" class="form-control" placeholder="Telefon Numarası Giriniz...">
                </div>


            </div>


            <div class="row">

                    <div class="form-group col-md-4">
                        <label>Telefon</label>
                        <input name="phone" value="<?php echo $setting->phone ?>" type="text" class="form-control" placeholder="Telefon Numarası Giriniz...">
                    </div>

                    <div class="form-group col-md-4">
                        <label>E-posta</label>
                        <input name="mail" value="<?php echo $setting->mail?>" type="text" class="form-control" placeholder="E-posta Adresinizi Giriniz...">
                    </div>
                <div class="form-group col-md-4">
                    <label>Twitter</label>
                    <input name="twitter" value="<?php echo $setting->twitter ?>" type="text" class="form-control" placeholder="Twitter Hesabı...">
                </div>
            </div>

            <div class="row">



                <div class="form-group col-md-4">
                    <label>Facebook</label>
                    <input name="facebook" value="<?php echo $setting->facebook?>" type="text" class="form-control" placeholder="Facebook Hesabı...">
                </div>

                <div class="form-group col-md-4">
                    <label>Linkedin</label>
                    <input name="linkedin" value="<?php echo $setting->linkedin?>" type="text" class="form-control" placeholder="Linkedin Hesabı...">
                </div>
                <div class="form-group col-md-4">
                    <label>Instagram</label>
                    <input name="instagram" value="<?php echo $setting->instagram?>" type="text" class="form-control" placeholder="Linkedin Hesabı...">
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-12">
                    <label>Footer</label>
                    <textarea  class="form-control" name="footer"  cols="30" rows="8"><?php echo $setting->footer?></textarea>
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-4">
                    <img style="width: 50px" src="<?php echo base_url("uploads/settings_v/{$setting->favicon}")?>" alt="<?php echo $setting->favicon?>">
                </div>

                <div class="form-group col-md-6">
                    <label>Resim</label>
                    <div class="col-md-6">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail" style="width: 100px; height: 100px;"></div>
                            <div>
                                <span class="btn btn-file btn-success"><span class="fileupload-new fa fa-image"> Resim Seç</span><span
                                            class="fileupload-exists">Değiştir</span><input name="file" type="file"
                                                                                            id="file"/></span>
                                <a href="#" name="sil" class="btn btn-danger fileupload-exists"
                                   data-dismiss="fileupload">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-outline btn-md"><span class="fa fa-check"></span>
                    Kaydet
                </button>
                <a class="btn btn-outline btn-warning btn-md" href="<?php echo base_url("Admin/Settings") ?>"><span
                            class="fa fa-thumbs-down"></span> Vazgeç</a>
            </div>
        </form>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>


