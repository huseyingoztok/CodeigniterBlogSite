<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Category/GetUpdate/{$currCategory->Id}") ?>">Kategori Güncelle</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file"></i>
        Kategori Güncelleme Formu
    </div>
    <div class="card-body">

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url("Admin/Category/PostUpdate") ?>" >

            <input name="Id" type="hidden" value="<?php echo $currCategory->Id ?>">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ana Kategori / Alt Kategori</label>
                    <select name="maincategory_id" class="form-control" id="exampleFormControlSelect1">

                        <?php
                        $selectedId=isset($nonValidateOption)? $nonValidateOption:$categories[0]->Id;
                        foreach ($categories as $category){
                            if ($category->maincategory_id==null){?>
                                <option <?php echo isset($errors)? ($category->Id==$nonValidateOption)? "selected":"":($category->Id==$currCategory->maincategory_id)? "selected":""  ?> value="<?php echo "-1" ?>"><?php echo "Root Kategori" ?></option>
                            <?php }

                            ?>
                        <option <?php echo isset($errors)? ($category->Id==$nonValidateOption)? "selected":"":($category->Id==$currCategory->maincategory_id)? "selected":""  ?> value="<?php echo $category->Id ?>"><?php echo $category->category_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kategori Adı</label>
                    <input name="category_name" value="<?php echo isset($errors)?  set_value("category_name"):$currCategory->category_name ?>" type="text" class="form-control" placeholder="Kategori Adı Giriniz...">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-2">
                    <label>Öncelik</label>
                    <input name="priority" type="number" class="form-control"  value="<?php echo isset($errors)?  set_value("priority"):$currCategory->priority ?>" >
                </div>
            </div>



            <div class="form-check">
                <input  <?php echo (isset($checkState))? (($checkState==1)? "checked":"" ):($currCategory->isActive==1)? "checked":"" ?>  class="form-check-input" type="checkbox" name="isActive" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Aktif Mi?
                </label>
            </div>


            <button type="submit" class="btn btn-primary btn-outline btn-md"><span class="fa fa-check"></span> Kaydet
            </button>
            <a class="btn btn-outline btn-warning btn-md" href="<?php echo base_url("Admin/Category") ?>"><span
                        class="fa fa-thumbs-down"></span> Vazgeç</a>
        </form>


    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>