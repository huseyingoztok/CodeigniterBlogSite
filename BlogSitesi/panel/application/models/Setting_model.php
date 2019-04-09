<?php
/**
 * Created by PhpStorm.
 * User: huseyin-goztok
 * Date: 11/22/18
 * Time: 2:11 PM
 */

class Setting_model extends CI_Model
{
    public $tableName="";

    public function __construct()
    {
        parent::__construct();
        $this->tableName="settings";
    }


    public function find($where=array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }




    public function update($where=array(),$data=array())
    {
        return $this->db->where($where)->update($this->tableName,$data);
    }



}