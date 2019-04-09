<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AuthorProfile extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        $this->viewFolder = "author_profile_v";
        parent::__construct();
        $this->load->model("Author_model");

        if (!getAdminSession()){
            redirect(base_url("Admin/Login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "List";

        $viewData->author = $this->Author_model->find(
            array(
                "isActive" => 1,
                "isDeleted" => 0,
                "Id" => getAdminSession()->Id //TODO Burası current sessiondan gelicek;
            )
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


    public function PostEdit()
    {
        $id = $this->input->post("Id");

        if (!empty($id)) {
            $this->load->library("form_validation");


            $viewData = new stdClass();

            $author = $this->Author_model->find(
                array(
                    "Id" => $id,
                    "isDeleted" => 0
                )
            );


            $this->form_validation->set_rules("fullName", "Ad & Soyad", "required|trim");
            $this->form_validation->set_rules("userName", "Kullanıcı Adı", "required|trim");
            $this->form_validation->set_rules("email", "Email", "required|trim");
            $this->form_validation->set_rules("password", "Password", "required|trim");


            $this->form_validation->set_message(
                array(
                    "required" => "{field} boş bırakılmamalıdır."
                )


            );

            $validateStatus = $this->form_validation->run();

            if ($validateStatus) {
                $this->load->helper("seo");
                $this->load->helper("date_format");
                if (!empty($_FILES["file"]["name"])) {
                    $previousFile = "uploads/$this->viewFolder/$author->authorImage";


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


                    $update = $this->Author_model->update(
                        array(
                            "Id" => $id
                        ),
                        array(
                            "fullName" => $this->input->post("fullName"),
                            "userName" => $this->input->post("userName"),
                            "email" => $this->input->post("email"),
                            "authorImage" => $uploaded_filename,
                            "about" => $this->input->post("about"),
                            "modifiedAt" => date("Y-m-d H:i:s"),
                            "modifiedBy" => "Hüseyin", //TODO current sessiondan gelicek ...


                        ));
                } else {

                    $update = $this->Author_model->update(
                        array(
                            "Id" => $id
                        ),
                        array(
                            "fullName" => $this->input->post("fullName"),
                            "userName" => $this->input->post("userName"),
                            "email" => $this->input->post("email"),
                            "password" => $this->input->post("password"),
                            "about" => $this->input->post("about"),
                            "modifiedAt" => date("Y-m-d H:i:s"),
                            "modifiedBy" => "Hüseyin", //TODO current sessiondan gelicek ...

                        ));

                }
                if ($update) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Profil Bir Şekilde Güncellendi."
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarısız",
                        "message" => "Profil Güncellenirken Bir Hata Oluştu."
                    );
                }
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("Admin/AuthorProfile"));
                die();
            } else {
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "List";

                $viewData->author = $this->Author_model->find(
                    array(
                        "isActive" => 1,
                        "isDeleted" => 0,
                        "Id" => 1 //TODO Burası current sessiondan gelicek;
                    )
                );

                $viewData->errors = validation_errors();

                return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
        } else {
            redirect(base_url("Admin"));
            die();
        }
    }





}