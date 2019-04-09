<nav class="navbar navbar-expand-lg navbar-dark  fixed-top"
     style="background: linear-gradient(45deg,darkslategray, darkcyan);">
    <div class="container-fluid" style="font-family: 'Exo', sans-serif;">
        <a  class="siteLogo navbar-brand" href="<?php echo base_url("Home")?>" style="font-size:xx-large"><span
                    class="fa fa-share-alt-square"></span> <?php echo getSettings()->site_name ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">


                <?php
                $t =& get_instance();
                $t->load->model("Category_model");
                $t->load->helper("category");
                $rootCategories = $t->Category_model->getAll(
                    array(
                        "maincategory_id" => null,
                        "isActive" => 1,
                        "isDeleted" => 0,
                    )

                );
                CreateMenu($rootCategories);
                ?>


                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("son-makaleler") ?>"><span
                                class="fa fa-book"></span> Son Makaleler</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("hakkimda") ?>"><span class="fa fa-info"></span>
                        Hakkımda</a>
                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if (!empty(getMemberSession()))
                {?>


                <li class="nav-item">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-user-circle"></span> <?php echo getMemberSession()->user_name?>
                    </a>
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("Member/Logout")?>"><span class="fa fa-sign-out"></span> Çıkış Yap</a>
                </li>
                <?php }
                else
                { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("Member/Register")?>"><span class="fa fa-user-plus"></span> Üye Ol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url("Member/Login")?>"><span class="fa fa-sign-in"></span> Giriş Yap</a>
                </li>
                <?php } ?>






            </ul>

            <form class="form-inline my-2 my-lg-0" action="<?php echo base_url("Home/Search")?>" method="get">
                <input name="word" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button  class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>


        </div>
    </div>
</nav>
