<style>


    /* Style the button and place it in the middle of the container/image */
    .ctx .btn {
        position: absolute;
        left: 10%;
        top: 5%;
    }


</style>

<div class="row">

    <div class="col-md-8">
        <div class="row">
        <?php if (!empty($articles)){ ?>
        <?php foreach ($articles as $article) { ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?php echo base_url("makale-detay/".$article->article_seo)?>">
                            <div class="ctx" >
                                <img class="card-img-top"  alt="<?php echo $article->title ?>" style="height: 225px; width: 100%; display: block;" src="<?php echo base_url("uploads/articles_v/".$article->image_url)?>">
                                <a href="<?php echo base_url("kategori/".convertToSeo($article->category_name)) ?>" class="btn btn-outline-light btn-sm rounded"><?php echo $article->category_name ?></a>
                            </div>

                        </a>
                        <div class="card-body">
                            <h5 class="card-title" >
                                <a href="<?php echo base_url("makale-detay/".$article->article_seo)?>"><?php echo $article->title ?></a>
                            </h5>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><span class="fa fa-clock-o"></span> <?php echo get_time_ago(strtotime($article->createdAt))?></small>
                                <small class="text-muted"><span class="fa fa-comment"></span> <?php echo getCommentCount($article->Id) ?>
                                    <a href="makale-detay/<?php echo $article->article_seo ?>/#comments" >Yorum</a></small>
                                <small class="text-muted"><span class="fa fa-eye"></span> <?php echo $article->view_count?></small>
                            </div>
                        </div>
                    </div>
                </div>


        <?php } ?>
        <?php }else{ ?>
            <div class="col-md-1">

            </div>
            <div class="jumbotron col-md-8">
                <h1 class="display-4">Ooops!</h1>
                <p class="lead">Aradığınızı bulamadık...</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="<?php echo base_url("Home")?>" role="button">Ana Sayfa</a>
                </p>
            </div>
            <?php } ?>
        </div>
        <?php echo (empty($links))? "":$links?>
    </div>
    <?php $this->load->view("category_tags_v/content") ?>

</div>

