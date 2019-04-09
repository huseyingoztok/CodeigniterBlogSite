<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Article/GetAdd") ?>">Makale Ekle</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file"></i>
        Makale Ekleme Formu
    </div>
    <div class="card-body">

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url("Admin/Article/PostAdd") ?>" enctype="multipart/form-data">


            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ana Kategori / Alt Kategori</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">

                        <?php
                        $selectedId = isset($nonValidateOption) ? $nonValidateOption : $categories[0]->Id;
                        foreach ($categories as $category) { ?>

                            <option <?php echo ($category->Id == $selectedId) ? "selected" : "" ?>
                                    value="<?php echo $category->Id ?>"><?php echo $category->category_name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Makale Başlık</label>
                    <input value="<?php echo (isset($errors)) ? set_value("title") : "" ?>" name="title" type="text"
                           class="form-control" placeholder="Makale Başlığı Giriniz...">
                </div>
            </div>





            <div class="row">
                <div class="form-group col-md-12">
                    <label>Makale İçerik</label>
                    <textarea name="content" id="content" cols="30" rows="10"
                              class="form-control"><?php echo (isset($errors)) ? set_value("content") : "" ?></textarea>
                </div>
            </div>


            <div class="row">
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
                <div class="form-group col-md-6">
                    <label>Etiketler</label>
                    <input placeholder="Etiket Giriniz ..." type="text"  data-role="tagsinput" name="tags"/>
                </div>
            </div>




            <div class="form-check">
                <input <?php echo (isset($checkState)) ? (($checkState == 1) ? "checked" : "") : "" ?>
                        class="form-check-input" type="checkbox" name="isDraft" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Taslak mı?
                </label>
            </div>


            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-outline btn-md"><span class="fa fa-check"></span>
                    Kaydet
                </button>
                <a class="btn btn-outline btn-warning btn-md" href="<?php echo base_url("Admin/Article") ?>"><span
                            class="fa fa-thumbs-down"></span> Vazgeç</a>
            </div>
        </form>


    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>



