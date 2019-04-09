<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 15-Dec-18
 * Time: 1:34 AM
 */

class Tag extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "home_f";

        $this->load->model("Article_model");
        $this->load->helper("paging_config");
        $this->load->helper("date_format");
        $this->load->helper("seo");
    }

    public function TagList($title="")
    {
        $viewData = new stdClass();

        $this->load->library("pagination");
        $viewData->pageheader=$title." etiketi için makaleler";

        $this->load->library("pagination");

        $totalRows = $this->Article_model->joinWithOthersCount(
            array(
                "category.isDeleted" => 0,
                "category.isActive" => 1,
                "article.isDeleted" => 0,
                "article.isDraft" => 0,
                "author.isDeleted" => 0,
                "author.isActive" => 1,
            ),
            array(
                "title" => $title,
            ),
            array(
                "content" => $title,
                "category.category_name" => $title,
                "category.seo_url" => $title,
                "article.article_seo" => $title,

            ),
            array(
                array(
                    "jTable" => "author",
                    "condition" => "author.Id=article.author_id",
                    "type" => ""
                ),
                array(
                    "jTable" => "category",
                    "condition" => "article.category_id=category.Id",
                    "type" => ""
                ),
            )


        );




        if ($totalRows>0){
            $config = pagingConfig(base_url("Home/Search/" . convertToSeo($title)), $totalRows, 4, 12);
            $this->pagination->initialize($config);

            $page = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);


            $viewData->articles = $this->Article_model->joinWithOthers(
                "article.*, category.category_name, author.fullName",
                array(
                    "category.isDeleted" => 0,
                    "category.isActive" => 1,
                    "article.isDeleted" => 0,
                    "article.isDraft" => 0,
                    "author.isDeleted" => 0,
                    "author.isActive" => 1,

                ),
                "Id DESC",
                $config["per_page"],
                $page,
                array(
                    "title" => $title,
                ),
                array(
                    "content" => $title,
                    "category.category_name" => $title,
                    "category.seo_url" => $title,
                    "article.article_seo" => $title,

                ),
                array(
                    array(
                        "jTable" => "author",
                        "condition" => "author.Id=article.author_id",
                        "type" => ""
                    ),
                    array(
                        "jTable" => "category",
                        "condition" => "article.category_id=category.Id",
                        "type" => ""
                    )

                )
            );


            $viewData->links = $this->pagination->create_links();
            $viewData->viewFolder = $this->viewFolder;

            $viewData->pageTitle=$title." etiketi için makaleler | ".getSettings()->site_name;

            $this->load->view("{$viewData->viewFolder}/index", $viewData);
        }else{
            $viewData->viewFolder = $this->viewFolder;
            $this->load->view("{$viewData->viewFolder}/index", $viewData);
        }
    }
}