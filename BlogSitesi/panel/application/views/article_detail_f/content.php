<div class="row">

    <div class="col-md-8">

    <!-- Title -->
    <h1 class="mt-4"><?php echo $article->title;?></h1>

    <!-- Author -->
    <p class="lead">
        by
        <a target="_blank" href="<?php echo getSettings()->linkedin ?>"><?php echo $article->fullName;?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on <?php echo convertDate($article->createdAt); ?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" style="height: 400px; width: 100%; display: block;" src="<?php echo "uploads/articles_v/thumb2/_x400".$article->image_url ?>" alt="<?php echo $article->article_seo;?>">

    <hr>

    <!-- Post Content -->



    <p><?php print $article->content ?></p>

        <hr>

        <div>
            <a  target="_blank" href="https://www.twitter.com/intent/tweet?text=<?php echo $article->title ?>
            &url=<?php echo base_url("makale-detay/$article->article_seo")?>"
                class="share-button btn btn-social-icon btn-twitter">
                <span class="fa fa-twitter"></span>
            </a>

            <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url("makale-detay/$article->article_seo")?>
                            &t=<?php echo $article->title ?>" class="share-button btn btn-social-icon btn-facebook">
                <span class="fa fa-facebook"></span>
            </a>

            <a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?php echo base_url("makale-detay/$article->article_seo")?>&title=<?php echo $article->title ?>&summary=<?php echo strip_tags(substr($article->content,0,50)) ?>&source=<?php echo base_url() ?>" class="share-button btn btn-social-icon btn-linkedin">
                <span class="fa fa-linkedin"></span>
            </a>
        </div>

    <hr>


        <?php if (!empty($tags)){ ?>
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">
                <span class="fa fa-tag"></span> Etiketler : &nbsp;
                <?php

                foreach ($tags as $tag){ ?>
                    <li><span class="badge badge-info"><?php echo $tag->tag_name ?></span></li>&nbsp;
                <?php  } ?>
            </ol>
        </nav>
        <hr>
        <?php }?>

    <!-- Comments Form -->
    <div class="card my-4" id="comments">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <textarea id="commentarea" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

        <!-- deneme -->

            <div class="row">

                <?php foreach ($articleMainComments as $articleMainComment){ ?>
                    <div class="col-sm-8">
                        <div class="panel panel-white post panel-shadow">
                            <div class="post-heading">
                                <div class="pull-left image">
                                    <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle rounded-circle avatar" alt="user profile image">
                                </div>
                                <div class="pull-left meta">
                                    <div class="title h5">
                                        <a href="#"><b><?php echo $articleMainComment->user_name?></b></a>
                                        made a post.
                                    </div>
                                    <h6 class="text-muted time"><?php echo get_time_ago(strtotime($articleMainComment->createdAt))?></h6>
                                </div>
                            </div>
                            <div class="post-description">
                                <p><?php echo $articleMainComment->content?></p>
                                <div class="stats">
                                    <button onclick="replyComment(<?php echo getMemberSession()->Id ?>);" class="btn btn-default stat-item">
                                        <i class="fa fa-reply"></i> Cevap Yaz
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (getComments($articleMainComment->Id)){
                        $subComments=getComments($articleMainComment->Id);
                        foreach ($subComments as $subComment){
                        ?>
                        <div class="col-sm-8 ml-5" >
                            <div class="panel panel-white post panel-shadow">
                                <div class="post-heading">
                                    <div class="pull-left image">
                                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar rounded-circle" alt="user profile image">
                                    </div>
                                    <div class="pull-left meta">
                                        <div class="title h5">
                                            <a href="#"><b><?php echo $subComment->user_name?></b></a>
                                            made a post.
                                        </div>
                                        <h6 class="text-muted time"><?php echo get_time_ago(strtotime($subComment->createdAt))?></h6>
                                    </div>
                                </div>
                                <div class="post-description">
                                    <p><?php echo $subComment->content?></p>
                                    <div class="stats">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php }?>
                    <div class="col-md-8 mt-5"></div>
                <?php } ?>





            </div>

        <!--deneme -->

</div>
    <?php $this->load->view("category_tags_v/content") ?>

</div>

<?php $this->load->view("includes/frontend/scripts") ?>

