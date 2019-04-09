<div class="row">

    <div class="col-md-9">
        <div class="row">
        <?php if (!empty($author)){ ?>
            <div class="row">

                <div class="col-md-4">
                    <img style="width:150px;border:solid 1px #999;"
                         src="<?php echo base_url("uploads/author_v/$author->authorImage") ?>"
                         class="mx-auto img-fluid d-block rounded-circle" alt="avatar">
                </div>

                <div class="col-md-8">
                    <h6><b>İsim & Soyisim &nbsp;:</b> <?php echo $author->fullName ?></h6>
                    <h6><b>E-mail &nbsp; &nbsp; &nbsp; &nbsp;:</b> <?php echo $author->email ?></h6>
                    <h6><b>Hakkımda &nbsp; :</b> <?php echo $author->about ?></h6>


                </div>


            </div>
            <br/><br/>
            <hr/>



        <?php }else{ ?>
            <div class="jumbotron col-md-10">
                <h1 class="display-4">Ooops!</h1>
                <p class="lead">Yazar Bulunamadı...</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="<?php echo base_url("Home")?>" role="button">Ana Sayfa</a>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>


</div>

