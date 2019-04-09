
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Authors") ?>">Yazarlar</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-list"></i> Yazar Listesi
        <a style="float: right" class="btn btn-success btn-sm " href="<?php echo base_url("Admin/Authors")?>/GetAdd"><i class="fa fa-plus"></i> Add New
        Author</a>
    </div>
    <div class="card-body">


        <?php if (empty($authors)){ ?>
        <div class="alert alert-info" role="alert">
            <strong>Bilgilendirme !</strong>
            <span>Tablonuzda Kayıt Yok</span>

        </div>
        <?php } else{ ?>

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">E-posta</th>
                <th scope="col">User Name</th>
                <th scope="col">Aktif</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">E-posta</th>
                <th scope="col">User Name</th>
                <th scope="col">Aktif</th>
                <th scope="col">İşlemler</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($authors as $author){ ?>
            <tr>
                <th scope="row"><?php echo $author->Id ?></th>
                <td><?php echo $author->email ?></td>
                <td><?php echo $author->userName ?></td>
                <td><?php echo $author->isActive==1? "EVET":"HAYIR" ?></td>
                <td>
                    <button class="btn-delete btn btn-sm btn-danger" data-href="<?php echo base_url("Admin/Authors/Delete/$author->Id")?>"><i class="fa fa-trash-alt"></i> Sil</button>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url("Admin/Authors/GetUpdate/$author->Id")?>"><i class="fa fa-pencil-alt"></i> Güncelle</a>
                </td>
            </tr>
    <?php } ?>

            </tbody>
        </table>
        <?php } ?>

    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>