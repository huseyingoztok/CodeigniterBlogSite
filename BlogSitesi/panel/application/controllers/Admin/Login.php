<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 08-Dec-18
 * Time: 4:15 PM
 */

class Login extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        $this->viewFolder = "login_v";
        parent::__construct();
    }

    public function index()
    {

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostLogin()
    {

        $this->load->library("form_validation");

        $viewData = new stdClass();


        $this->form_validation->set_rules("email", "E-mail", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Captcha formunu geçemediniz');

        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "valid_email" => "{field} formatı hatalı",
            )


        );

        $validateStatus = $this->form_validation->run();

        if ($validateStatus) {
            $this->load->model("Author_model");
            $loginUser = $this->Author_model->find(array(
                "isActive" => 1,
                "isDeleted" => 0,
                "email" => $this->input->post("email"),
                "password" => md5($this->input->post("password"))
            ));

            if (!empty($loginUser)) {


                $this->session->set_userdata("loginUser", $loginUser);

                $alert = array(
                    "type" => "success",
                    "title" => "Başarılı",
                    "message" => "Hoşgeldiniz ".$loginUser->fullName
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("Admin"));
            } else {
                redirect(base_url("Admin/Login?failed=true"));
            }

        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "Login";

            $viewData->errors = validation_errors();
            $viewData->validateStatus = $validateStatus;

            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    function validate_captcha()
    {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfacYIUAAAAAKz2uXOg7FRzEzvnXfb21gwvhAuQ&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Logout()
    {

        $this->session->unset_userdata("loginUser");

        redirect(base_url("Admin/Login"));
    }

    public function ForgotPassword()
    {

        if (getAdminSession()) {
            redirect(base_url());
        }
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "ForgotPassword";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostEmail()
    {

        if (getAdminSession()) {
            redirect(base_url());
        }

        $this->load->library("form_validation");

        $viewData = new stdClass();


        $this->form_validation->set_rules("email", "E-mail", "required|trim|valid_email");
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Captcha formunu geçemediniz');

        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "valid_email" => "{field} formatı hatalı",
            )


        );

        $validateStatus = $this->form_validation->run();

        if ($validateStatus) {
            $this->load->model("Author_model");
            $loginUser = $this->Author_model->find(array(
                "isDeleted" => 0,
                "isActive" => 1,
                "email" => $this->input->post("email"),
            ));

            if (!empty($loginUser)) {

                $this->load->helper("email");
                $url = base_url("Admin/Login/ChangePassword/{$loginUser->guid}");
                $send = senEmail($loginUser->email, "Şifremi Unuttum", "Şifrenizi yenilemek için <a href='$url'>tıklayınız.</a>");


                if ($send) {
                    redirect(base_url("Admin/Login"));
                    die();
                } else {
                    redirect(base_url("Admin/Login/ForgotPassword"));
                    die();
                }


            } else {
                redirect(base_url("Admin/Login/ForgotPassword"));
                die();
            }

        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "ForgotPassword";

            $viewData->errors = validation_errors();
            $viewData->validateStatus = $validateStatus;

            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function ChangePassword($uid)
    {
        if (getAdminSession()) {

            redirect(base_url("Admin/Login"));
        }
        $this->load->model("Author_model");
        $currUser = $this->Author_model->find(array(
            "guid" => $uid,
            "isActive" => 1
        ));

        if (!empty($currUser)) {
            $viewData = new stdClass();


            //Şifresi değiştirilecek kişinin id değeri viewa gönderilmeli
            $viewData->id = $currUser->Id;

            $viewData->subViewFolder = "ChangePassword";
            $viewData->viewFolder = $this->viewFolder;

            //TODO Change password sayfasının contenti tasarlanacak
            $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            redirect(base_url("Admin/Login"));
        }

    }


    public function ResetPassword()
    {
        $this->load->library("form_validation");

        $viewData = new stdClass();

        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_rules("re_password", "Şifre (Tekrar)", "required|trim|matches[password]");
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Captcha formunu geçemediniz');

        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "matches" => "Şifreler Uyuşmuyor"
            )


        );

        $validateStatus = $this->form_validation->run();

        $viewData->validateStatus = $validateStatus;
        if ($validateStatus) {

            $this->load->model("Author_model");
            $update = $this->Author_model->update(
                array(
                    "Id" => $this->input->post("Id")
                ),
                array(
                    "password" => md5($this->input->post("password")),
                )
            );


            if ($update) {

                $this->Author_model->update(
                    array(
                        "Id" => $this->input->post("Id")
                    ),
                    array(
                        "guid" => newGuid(),
                    )
                );
            }

            redirect(base_url("Admin/Login"));
            die();

        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "ChangePassword";

            $viewData->errors = validation_errors();

            $viewData->id = $this->input->post("Id");


            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }


}