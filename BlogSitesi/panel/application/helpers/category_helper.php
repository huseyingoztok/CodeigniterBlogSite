<?php
function CreateMenu($rootCats = array())
{
    $t = get_instance();
    $t->load->model("Category_model");

    foreach ($rootCats as $rootCat) {
        $rootCatCategories = $t->Category_model->getAll(
            array(
                "maincategory_id" => $rootCat->Id,
                "isActive" => 1,
                "isDeleted" => 0,
            ),
            "priority ASC"
        );



        if (count($rootCatCategories) > 0) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"
                   href="">
                    <?php echo $rootCat->category_name ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php CreateSubMenuItems($rootCat) ?>
                </ul>
            </li>
        <?php } else { ?>
            <li class="nav-item"
                href="">
                <?php echo $rootCat->category_name ?>
            </li>
        <?php }
    }
}


function CreateSubMenuItems($cat)
{
    $t = get_instance();
    $t->load->model("Category_model");
    $t->load->helper("seo");

    $catCategories = $t->Category_model->getAll(
        array(
            "maincategory_id" => $cat->Id,
            "isActive" => 1,
            "isDeleted" => 0,
        ),
        "priority ASC"
    );

    foreach ($catCategories as $subCat) {
        $subCatCategories = $t->Category_model->getAll(
            array(
                "maincategory_id" => $subCat->Id,
                "isActive" => 1,
                "isDeleted" => 0,
            ),
            "priority ASC"
        );

        if (count($subCatCategories) > 0) { ?>
            <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle">
                    <?php echo $subCat->category_name ?>
                </a>
                <?php if (count($subCatCategories) > 0)
                { ?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php CreateSubMenuItems($subCat) ?>
                    </ul>
                <?php } ?>
            </li>

        <?php } else { ?>
            <li>
                <a class="dropdown-item" href="<?php echo base_url("kategori/".convertToSeo($subCat->category_name))?>">
                    <?php echo $subCat->category_name ?>
                </a>
            </li>
        <?php }
    }
}



function getMainCategoryName($mainCatId){
    $t=get_instance();
    $mCatName="";
    $t->load->model("Category_model");

    $mainCategoryName=$t->Category_model->find(
        array(
            "Id"        =>$mainCatId,
            "Id!="      =>1,
            "isActive"  =>1,
            "isDeleted" =>0
        )
    );

    if (empty($mainCatId)){
        $mCatName="Root Kategori";
    }else if ($mainCatId==1){
        $mCatName="Ana Kategori";
    }else{
        if (empty($mainCategoryName->category_name)){
            $mCatName="Category Not Found";
        }else{
            $mCatName=$mainCategoryName->category_name;
        }

    }

    return $mCatName;
}





function getCategories(){
    $t=&get_instance();

    $categories=$t->session->userdata("categories");
    if (empty($categories)){
        $t->load->model("Category_model");

        $categories=$t->Category_model->getAll(
            array(
                "isDeleted" => 0,
                "isActive"  => 1,
                "maincategory_id !="    =>null,
                "maincategory_id !="    =>1,
            )
        );

        $t->session->set_userdata("categories",$categories);
    }

    return $categories;
}

