<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 04-Dec-18
 * Time: 1:41 PM
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        $this->viewFolder = "category_v";
        parent::__construct();
        $this->load->model("Category_model");

        if (!getAdminSession()){
            redirect(base_url("Admin/Login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "List";

        $this->load->helper("category");


        $viewData->rootCategories = $this->Category_model->getAll(
            array(
                "maincategory_id" => null,
                "isActive" => 1,
                "isDeleted" => 0,
            )

        );


        $viewData->categories = $this->Category_model->getAll(
            array(
                "isDeleted" => 0
            )

        );


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
                "isActive" => 1,
                "isDeleted" => 0
            )
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostAdd()
    {
        //echo $this->input->post("isActive");  Seçiliyse on değilse null
        $this->load->library("form_validation");

        $viewData = new stdClass();

        $this->form_validation->set_rules("category_name", "Ana Kategori / Alt Kategori", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır."
            )


        );

        $validateStatus = $this->form_validation->run();


        if ($validateStatus) {
            $this->load->helper("seo");
            $this->load->helper("date_format");
            $this->load->model("Category_model");
            $insert = $this->Category_model->insert(array(

                "category_name" => $this->input->post("category_name"),
                "maincategory_id" => ($this->input->post("maincategory_id")==-1)? null:$this->input->post("maincategory_id"),
                "seo_url" => convertToSeo($this->input->post("category_name")),
                "isActive" => (empty($this->input->post("isActive"))) ? 0 : 1,
                "priority" => count($this->Category_model->getAll()),
                "createdAt" => date("Y-m-d H:i:s"),
                "modifiedAt" => date("Y-m-d H:i:s"),
                "modifiedBy" => getAdminSession()->fullName,

            ));
            if ($insert) {
                $alert = array(
                    "type" => "success",
                    "title" => "Başarılı",
                    "message" => "Kategori Başarılı Bir Şekilde Eklendi."
                );
            } else {
                $alert = array(
                    "type" => "error",
                    "title" => "Başarısız",
                    "message" => "Kategori Eklenirken Bir Hata Oluştu."
                );
            }
            $this->session->set_flashdata("alert", $alert);
            $this->session->unset_userdata("categories");
            redirect(base_url("Admin/Category"));
            die();
        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";

            $viewData->errors = validation_errors();

            $viewData->nonValidateOption = $this->input->post("maincategory_id");
            $viewData->checkState = (empty($this->input->post("isActive"))) ? 0 : 1;
            $this->load->model("Category_model");

            $viewData->categories = $this->Category_model->getAll(
                array(
                    "isActive" => 1,
                    "isDeleted" => 0
                )
            );

            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }


    }

    public function Delete($id)
    {
        if (!empty($id)){
            $this->load->model("Category_model");

            $delete = $this->Category_model->delete(
                array(
                    "Id" => $id
                ),
                array(
                    "isDeleted" => 1
                )
            );

            $this->session->unset_userdata("categories");
            redirect(base_url("Admin/Category"));
            die();
        }else{
            redirect(base_url("Admin/Category"));
            die();
        }


    }

    public function GetUpdate($id){
        if (!empty($id)){
            $viewData=new stdClass();

            $viewData->viewFolder=$this->viewFolder;
            $viewData->subViewFolder="Update";
            $this->load->model("Category_model");

            $viewData->categories = $this->Category_model->getAll(
                array(
                    "isActive" => 1,
                    "isDeleted" => 0
                )
            );
            $viewData->currCategory=$this->Category_model->find(
                array(
                    "Id"        =>$id
                )
            );



            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
        }else{
            redirect(base_url("Admin/Category"));
            die();
        }
    }

    public function PostUpdate(){

        $id=$this->input->post("Id");

        if (!empty($id)){
            $this->load->library("form_validation");
            $this->load->model("Category_model");

            $viewData = new stdClass();

            $this->form_validation->set_rules("category_name", "Ana Kategori / Alt Kategori", "required|trim");


            $this->form_validation->set_message(
                array(
                    "required" => "{field} boş bırakılmamalıdır."
                )


            );
            $viewData->categories=$this->Category_model->getAll(array(
                "isActive"          =>1,
                "isDeleted"         =>0,
            ));
            $validateStatus = $this->form_validation->run();
            //modifiedAt ve modifiedBy değiştirilecek...
            if ($validateStatus) {
                $this->load->helper("seo");
                $this->load->helper("date_format");

                $update = $this->Category_model->update(
                    array(
                        "Id" => $id
                    ),
                    array(
                        "category_name" => $this->input->post("category_name"),
                        "maincategory_id" => ($this->input->post("maincategory_id")==-1)? null:$this->input->post("maincategory_id"),
                        "seo_url" => convertToSeo($this->input->post("category_name")),
                        "isActive" => (empty($this->input->post("isActive"))) ? 0 : 1,
                        "priority" => $this->input->post("priority"),
                        "createdAt" => date("Y-m-d H:i:s"),
                        "modifiedAt" => date("Y-m-d H:i:s"),
                        "modifiedBy" => getAdminSession()->fullName,

                    ));

                if ($update) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Kategori Başarılı Bir Şekilde Güncellendi."
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarısız",
                        "message" => "Kategori Güncellenirken Bir Hata Oluştu."
                    );
                }
                $this->session->set_flashdata("alert", $alert);
                $this->session->unset_userdata("categories");
                redirect(base_url("Admin/Category"));
                die();
            } else {

                $currCategory = $this->Category_model->find(array(

                    "Id" => $id

                ));
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";

                $viewData->errors = validation_errors();

                $viewData->currCategory = $currCategory;


                $viewData->nonValidateOption = $this->input->post("maincategory_id");
                $viewData->checkState = (empty($this->input->post("isActive"))) ? 0 : 1;

                return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
        }else{
            redirect(base_url("Admin/Category"));
            die();
        }

    }
}