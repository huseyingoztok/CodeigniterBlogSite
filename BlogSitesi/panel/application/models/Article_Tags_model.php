<?php
/**
 * Created by PhpStorm.
 * User: huseyin-goztok
 * Date: 11/22/18
 * Time: 2:11 PM
 */

class Article_Tags_model extends CI_Model
{
    public $tableName="";

    public function __construct()
    {
        parent::__construct();
        $this->tableName="articlestags";
    }

    public function insert($data=array())
    {
        return $this->db->insert($this->tableName,$data);
    }




}