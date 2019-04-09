<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 13-Dec-18
 * Time: 8:04 PM
 */

class Category extends CI_Controller
{
    public $viewFolder="";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder="home_f";

        $this->load->model("Category_model");
        $this->load->helper("paging_config");
        $this->load->helper("date_format");
        $this->load->helper("seo");
        $this->load->helper("comment");
    }


    public function CategoryList($title){
        $this->load->model("Article_model");
        $selectedCategory=$this->Category_model->find(
            array(
                "seo_url"       =>$title
            )
        );


        if (!empty($selectedCategory)){
            $viewData=new stdClass();

            $this->load->library("pagination");



            $totalRows=$this->Article_model->joinWithOthersCount(
                array(
                    "category.isDeleted"    => 0,
                    "category.isActive"     => 1,
                    "article.isDeleted"     => 0,
                    "article.isDraft"       => 0,
                    "author.isDeleted"      => 0,
                    "author.isActive"       => 1,
                    "category_id"           =>$selectedCategory->Id
                ),
                array(),
                array(),
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
            $config=pagingConfig(base_url("kategori/$title"),$totalRows,3,12);
            $this->pagination->initialize($config);

            $page=(empty($this->uri->segment(3)))? 0:$this->uri->segment(3);


            $viewData->articles=$this->Article_model->joinWithOthers(
                "article.*, category.category_name, author.fullName",
                array(
                    "category.isDeleted"    => 0,
                    "category.isActive"     => 1,
                    "article.isDeleted"     => 0,
                    "article.isDraft"       => 0,
                    "author.isDeleted"      => 0,
                    "author.isActive"       => 1,
                    "article.category_id"           =>$selectedCategory->Id
                ),
                "Id DESC",
                $config["per_page"],
                $page,
                array(),
                array(),
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


            $viewData->links=$this->pagination->create_links();


            $viewData->viewFolder=$this->viewFolder;

            $viewData->pageTitle=$selectedCategory->category_name." kategorisi için makaleler | ".getSettings()->site_name;
            $viewData->pageheader=$selectedCategory->category_name." kategorisi için makaleler";
            $this->load->view("{$viewData->viewFolder}/index", $viewData);
        }else{
            redirect(base_url());
            die();
        }
    }



}