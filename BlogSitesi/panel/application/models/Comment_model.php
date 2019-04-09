<?php
/**
 * Created by PhpStorm.
 * User: huseyin-goztok
 * Date: 11/22/18
 * Time: 2:11 PM
 */

class Comment_model extends CI_Model
{

    public $tableName="";
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "comment";
    }
    public function getAll($where = array(), $order = "Id ASC", $limit = "")
    {
        return $this->db->where($where)->order_by($order)->limit($limit)->get($this->tableName)->result();
    }







    public function find($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function findWithJoin($select = "", $where = array(), $joins = array(array()))
    {
        $this->db->select($select);
        if (!empty($joins)){
            foreach ($joins as  $join) {


                $this->db->join($join["jTable"], $join["condition"],$join["type"]);
            }

        }

        $this->db->where($where);


        return $this->db->get($this->tableName)->row();
    }

    public function insert($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }


    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }



    public function joinWithOthers($select = "", $where = array(), $order = "Id DESC", $limit = "", $count = "", $like = array(), $likes = array(), $joins = array(array()))
    {


        $this->db->select($select);
        if (!empty($joins)){
            foreach ($joins as  $join) {


                $this->db->join($join["jTable"], $join["condition"],$join["type"]);
            }

        }

        $this->db->where($where);
        if (!empty($like)){
            $this->db->like($like)->or_like($likes);
        }
        $this->db->limit($limit, $count)->order_by($order);

        return $this->db->get($this->tableName)->result();


    }


    public function joinWithOthersCount($where = array(), $like = array(), $likes = array(), $joins = array(array()))
    {
        if (!empty($joins)){
            foreach ($joins as  $join) {


                $this->db->join($join["jTable"], $join["condition"],$join["type"]);
            }

        }

        $this->db->where($where);
        if (!empty($like)){
            $this->db->like($like)->or_like($likes);
        }
        return $this->db->count_all_results($this->tableName);
    }


}