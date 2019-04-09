<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/AuthorProfile") ?>">Yazar Profili</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="container my-lg-4" style="margin-top:30px">
            <div class="row my-2">
                <div class="col-lg-8 order-lg-2">
                    <ul class="nav nav-tabs">

                        <li class="nav-item">
                            <a href="" id="tprofile" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a href="" id="teditprofile" data-target="#edit" data-toggle="tab" class="nav-link">Edit
                                Profile</a>
                        </li>


                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">

                            <div class="row">
                                <div class="col-md-12">
                                    <h6><b>Full Name &nbsp;:</b> <?php echo $author->fullName ?></h6>
                                    <h6><b>Username &nbsp;:</b> <?php echo $author->userName ?></h6>
                                    <h6><b>E-mail &nbsp; &nbsp; &nbsp; &nbsp;:</b> <?php echo $author->email ?></h6>
                                    <h6><b>Hakkında &nbsp; :</b> <?php echo $author->about ?></h6>


                                </div>
                            </div>
                            <br/><br/>
                            <hr/>


                            <!--/row-->
                        </div>
                        <!-- Edit Form -->
                        <div class="tab-pane" id="edit">

                            <?php if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Dikkat!</strong>
                                    <span><?php echo $errors ?></span>

                                </div>
                            <?php } ?>

                            <form action="<?php echo base_url("Admin/AuthorProfile/PostEdit") ?>" enctype="multipart/form-data" method="post">
                                <input name="Id" type="hidden" value="<?php echo $author->Id ?>">

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ad & Soyad</label>
                                    <div class="col-lg-9">

                                        <input type="text" name="fullName" class="form-control"
                                               value="<?php echo $author->fullName ?>">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Kullanıcı Adı</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="userName" class="form-control"
                                               value="<?php echo $author->userName ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input type="email" name="email" class="form-control"
                                               value="<?php echo $author->email ?>">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo "<b>".$author->fullName."</b> Hakkında"?></label>
                                        <textarea name="about" id="content" cols="30" rows="10"
                                                  class="form-control"><?php echo $author->about ?></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="password" class="form-control"
                                               value="<?php echo $author->password ?>">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Resim</label>
                                    <div class="col-lg-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail"
                                                 style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-primary"><span
                                                            class="fileupload-new fa fa-image"> Resim Seç</span><span
                                                            class="fileupload-exists">Değiştir</span><input name="file"
                                                                                                            type="file"
                                                                                                            id="file"/></span>
                                                <a href="#" name="sil" class="btn btn-danger fileupload-exists"
                                                   data-dismiss="fileupload">Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i>
                                            Save Changes
                                        </button>
                                        <a href="<?php echo base_url("Admin/AuthorProfile") ?>" class="btn btn-secondary"><i
                                                    class="fa fa-thumbs-down"></i>Cancel</a>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 text-center">
                    <img style="width:150px;border:solid 1px #999;"
                         src="<?php echo base_url("uploads/author_v/$author->authorImage") ?>"
                         class="mx-auto img-fluid d-block rounded-circle" alt="avatar">
                </div>

            </div>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<script src="<?php echo base_url("assets") ?>/ckeditor/ckeditor.js"></script>

<script >


    var editor = CKEDITOR.instances['content'];
    if (editor) {
        editor.destroy(true);
    }

    CKEDITOR.replace('content', {

        enterMode: CKEDITOR.ENTER_BR,
        //extraPlugins: 'imageuploader',


    });



</script>
