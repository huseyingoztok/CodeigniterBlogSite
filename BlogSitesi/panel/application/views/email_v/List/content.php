
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?php echo base_url("Admin/Email") ?>">Email Ayarları</a>
    </li>

</ol>


<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-list"></i> Email Ayar Listesi
        <a style="float: right" class="btn btn-success btn-sm " href="<?php echo base_url("Admin/Email")?>/GetAdd"><i class="fa fa-plus"></i> Add New
        Mail Setting</a>
    </div>
    <div class="card-body">


        <?php if (empty($emailSettings)){ ?>
        <div class="alert alert-info" role="alert">
            <strong>Bilgilendirme !</strong>
            <span>Tablonuzda Kayıt Yok</span>

        </div>
        <?php } else{ ?>

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">E-posta Başlık</th>
                <th scope="col">Host</th>
                <th scope="col">Protocol</th>
                <th scope="col">Port</th>
                <th scope="col">Mail</th>
                <th scope="col">Aktif</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">E-posta Başlık</th>
                <th scope="col">Host</th>
                <th scope="col">Protocol</th>
                <th scope="col">Port</th>
                <th scope="col">Mail</th>
                <th scope="col">Aktif</th>
                <th scope="col">İşlemler</th>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($emailSettings as $emailSetting){ ?>
            <tr>
                <th scope="row"><?php echo $emailSetting->Id ?></th>
                <td><?php echo $emailSetting->send_title ?></td>

                <td><?php echo $emailSetting->host ?></td>
                <td><?php echo $emailSetting->protocol ?></td>
                <td><?php echo $emailSetting->port ?></td>
                <td><?php echo $emailSetting->_from ?></td>
                <td><?php echo $emailSetting->isActive==1? "EVET":"HAYIR" ?></td>
                <td>
                    <button class="btn-delete btn btn-sm btn-danger" data-href="<?php echo base_url("Admin/Email/Delete/$emailSetting->Id")?>"><i class="fa fa-trash-alt"></i> Sil</button>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url("Admin/Email/GetUpdate/$emailSetting->Id")?>"><i class="fa fa-pencil-alt"></i> Güncelle</a>
                </td>
            </tr>
    <?php } ?>

            </tbody>
        </table>
        <?php } ?>

    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>