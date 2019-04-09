<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 19-Dec-18
 * Time: 8:26 PM
 */

class Member extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "member_f";
        $this->load->helper("email");
        $this->load->model("Member_model");
    }

    public function Register()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Register";

        return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostRegister()
    {


        $this->load->library("form_validation");

        $viewData = new stdClass();

        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[member.user_name]|min_length[5]|max_length[40]");
        $this->form_validation->set_rules("email", "Email Adresi", "required|trim|is_unique[member.email]||valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[30]");
        $this->form_validation->set_rules("repassword", "Şifre (Tekrar)", "required|trim|matches[password]");

        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "is_unique" => "{field} başka bir kullanıcı tarafından kullanılıyor.",
                "matches" => "Şifreler Uyuşmuyor",
                "min_length" => "{field} en az {param} karakter olmalıdır.",
                "max_length" => "{field} en fazla {param} karakter olmalıdır.",
                "valid_email" => "{field} formatı hatalı."
            )


        );

        $validateStatus = $this->form_validation->run();


        if ($validateStatus) {
            $user_name = $this->input->post("user_name");
            $email = $this->input->post("email");
            $this->load->model("Member_model");
            $guid = newGuid();
            $insert = $this->Member_model->insert(array(

                "user_name" => $user_name,
                "email" => $email,
                "password" => md5($this->input->post("password")),
                "ip_address" => $this->input->ip_address(),
                "guid" => $guid,
                "createdAt" => date("Y-m-d H:i:s"),
                "modifiedAt" => date("Y-m-d H:i:s"),
                "modifiedBy" => $this->input->post("user_name"),

            ));
            $alert = array();
            if ($insert) {
                $url = base_url("Member/Registiration/" . $guid);
                $send = sendEmail($email, getSettings()->site_name . " Hesap Aktivasyonu Hk.",
                    "Merhaba $user_name;<br/><br/>Hesabınızı aktifleştirmek için <a href='$url' target='_blank'>Tıklayınız</a>.");
                if ($send) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Aktivasyon maili <b>$email</b> adresinize gönderildi"
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarılı",
                        "message" => "Aktivasyon maili gönderilemedi"
                    );
                }

            }


            $this->session->set_flashdata("falert", $alert);
            redirect(base_url(""));
            die();
        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "Register";

            $viewData->errors = validation_errors();


            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }


    public function Registiration($guid = "")
    {
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }
        if (!empty($guid)) {

            $member = $this->Member_model->find(
                array(
                    "guid" => $guid,
                    "isDeleted" => 0
                )
            );

            if (!empty($member)) {
                $alert = array();
                if ($member->isActive == 1) {

                    $alert = array(
                        "type" => "info",
                        "title" => "Bilgilendirme",
                        "message" => "<b>{$member->email}</b> zaten aktive edilmiş"
                    );
                    $this->session->set_flashdata("falert", $alert);
                    redirect(base_url(""));
                    die();
                } else {
                    $update = $this->Member_model->update(
                        array(
                            "Id" => $member->Id,
                        ),
                        array(
                            "isActive" => 1,
                            "guid" => newGuid()
                        )
                    );

                    if ($update) {
                        $alert = array(
                            "type" => "success",
                            "title" => "Başarılı",
                            "message" => "<b>{$member->user_name}</b> hesap aktivasyon işlemi tamamlandı"
                        );
                        $this->session->set_userdata("member", $member);
                    } else {
                        $alert = array(
                            "type" => "error",
                            "title" => "Başarısız",
                            "message" => "<b>{$member->user_name}</b> hesap aktivasyon işlemi yapılamadı. Daha sonra tekrar deneyiniz."
                        );
                    }

                    $this->session->set_flashdata("falert", $alert);
                    redirect(base_url(""));
                    die();
                }
            } else {
                $alert = array(
                    "type" => "error",
                    "title" => "Başarısız",
                    "message" => "Böyle bir kullanıcı yok ya da Aktivasyon maili zaman aşımına uğramış"
                );

                $this->session->set_flashdata("falert", $alert);
                redirect(base_url(""));
                die();
            }
        } else {
            redirect(base_url(""));
            die();
        }

    }



    public function Login()
    {
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }
        $viewData = new stdClass();


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Login";


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostLogin()
    {
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }
        $this->load->library("form_validation");

        $viewData = new stdClass();
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|min_length[5]|max_length[40]");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[30]");
        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "min_length" => "{field} en az {param} karakter olmalıdır.",
                "max_length" => "{field} en fazla {param} karakter olmalıdır."
            )
        );


        $validateStatus = $this->form_validation->run();


        if ($validateStatus) {
            $member = $this->Member_model->find(
                array(
                    "user_name" => $this->input->post("user_name"),
                    "password" => md5($this->input->post("password")),
                )
            );

            if (!empty($member)) {
                if ($member->isActive == 0) {
                    $alert = array(
                        "type" => "warning",
                        "title" => "Uyarı",
                        "message" => "Hesap aktivasyon işlemini kayıt olduğunuz mail aracılığıyla yapınız."
                    );
                    $this->session->set_flashdata("falert", $alert);
                    redirect("Member/Login");
                    die();
                }

                if ($member->isDeleted == 1) {
                    $alert = array(
                        "type" => "info",
                        "message" => "Hesap silinmiş."
                    );
                    $this->session->set_flashdata("falert", $alert);
                    redirect("Member/Login");
                    die();
                }


                if ($member->isBlocked == 1) {
                    $alert = array(
                        "type" => "info",
                        "message" => "Hesap yöneticiler tarafından engellendi."
                    );
                    $this->session->set_flashdata("falert", $alert);
                    redirect("Member/Login");
                    die();
                }

                $alert = array(
                    "type" => "success",
                    "message" => "Hoş geldiniz <b>{$member->user_name}</b>"
                );
                $this->session->set_userdata("member", $member);
                $this->session->set_flashdata("falert", $alert);
                redirect(base_url(""));
                die();
            } else {
                $alert = array(
                    "type" => "error",
                    "message" => "Kullanıcı adı ya da şifre hatalı."
                );
                $this->session->set_flashdata("falert", $alert);
                redirect("Member/Login");
                die();
            }
        } else {

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "Login";

            $viewData->errors = validation_errors();
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }


    }


    public function ForgotPassword()
    {
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "ForgotPassword";

        return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function PostForgotPassword()
    {
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "Email Adresi", "required|trim|valid_email");
        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "valid_email" => "{field} formatı hatalı."
            )


        );

        $validateStatus = $this->form_validation->run();

        if ($validateStatus){
            $email = $this->input->post("email");
            $member = $this->Member_model->find(
                array(
                    "email" => $email,
                    "isDeleted" => 0
                )
            );

            if (!empty($member)) {
                $url = base_url("Member/ChangePassword/" . $member->guid);
                $send = sendEmail($email, getSettings()->site_name . " Şifremi Unuttum Hk.",
                    "Merhaba $member->user_name;<br/><br/>Şifrenizi değiştirmek için <a href='$url' target='_blank'>Tıklayınız</a>.");
                if ($send) {
                    $alert = array(
                        "type" => "success",
                        "title" => "Başarılı",
                        "message" => "Şifre değişikliği maili <b>$email</b> adresinize gönderildi"
                    );
                } else {
                    $alert = array(
                        "type" => "error",
                        "title" => "Başarılı",
                        "message" => "Şifre değişikliği maili gönderilemedi"
                    );
                }
                $this->session->set_flashdata("falert", $alert);
                redirect(base_url(""));
                die();
            } else {
                $alert = array(
                    "type" => "error",
                    "title" => "Başarısız",
                    "message" => "Böyle bir kullanıcı yok ya da maili zaman aşımına uğramış"
                );

                $this->session->set_flashdata("falert", $alert);
                redirect(base_url("Member/ForgotPassword"));
                die();
        }


        }else{
            $viewData=new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "ForgotPassword";

            $viewData->errors = validation_errors();


            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function ChangePassword($guid)
    {
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }
        if (!empty($guid)) {

            $member = $this->Member_model->find(
                array(
                    "guid" => $guid,
                    "isDeleted" => 0
                )
            );

            if (!empty($member)) {
                $viewData=new stdClass();
                $viewData->viewFolder=$this->viewFolder;
                $viewData->subViewFolder="ChangePassword";
                $viewData->Id=$member->Id;

                $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
            } else {
                $alert = array(
                    "type" => "error",
                    "title" => "Başarısız",
                    "message" => "Böyle bir kullanıcı yok ya da mail zaman aşımına uğramış"
                );

                $this->session->set_flashdata("falert", $alert);
                redirect(base_url(""));
                die();
            }
        } else {
            redirect(base_url(""));
            die();
        }
    }

    public function PostChangePassword(){
        if (getMemberSession()) {
            redirect(base_url(""));
            die();
        }

        $this->load->library("form_validation");

        $viewData = new stdClass();

        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[30]");
        $this->form_validation->set_rules("re_password", "Şifre (Tekrar)", "required|trim|matches[password]|min_length[6]|max_length[30]");
        $this->form_validation->set_message(
            array(
                "required" => "{field} boş bırakılmamalıdır.",
                "matches" => "Şifreler Uyuşmuyor",
                "min_length" => "{field} en az {param} karakter olmalıdır.",
                "max_length" => "{field} en fazla {param} karakter olmalıdır."
            )


        );

        $validateStatus = $this->form_validation->run();

        $Id=$this->input->post("Id");
        if ($validateStatus) {

            $update = $this->Member_model->update(
                array(
                    "Id"        =>$Id
                ),

                array(
                "password" => md5($this->input->post("password")),
                "ip_address" => $this->input->ip_address(),
                "modifiedAt" => date("Y-m-d H:i:s"),

            ));
            $alert = array();
            if ($update) {
                $member=$this->Member_model->find(
                    array(
                        "Id"        =>$this->input->post("Id")
                    )
                );
                $update2=$this->Member_model->update(
                    array(
                        "Id"        =>$this->input->post("Id")
                    ),
                    array(
                        "password"      => md5($this->input->post("password")),
                        "modifiedBy"    =>$member->user_name,
                        "guid"          =>newGuid()

                    )
                );
                if ($update2){
                    $alert = array(
                        "type" => "success",
                        "message" => "<b>$member->user_name</b> hoşgeldiniz. Şifreniz değiştirildi"
                    );
                    $this->session->set_userdata("member",$member);
                    $this->session->set_flashdata("falert", $alert);
                    redirect(base_url(""));
                    die();
                }else{
                    $alert = array(
                        "type" => "error",
                        "message" => "Şifre değiştirilirken hata"
                    );
                }


            }
            $this->session->set_flashdata("falert", $alert);
            redirect(base_url(""));
            die();
        } else {
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "ChangePassword";
            $viewData->Id = $Id;
            $viewData->errors = validation_errors();


            return $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }


    public function Logout()
    {
        $this->session->unset_userdata("member");

        redirect(base_url(""));
        die();
    }


}