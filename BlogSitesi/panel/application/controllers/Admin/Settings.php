<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 17-Dec-18
 * Time: 5:51 PM
 */

class Settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "site_settings_v";

        if (!getAdminSession()) {
            redirect(base_url("Admin/Login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Show";
        $this->load->model("Setting_model");
        $viewData->setting = $this->Setting_model->find(
            array(
                "Id" => 1
            )
        );
        return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    //TODO site ayarları güncellenecek ...
    public function UpdateSettings()
    {
        $id = $this->input->post("Id");
        if (!empty($id)) {
            $this->load->library("form_validation");
            $this->load->model("Setting_model");


            $viewData = new stdClass();

            $setting = $this->Setting_model->find(
                array(
                    "Id" => $id,

                )
            );


            $this->form_validation->set_rules("phone", "Telefon", "required|trim");
            $this->form_validation->set_rules("mail", "E-posta", "required|trim");

            $this->form_validation->set_message(
                array(
                    "required" => "{field} boş bırakılmamalıdır.",

                )


            );
            $validateStatus = $this->form_validation->run();

            if ($validateStatus) {

                $this->load->helper("seo");


                if (!empty($_FILES["file"]["name"])) {

                    $previousFile = "uploads/settings_v/$setting->favicon";


                    $config["allowed_types"] = "jpg|jpeg|png";
                    $config["upload_path"] = "uploads/settings_v" . "/";
                    $filename = convertToSeo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

                    $config["file_name"] = newGuid() . $filename;
                    $this->load->library("upload", $config);
                    $upload = $this->upload->do_upload("file");
                    $uploaded_filename = $this->upload->data("file_name");


                    if (file_exists($previousFile)) {
                        unlink($previousFile);
                    }


                    $update = $this->Setting_model->update(
                        array(
                            "Id" => $id
                        ),
                        array(
                            "phone" => $this->input->post("phone"),
                            "mail" => $this->input->post("mail"),
                            "twitter" => $this->input->post("twitter"),
                            "facebook" => $this->input->post("facebook"),
                            "linkedin" => $this->input->post("linkedin"),
                            "instagram" => $this->input->post("instagram"),
                            "footer" => $this->input->post("footer"),
                            "site_name" => $this->input->post("site_name"),
                            "favicon" => $uploaded_filename,


                        ));
                } else {

                    $update = $this->Setting_model->update(
                        array(
                            "Id" => $id
                        ),
                        array(
                            "phone" => $this->input->post("phone"),
                            "mail" => $this->input->post("mail"),
                            "twitter" => $this->input->post("twitter"),
                            "facebook" => $this->input->post("facebook"),
                            "linkedin" => $this->input->post("linkedin"),
                            "instagram" => $this->input->post("instagram"),
                            "footer" => $this->input->post("footer"),
                            "site_name" => $this->input->post("site_name"),


                        ));


                }

                if ($update) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Ayarlar Bir Şekilde Güncellendi."
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarısız",
                        "message" => "Ayarlar Güncellenirken Bir Hata Oluştu."
                    );
                }
                $this->session->set_flashdata("alert", $alert);
                $this->session->unset_userdata("settings");
                redirect(base_url("Admin/Settings"));
                die();
            } else {


                $viewData->setting = $setting;

                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "Show";
                $viewData->errors = validation_errors();


                return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
        } else {
            redirect(base_url("Admin/Settings"));
            die();
        }
    }
}