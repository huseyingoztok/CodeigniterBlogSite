<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Article/GetUpdate/$article->Id/$article->category_id") ?>">Makale
            Güncelle</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file"></i>
        Makale Güncelleme Formu
    </div>
    <div class="card-body">

        <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Dikkat!</strong>
                <span><?php echo $errors ?></span>

            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url("Admin/Article/PostUpdate") ?>" enctype="multipart/form-data">

            <input type="hidden" name="Id" value="<?php echo $article->Id ?>">

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ana Kategori / Alt Kategori</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">

                        <?php
                        $selectedId = isset($nonValidateOption) ? $nonValidateOption : $categories[0]->Id;
                        foreach ($categories as $category) { ?>

                            <option <?php echo isset($errors) ? ($category->Id == $nonValidateOption) ? "selected" : "" : ($category->Id == $currCategory->Id) ? "selected" : "" ?>
                                    value="<?php echo $category->Id ?>"><?php echo ($category->Id == 1) ? "Ana Kategori" : $category->category_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Makale Başlık</label>
                    <input value="<?php echo (isset($errors)) ? set_value("title") : $article->title ?>" name="title"
                           type="text" class="form-control" placeholder="Makale Başlığı Giriniz...">
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-12">
                    <label>Makale İçerik</label>
                    <textarea name="content" id="content" cols="30" rows="10"
                              class="form-control"><?php echo (isset($errors)) ? set_value("content") : $article->content ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Mevcut Resim</label>
                    <br>
                    <img style="width: 150px"
                         src="<?php echo base_url("uploads/{$this->viewFolder}/{$article->image_url}") ?>"
                         alt="<?php echo $article->title ?>">
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

            <div class="row mt-5">


                <?php
                if (!empty($tags)) { ?>
                    <div class="col-md-6">
                        <table class="table-bordered  table-hover table">
                            <theader>
                                <tr>
                                    <th style="width: 70%">Etiket</th>
                                    <th style="width: 30%">İşlemler</th>
                                </tr>


                                <tbody>
                                <?php foreach ($tags as $tag) { ?>
                                    <tr>

                                        <td contenteditable="false"
                                            id="<?php echo "comment_text_" . $tag->Id ?>"><?php echo $tag->tag_name ?>
                                        </td>
                                        <td>
                                            <button type="button" data-edit-mode="false"
                                                    onclick="editTag(this,'edit',<?php echo $tag->Id ?>,'<?php echo "#comment_text_" . $tag->Id ?>');"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i>
                                                Güncelle
                                            </button>
                                            <a href="<?php echo base_url("Admin/Article/TagDelete/{$tag->Id}/{$article->Id}/{$article->category_id}") ?>"
                                               class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Sil</a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>Etiket</th>
                                    <th>İşlemler</th>
                                </tr>
                                </tfoot>

                        </table>
                    </div>
                <?php } else {
                    ?>
                    <div class="alert alert-info col-md-6" role="alert">
                        <strong>Uyarı !</strong>
                        <span><?php echo "Makaleye ait tag bulunmamaktadır..." ?></span>
                    </div>
                <?php } ?>


                <div class="col-md-6">
                    <label>Etiketler</label>
                    <input placeholder="Etiket Giriniz ..." type="text" data-role="tagsinput" name="tags"/>
                </div>

            </div>


            <div class="form-check">
                <input <?php echo (isset($checkState)) ? (($checkState == 1) ? "checked" : "") : ($article->isDraft == 1) ? "checked" : "" ?>
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


<script>
    function editTag(btn, mode, tagId, tdId) {

        var button = $(btn);
        var state = button.data("edit-mode");
        var currTagName = $(tdId).text();
        if (mode === "edit") {
            if (!state) {
                button.data("edit-mode", true);
                button.removeClass("btn-primary");
                button.addClass("btn-success");
                var btni = button.find("i");
                btni.removeClass("fa-pencil-alt");
                btni.addClass("fa-check-square");
                $(tdId).attr("contenteditable", true);
                $(tdId).addClass("editText");
                $(tdId).focus();
            }
            else {

                button.data("edit-mode", false);
                button.addClass("btn-primary");
                button.removeClass("btn-success");
                var btni = button.find("i");
                btni.addClass("fa-pencil-alt");
                btni.removeClass("fa-check-square");
                $(tdId).attr("contenteditable", false);
                var tagName = $(tdId).text();
                var tag_id = tagId


                if (tagName.trim().length > 0) {

                    $.ajax({
                        method: 'POST',
                        url: '<?php echo base_url("Admin/Article/EditTag")?>',
                        dataType: 'json',
                        data: {tagName: tagName, tag_id: tag_id},
                        /*success: function (data)
                        {
                            alert(data);  //as a debugging message.
                        }*/
                    }).done(function (data) {
                        if (data == 1) {
                            alert("Etiket Güncellendi");
                        } else {
                            alert("Etiket Güncellenirken Hata");
                        }
                    });
                    return false;
                } else {

                    alert("Tag Adı boş olamaz")

                }


            }

        }

    }

</script>