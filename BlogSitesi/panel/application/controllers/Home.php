<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 11-Dec-18
 * Time: 12:24 PM
 */

class Home extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "home_f";
        $this->load->model("Article_model");
        $this->load->helper("date_format");
        $this->load->helper("paging_config");
        $this->load->helper("seo");
        $this->load->helper("comment");
    }


    public function index()
    {

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;


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

        $config = pagingConfig(base_url("Home/index"), $totalRows, 3, 12);
        $this->pagination->initialize($config);

        $page = (empty($this->uri->segment(3))) ? 0 : $this->uri->segment(3);


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

        $viewData->links = $this->pagination->create_links();

        $viewData->pageheader = false;
        $this->load->view("{$viewData->viewFolder}/index", $viewData);
    }

    public function Search($getSearch = "")
    {

        $viewData = new stdClass();

        $this->load->library("pagination");
        if (empty($getSearch)) {
            $search = $this->input->get("word");
        } else {
            $search = $getSearch;
        }


        //$search=$this->input->post("word");
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
                "title" => $search,
            ),
            array(
                "content" => $search,
                "category.category_name" => $search,
                "category.seo_url" => $search,
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


        $config = pagingConfig(base_url("Home/Search/" . convertToSeo($search)), $totalRows, 4, 12);
        $this->pagination->initialize($config);

        $page = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);


        $viewData->articles = $this->Article_model->joinWithOthers(
            "article.*, category.category_name, author.fullName",
            array(
                "category.isDeleted" => 0,
                "article.isDeleted" => 0,
                "author.isDeleted" => 0,
            ),
            "Id DESC",
            $config["per_page"],
            $page,
            array(
                "title" => $search,
            ),
            array(
                "content" => $search,
                "category.category_name" => $search,
                "category.seo_url" => $search,
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

        $viewData->pageTitle = "Aranan " . $search . " | " . getSettings()->site_name;
        $viewData->pageheader = "Aranan " . $search;
        $this->load->view("{$viewData->viewFolder}/index", $viewData);
    }


    public function LastArticles()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;


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
            12,
            "",
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
        $viewData->pageTitle = "Son Makaleler | " . getSettings()->site_name;
        $viewData->pageheader = "Son Makaleler";
        $this->load->view("{$viewData->viewFolder}/index", $viewData);
    }

    public function AboutMe()
    {
        $this->load->model("Author_model");

        $author = $this->Author_model->find(
            array(
                "Id" => 1,
                "isActive" => 1,
                "isDeleted" => 0
            )
        );
        $viewData = new stdClass();
        $viewData->author = $author;
        $viewData->viewFolder = "about_f";

        $viewData->pageTitle = $author->fullName . " Hakkında | " . getSettings()->site_name;
        $viewData->pageheader = $author->fullName . " Hakkında";

        $this->load->view("{$viewData->viewFolder}/index", $viewData);
    }


    public function ArticleDetail($title = "")
    {
        if (!empty($title)) {
            $selectedArticle = $this->Article_model->find(
                array(
                    "article_seo" => $title
                )
            );

            if (!empty($selectedArticle)) {
                $viewData = new stdClass();

                $viewData->viewFolder = "article_detail_f";

                $viewData->article = $this->Article_model->findWithJoin(
                    "article.*, category.category_name, author.fullName",
                    array(
                        "article.Id" => $selectedArticle->Id
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


                $this->load->model("Comment_model");
                $viewData->articleMainComments = $this->Comment_model->joinWithOthers(
                    "comment.*,member.user_name",
                    array(
                        "comment.isDeleted" => 0,
                        "article.isDraft" => 0,
                        "article.isDeleted" =>0,
                        "member.isDeleted" => 0,
                        "member.isBlocked" => 0,
                        "member.isActive" => 1,
                        "comment.article_id" => $selectedArticle->Id,
                        "comment.parent_comment_id" =>null
                    ),
                    "article.Id ASC",
                    null,
                    null,
                    array(),
                    array(),
                    array(

                        array(
                            "jTable" => "article",
                            "condition" => "article.Id=comment.article_id",
                            "type" => ""
                        ),
                        array(
                            "jTable" => "member",
                            "condition" => "member.Id=comment.member_id",
                            "type" => ""
                        )


                    )
                );




                $viewData->tags = $this->Article_model->joinWithOthers(
                    "tag.Id, tag.tag_name",
                    array(
                        "article.isDeleted" => 0,
                        "article.isDraft" => 0,
                        "tag.isDeleted" => 0,
                        "article.Id" => $selectedArticle->Id,
                    ),
                    "article.Id ASC",
                    null,
                    null,
                    array(),
                    array(),
                    array(
                        array(
                            "jTable" => "articlestags",
                            "condition" => "article.Id=articlestags.article_id",
                            "type" => ""
                        ),
                        array(
                            "jTable" => "tag",
                            "condition" => "articlestags.tag_id=tag.Id",
                            "type" => ""
                        )

                    )
                );
                $viewCount = $selectedArticle->view_count + 1;
                $viewData->openGraph = true;
                $this->Article_model->update(
                    array(
                        "Id" => $selectedArticle->Id
                    ),
                    array(
                        "view_count" => $viewCount
                    )
                );

                $viewData->pageTitle = $selectedArticle->title . " makalesinin detayı | " . getSettings()->site_name;
                $viewData->pageheader = $selectedArticle->title . " makalesinin detayı";
                $this->load->view("{$viewData->viewFolder}/index", $viewData);
            }

        } else {
            redirect(base_url());
            die();
        }
    }


}