<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 08-Dec-18
 * Time: 12:13 PM
 */

class Email extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        $this->viewFolder = "email_v";
        parent::__construct();
        $this->load->model("Email_model");

        if (!getAdminSession()){
            redirect(base_url("Admin/Login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "List";


        $viewData->emailSettings = $this->Email_model->getAll(
            array(
                "isDeleted" => 0,

            )
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function GetAdd()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Add";


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostAdd()
    {
        $this->load->library("form_validation");

        $viewData = new stdClass();

        $this->form_validation->set_rules("send_title", "Mail Başlık", "required|trim");
        $this->form_validation->set_rules("host", "Host", "required|trim");
        $this->form_validation->set_rules("protocol", "Protocol", "required|trim");
        $this->form_validation->set_rules("port", "Port", "required|trim");
        $this->form_validation->set_rules("_from", "Mail Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");


        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "email" => "{field} formatı hatalı."
            )


        );

        $validateStatus = $this->form_validation->run();


        if ($validateStatus) {

            $this->load->helper("date_format");
            $insert = $this->Email_model->insert(array(

                "send_title" => $this->input->post("send_title"),
                "host" => $this->input->post("host"),
                "protocol" => $this->input->post("protocol"),
                "port" => $this->input->post("port"),
                "_from" => $this->input->post("_from"),
                "password" => $this->input->post("password"),
                "isActive" => (empty($this->input->post("isActive"))) ? 0 : 1,
                "createdAt" => date("Y-m-d H:i:s"),
                "modifiedAt" => date("Y-m-d H:i:s"),
                "modifiedBy" => "Hüseyin" //TODO burası currSessiondan gelicek,

            ));

            if ($insert) {
                $alert = array(
                    "type" => "success",
                    "title" => "Başarılı",
                    "message" => "Email Ayarı Başarılı Bir Şekilde Eklendi."
                );
            } else {
                $alert = array(
                    "type" => "error",
                    "title" => "Başarısız",
                    "message" => "Email Ayarı Eklenirken Bir Hata Oluştu."
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Admin/Email"));
            die();
        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";

            $viewData->errors = validation_errors();

            $viewData->checkState = (empty($this->input->post("isActive"))) ? 0 : 1;


            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }


    public function GetUpdate($id)
    {
        if (!empty($id)) {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "Update";


            $viewData->emailSetting = $this->Email_model->find(
                array(
                    "Id" => $id
                )
            );


            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            redirect(base_url("Admin/Email"));
            die();
        }
    }

    public function PostUpdate()
    {
        $id = $this->input->post("Id");
        if (!empty($id)) {
            $this->load->library("form_validation");


            $viewData = new stdClass();





            $this->form_validation->set_rules("send_title", "Mail Başlık", "required|trim");
            $this->form_validation->set_rules("host", "Host", "required|trim");
            $this->form_validation->set_rules("protocol", "Protocol", "required|trim");
            $this->form_validation->set_rules("port", "Port", "required|trim");
            $this->form_validation->set_rules("_from", "Mail Adresi", "required|trim|valid_email");
            $this->form_validation->set_rules("password", "Şifre", "required|trim");


            $this->form_validation->set_message(
                array(
                    "required" => "{field} boş bırakılmamalıdır.",
                    "email" => "{field} formatı hatalı."
                )
            );


            $validateStatus = $this->form_validation->run();

            if ($validateStatus) {
                $this->load->helper("date_format");
                $update = $this->Email_model->update(
                    array(
                        "Id" => $id
                    ),
                    array(
                        "send_title" => $this->input->post("send_title"),
                        "host" => $this->input->post("host"),
                        "protocol" => $this->input->post("protocol"),
                        "port" => $this->input->post("port"),
                        "_from" => $this->input->post("_from"),
                        "password" => $this->input->post("password"),
                        "isActive" => (empty($this->input->post("isActive"))) ? 0 : 1,
                        "modifiedAt" => date("Y-m-d H:i:s"),
                        "modifiedBy" => "Hüseyin" //TODO burası currSessiondan gelicek,

                    ));
                if ($update) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Email Ayarları Bir Şekilde Güncellendi."
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarısız",
                        "message" => "Email Ayarları Güncellenirken Bir Hata Oluştu."
                    );
                }
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Admin/Email"));
                die();
            } else {
                $viewData->emailSetting = $this->Email_model->find(array(
                    "isDeleted" => 0,
                    "Id" => $id
                ));
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";
                $viewData->errors = validation_errors();
                $viewData->checkState = (empty($this->input->post("isActive"))) ? 0 : 1;

                return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
        } else {
            redirect(base_url("Admin/Email"));
            die();
        }
    }

    public function Delete($id)
    {
        if (!empty($id)) {

            $delete = $this->Email_model->delete(
                array(
                    "Id" => $id
                ),
                array(
                    "isDeleted" => 1
                )
            );


            redirect(base_url("Admin/Email"));
            die();
        } else {
            redirect(base_url("Admin/Email"));
            die();
        }


    }

}