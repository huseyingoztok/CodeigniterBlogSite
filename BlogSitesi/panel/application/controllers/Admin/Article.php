<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 04-Dec-18
 * Time: 1:41 PM
 */

class Article extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        $this->viewFolder = "articles_v";
        parent::__construct();
        $this->load->model("Article_model");
        if (!getAdminSession()) {
            redirect(base_url("Admin/Login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "List";


        $this->load->helper("paging_config");


        $this->load->library("pagination");

        $totalRows = $this->Article_model->joinWithOthersCount(
            array(
                "category.isDeleted" => 0,
                "article.isDeleted" => 0,
                "author.isDeleted" => 0,
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


        $config = pagingConfig(base_url("Admin/Article/index"), $totalRows, 4, 10);
        $this->pagination->initialize($config);

        $page = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);


        $viewData->articles = $this->Article_model->joinWithOthers(
            "article.*, category.category_name, author.fullName",
            array(
                "category.isDeleted" => 0,
                "article.isDeleted" => 0,
                "author.isDeleted" => 0,
            ),
            "Id ASC",
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
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function search($getSearch = "")
    {
        $this->load->helper("paging_config");
        $this->load->helper("seo");


        $viewData = new stdClass();
        $this->load->library("pagination");
        if (!empty($getSearch)) {
            $search = $getSearch;
        } else {
            $search = $this->input->get("word");
        }
        $viewData = new stdClass();


        $totalRows = $this->Article_model->joinWithOthersCount(
            array(
                "category.isDeleted" => 0,
                "article.isDeleted" => 0,
                "author.isDeleted" => 0,
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


        $config = pagingConfig(base_url("Admin/Article/search/" . convertToSeo($search)), $totalRows, 5, 10);
        $this->pagination->initialize($config);

        $page = (empty($this->uri->segment(5))) ? 0 : $this->uri->segment(5);

        $viewData->articles = $this->Article_model->joinWithOthers(
            "article.*, category.category_name, author.fullName",
            array(
                "category.isDeleted" => 0,
                "article.isDeleted" => 0,
                "author.isDeleted" => 0,
            ),
            "Id ASC",
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
        $viewData->subViewFolder = "List";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function GetAdd()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Add";
        $this->load->model("Category_model");


        $viewData->categories = $this->Category_model->getAll(
            array(
                "isDeleted" => 0,
                "maincategory_id !=" => null,
                "maincategory_id !=" => 1,
            )
        );


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


    public function PostAdd()
    {


        $this->load->library("form_validation");

        $viewData = new stdClass();

        $this->form_validation->set_rules("title", "Makale Başlık", "required|trim|is_unique[article.title]");
        $this->form_validation->set_rules("content", "Makale İçerik", "required|trim");


        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "is_unique" => "{field} başka bir makalede kullanılmış. Lütfen başka bir başlık seçiniz.",
            )


        );

        $validateStatus = $this->form_validation->run();


        if ($validateStatus) {
            $this->load->helper("seo");
            $this->load->helper("date_format");
            $this->load->helper("simple_image_upload");
            if (!empty($_FILES["file"]["name"])) {
                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/" . $this->viewFolder . "/";
                $uploaded_filename = convertToSeo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
                $uploaded_filename=newGuid() . $uploaded_filename;
                $config["file_name"] = $uploaded_filename;

                $tmp_name=$_FILES["file"]["tmp_name"];

                $image_x400=simpleImageUpload($tmp_name,"uploads/" . $this->viewFolder . "/thumb2/","",400,"_x400".$filename);
                $image_x225=simpleImageUpload($tmp_name,"uploads/" . $this->viewFolder . "/thumb2/","",225,"_x225".$filename);

            } else {
                $uploaded_filename = "default_thumb.png";
            }

            $insert = $this->Article_model->insert(array(

                "title" => $this->input->post("title"),
                "article_seo" => convertToSeo($this->input->post("title")),
                "content" => $this->input->post("content"),
                "category_id" => $this->input->post("category_id"),
                "author_id" => getAdminSession()->Id, //TODO burası current sessiondan gelicek
                "image_url" => $uploaded_filename,
                "isDraft" => (empty($this->input->post("isDraft"))) ? 0 : 1,
                "createdAt" => date("Y-m-d H:i:s"),
                "modifiedAt" => date("Y-m-d H:i:s"),

            ));


            $lastArticleId = $this->db->insert_id();
            $tags = $this->input->post("tags");
            $tagIds = array();
            if (!empty($tags)) {

                $splitTags = explode(",", $tags);
                $this->load->model("Tag_model");
                for ($i = 0; $i < count($splitTags); $i++) {
                    $insertTag = $this->Tag_model->insert(
                        array(
                            "tag_name" => $splitTags[$i],
                            "tag_seo" => convertToSeo($splitTags[$i]),
                        )
                    );

                    if ($insertTag) {
                        $lastTagId = $this->db->insert_id();
                        array_push($tagIds, $lastTagId);
                    }

                }

                for ($i = 0; $i < count($tagIds); $i++) {
                    $this->load->model("Article_Tags_model");
                    $this->Article_Tags_model->insert(
                        array(
                            "article_id" => $lastArticleId,
                            "tag_id" => $tagIds[$i]
                        )
                    );
                }
                $this->session->unset_userdata("tags");
            }

            if ($insert) {
                $alert = array(
                    "type" => "success",
                    "title" => "Başarılı",
                    "message" => "Makale Başarılı Bir Şekilde Eklendi."
                );
            } else {
                $alert = array(
                    "type" => "error",
                    "title" => "Başarısız",
                    "message" => "Makale Eklenirken Bir Hata Oluştu."
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Admin/Article"));
            die();
        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";

            $viewData->errors = validation_errors();

            $viewData->nonValidateOption = $this->input->post("category_id");
            $viewData->checkState = (empty($this->input->post("isDraft"))) ? 0 : 1;
            $this->load->model("Category_model");

            $viewData->categories = $this->Category_model->getAll(
                array(
                    "isDeleted" => 0,
                    "maincategory_id !=" => null,
                    "maincategory_id !=" => 1,
                )
            );

            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function GetUpdate($id, $catId)
    {
        if (!empty($id) AND !empty($catId)) {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "Update";
            $this->load->model("Category_model");


            $viewData->categories = $this->Category_model->getAll(
                array(
                    "isDeleted" => 0,
                    "maincategory_id !=" => null,
                    "maincategory_id !=" => 1,
                )
            );
            $viewData->currCategory = $this->Category_model->find(
                array(
                    "Id" => $catId
                )
            );


            $viewData->article = $this->Article_model->find(
                array(
                    "Id" => $id,
                    "isDeleted" => 0
                )
            );


            $viewData->tags = $this->Article_model->joinWithOthers(
                "tag.Id, tag.tag_name",
                array(
                    "article.isDeleted" => 0,
                    "tag.isDeleted" => 0,
                    "article.Id" => $id,
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


            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            redirect(base_url("Admin/Article"));
            die();
        }
    }

    public function PostUpdate()
    {


        $id = $this->input->post("Id");
        if (!empty($id)) {
            $this->load->library("form_validation");
            $this->load->model("Category_model");


            $viewData = new stdClass();

            $article = $this->Article_model->find(
                array(
                    "Id" => $id,
                    "isDeleted" => 0
                )
            );
            $viewData->categories = $this->Category_model->getAll(
                array(
                    "isDeleted" => 0,
                    "maincategory_id !=" => null,
                    "maincategory_id !=" => 1,
                )
            );


            if ($article->title != $this->input->post("title")) {
                $isUniq = "|is_unique[article.title]";

            } else {
                $isUniq = "";
            }

            $this->form_validation->set_rules("title", "Makale Başlık", "required|trim" . $isUniq);
            $this->form_validation->set_rules("content", "Makale İçerik", "required|trim");

            $this->form_validation->set_message(
                array(
                    "required" => "{field} boş bırakılmamalıdır.",
                    "is_unique" => "{field} başka bir makalede kullanılmış. Lütfen başka bir başlık seçiniz.",
                )


            );
            $validateStatus = $this->form_validation->run();

            if ($validateStatus) {

                $this->load->helper("seo");


                if (!empty($_FILES["file"]["name"])) {
                    $previousFile = "uploads/$this->viewFolder/$article->image_url";


                    $config["allowed_types"] = "jpg|jpeg|png";
                    $config["upload_path"] = "uploads/" . $this->viewFolder . "/";
                    $filename = convertToSeo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

                    $config["file_name"] = newGuid() . $filename;
                    $this->load->library("upload", $config);
                    $upload = $this->upload->do_upload("file");
                    $uploaded_filename = $this->upload->data("file_name");


                    if (file_exists($previousFile)) {
                        unlink($previousFile);
                    }


                    $update = $this->Article_model->update(
                        array(
                            "Id" => $id
                        ),
                        array(
                            "title" => $this->input->post("title"),
                            "article_seo" => convertToSeo($this->input->post("title")),
                            "content" => $this->input->post("content"),
                            "category_id" => $this->input->post("category_id"),
                            "image_url" => $uploaded_filename,
                            "isDraft" => (empty($this->input->post("isDraft"))) ? 0 : 1,
                            "modifiedAt" => date("Y-m-d H:i:s"),

                        ));
                } else {

                    $update = $this->Article_model->update(
                        array(
                            "Id" => $id
                        ),
                        array(
                            "title" => $this->input->post("title"),
                            "article_seo" => convertToSeo($this->input->post("title")),
                            "content" => $this->input->post("content"),
                            "category_id" => $this->input->post("category_id"),
                            "isDraft" => (empty($this->input->post("isDraft"))) ? 0 : 1,
                            "modifiedAt" => date("Y-m-d H:i:s"),

                        ));


                }
                if ($update) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Makale Başarılı Bir Şekilde Güncellendi."
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarısız",
                        "message" => "Makale Güncellenirken Bir Hata Oluştu."
                    );
                }

                $tags = $this->input->post("tags");
                $tagIds = array();
                if (!empty($tags)) {
                    $splitTags = explode(",", $tags);
                    $this->load->model("Tag_model");
                    for ($i = 0; $i < count($splitTags); $i++) {
                        $insertTag = $this->Tag_model->insert(
                            array(
                                "tag_name" => $splitTags[$i],
                                "tag_seo" => convertToSeo($splitTags[$i]),
                            )
                        );

                        if ($insertTag) {
                            $lastTagId = $this->db->insert_id();
                            array_push($tagIds, $lastTagId);
                        }

                    }

                    for ($i = 0; $i < count($tagIds); $i++) {
                        $this->load->model("Article_Tags_model");
                        $this->Article_Tags_model->insert(
                            array(
                                "article_id" => $id,
                                "tag_id" => $tagIds[$i]
                            )
                        );
                    }




                    $this->session->set_flashdata("alert", $alert);
                    $this->session->unset_userdata("tags");
                    redirect("Admin/Article/GetUpdate/$id/$article->category_id");
                    die();


                }
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Admin/Article"));
                die();
            } else {


                $viewData->tags = $this->Article_model->joinWithOthers(
                    "tag.Id, tag.tag_name",
                    array(
                        "article.isDeleted" => 0,
                        "tag.isDeleted" => 0,
                        "article.Id" => $id,
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
                $viewData->article = $article;
                $currCategory = $this->Category_model->find(array(

                    "Id" => $viewData->article->category_id

                ));

                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";

                $viewData->errors = validation_errors();

                $viewData->currCategory = $currCategory;


                $viewData->nonValidateOption = $this->input->post("category_id");
                $viewData->checkState = (empty($this->input->post("isDraft"))) ? 0 : 1;

                return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
        } else {
            redirect(base_url("Admin/Article"));
            die();
        }


    }

    public function Delete($id)
    {
        if (!empty($id)) {


            $delete = $this->Article_model->delete(
                array(
                    "Id" => $id
                ),
                array(
                    "isDeleted" => 1
                )
            );


            redirect(base_url("Admin/Article"));
            die();
        } else {
            redirect(base_url("Admin/Article"));
            die();
        }
    }

    public function TagDelete($tagId = 0, $articleId, $articleCatId)
    {


        if ($tagId > 0) {
            $this->load->model("Tag_model");
            //Aslında siliyor fakat kod tekrarı olmasın diye methodun ismi update olarak bırakıldı.
            $this->Tag_model->update(
                array(
                    "Id" => $tagId
                ),
                array(
                    "isDeleted" => 1
                )
            );
            $this->session->unset_userdata("tags");
            redirect("Admin/Article/GetUpdate/$articleId/$articleCatId");
            die();
        } else {
            redirect("Admin/Article");
            die();
        }
    }


    public function EditTag()
    {
        $this->load->model("Tag_model");

        $update = $this->Tag_model->update(
            array(
                "Id" => $this->input->post("tag_id")
            ),
            array(
                "tag_name" => $this->input->post("tagName"),

            )


        );
        if ($update)
            $this->session->unset_userdata("tags");
        echo $update;
    }


}