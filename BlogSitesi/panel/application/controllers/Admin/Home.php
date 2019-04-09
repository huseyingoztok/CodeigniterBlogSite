<?php
/**
 * Created by PhpStorm.
 * User: huseyin-goztok
 * Date: 11/22/18
 * Time: 4:57 AM
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Home extends CI_Controller
{
    public $viewFolder="";
    public function __construct()
    {
        $this->viewFolder="home_v";
        parent::__construct();
        if (!getAdminSession()){
            redirect(base_url("Admin/Login"));
        }
    }

    public function index(){


        $this->load->model("Article_model");
        $viewData=new stdClass();


        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);

    }


}