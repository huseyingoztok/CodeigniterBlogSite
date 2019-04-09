
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Category") ?>">Kategoriler</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-list"></i> Kategori Listesi
        <a style="float: right" class="btn btn-success btn-sm " href="<?php echo base_url("Admin/Category")?>/GetAdd"><i class="fa fa-plus"></i> Add New
        Category</a>
    </div>
    <div class="card-body">




        <br><br>
        <?php if (empty($categories)){ ?>
        <div class="alert alert-info" role="alert">
            <strong>Bilgilendirme !</strong>
            <span>Tablonuzda Kayıt Yok</span>

        </div>
        <?php } else{ ?>

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Kategori Adı</th>
                <th scope="col">Üst Kategori Adı</th>
                <th scope="col">Seo Url</th>
                <th scope="col">Sıralama</th>
                <th scope="col">Aktif</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Kategori Adı</th>
                <th scope="col">Üst Kategori Id</th>
                <th scope="col">Seo Url</th>
                <th scope="col">Sıralama</th>
                <th scope="col">Aktif</th>
                <th scope="col">İşlemler</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($categories as $category){ ?>
            <tr>
                <th scope="row"><?php echo $category->Id ?></th>
                <td><?php echo $category->category_name ?></td>

                <td><?php echo getMainCategoryName($category->maincategory_id) ?></td>
                <td><?php echo $category->seo_url ?></td>
                <td><?php echo $category->priority ?></td>
                <td><?php echo $category->isActive==1? "EVET":"HAYIR" ?></td>
                <td>
                    <button class="btn-delete btn btn-sm btn-danger" data-href="<?php echo base_url("Admin/Category/Delete/$category->Id")?>"><i class="fa fa-trash-alt"></i> Sil</button>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url("Admin/Category/GetUpdate/$category->Id")?>"><i class="fa fa-pencil-alt"></i> Güncelle</a>
                </td>
            </tr>
    <?php } ?>

            </tbody>
        </table>
        <?php } ?>

    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>