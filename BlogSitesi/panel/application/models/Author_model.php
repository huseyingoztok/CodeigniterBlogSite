<?php
/**
 * Created by PhpStorm.
 * User: huseyin-goztok
 * Date: 11/22/18
 * Time: 2:11 PM
 */

class Author_model extends CI_Model
{
    public $tableName="";

    public function __construct()
    {
        parent::__construct();
        $this->tableName="author";
    }


    public function getAll($where=array(),$order="Id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function insert($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }


    public function find($where=array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }




    public function update($where=array(),$data=array())
    {
        return $this->db->where($where)->update($this->tableName,$data);
    }


    public function delete($where=array(),$data=array())
    {
        return $this->db->where($where)->update($this->tableName,$data);
    }

}