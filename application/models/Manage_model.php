<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_model extends CI_Model {

    public function select_content($op = '', $category_id = '')
    {
        $query = $this->db->query("SELECT * FROM content WHERE category $op $category_id ORDER BY id");
        $row = $query->result();
		return $row;
    }

    public function select_custom_content($column = '', $wherestr = '', $order = '', $limit = '')
    {
        $query = $this->db->query("SELECT $column FROM content $wherestr $order $limit");
        $row = $query->result();
		return $row;
    }

    public function select_custom_categories($column, $specified_column, $op, $data, $limit = '', $order = '')
    {
        $query = $this->db->query("SELECT $column FROM categories WHERE $specified_column $op '$data' $limit $order");
        $row = $query->result();
		return $row;
    }

}