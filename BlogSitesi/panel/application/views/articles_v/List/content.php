
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Article") ?>">Yazılarım</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-list"></i> Makale Listesi


        <a style="float: right" class="btn btn-success btn-sm " href="<?php echo base_url("Admin/Article")?>/GetAdd"><i class="fa fa-plus"></i> Add New
        Article</a>

        <form style="float: right" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="<?php echo base_url("Admin/Article/search") ?>" method="get">
            <div class="input-group">
                <input type="text" name="word" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">




        <br><br>

        <?php if (empty($articles)){ ?>
            <div class="alert alert-info" role="alert">
                <strong>Bilgilendirme !</strong>
                <span>Tablonuzda Kayıt Yok</span>

            </div>
        <?php } else{ ?>

        <table class="table table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th style="width: 5%;" scope="col">#Id</th>
                <th style="width:20%;" scope="col">Başlık</th>
                <th style="width:20%;" scope="col">İçerik</th>
                <th style="width:10%;" scope="col">Resim</th>
                <th style="width:10%;" scope="col">Yazar</th>
                <th style="width:15%;" scope="col">Kategori</th>
                <th style="width:5%;" scope="col">Taslak</th>
                <th style="width:15%;" scope="col">İşlemler</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Başlık</th>
                <th scope="col">İçerik</th>
                <th scope="col">Resim</th>
                <th scope="col">Yazar</th>
                <th scope="col">Kategori</th>
                <th scope="col">Taslak</th>
                <th scope="col">İşlemler</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($articles as $article){ ?>
            <tr>
                <th scope="row"><?php echo $article->Id ?></th>
                <td><?php echo $article->title ?></td>
                <td><?php echo (strlen($article->content)>100)? substr($article->content,0,100)." ...":$article->content ?></td>
                <td><img style="width: 100px;" alt="<?php echo $article->title ?>" src="<?php echo base_url("uploads/{$this->viewFolder}/{$article->image_url}") ?>"></td>
                <td><?php echo $article->fullName ?></td>

                <td><?php echo $article->category_name ?></td>

                <td><?php echo $article->isDraft==1? "EVET":"HAYIR" ?></td>
                <td>
                    <button class="btn-delete btn btn-sm btn-danger" data-href="<?php echo base_url("Admin/Article/Delete/$article->Id")?>"><i class="fa fa-trash-alt"></i> Sil</button>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url("Admin/Article/GetUpdate/$article->Id/$article->category_id")?>"><i class="fa fa-pencil-alt"></i> Güncelle</a>
                </td>
            </tr>
    <?php } ?>
            </tbody>
        </table>
        <?php } ?>
        <?php echo $links ?>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>