<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 19-Dec-18
 * Time: 2:36 PM
 */

class Authors extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "Authors_v";
        $this->load->model("Author_model");
    }


    public function index()
    {
        $viewData=new stdClass();

        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="List";

        $viewData->authors=$this->Author_model->getAll(
            array(
                "isDeleted"     =>"0"
            )

        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function GetAdd()
    {
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "Add";


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


}