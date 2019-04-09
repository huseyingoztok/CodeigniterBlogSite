<div class="col-md-4">

    <div class="mt-5">
        <h5 class="card-header">Etiketler</h5>
        <div class="card-body">
            <div class="row">


                <?php
                $this->load->helper("seo");
                $this->load->helper("tag");
                $tags=getTags();

                if (!empty($tags)){
                    $count=0;
                    foreach ($tags as $tag) {
                        if ($count%2==0){  ?>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="<?php echo base_url("tag/".convertToSeo($tag->tag_name)) ?>"><?php echo $tag->tag_name ?></a>
                                    </li>

                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="<?php echo base_url("tag/".convertToSeo($tag->tag_name)) ?>"><?php echo $tag->tag_name ?></a>
                                    </li>
                                </ul>
                            </div>
                        <?php }
                        ?>


                        <?php $count++; } } else{?>
                    <div class="alert alert-info">Tag Bulunamadı.</div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div>
        <h5 class="card-header">Kategoriler</h5>
        <div class="card-body">
            <div class="row">


                <?php
                $this->load->helper("category");
                $categories=getCategories();
                if (!empty($categories)){
                    $count=0;
                    foreach ($categories as $category) {
                        if ($count%2==0){  ?>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="<?php echo base_url("kategori/".convertToSeo($category->seo_url)) ?>"><?php echo $category->category_name ?></a>
                                    </li>

                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="<?php echo base_url("kategori/".convertToSeo($category->seo_url)) ?>"><?php echo $category->category_name ?></a>
                                    </li>
                                </ul>
                            </div>
                    <?php }
                    ?>


                <?php $count++; } } else{?>
                <div class="alert alert-info">Kategori Bulunamadı.</div>
                <?php } ?>
            </div>
        </div>
    </div>




</div>


