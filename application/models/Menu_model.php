<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function select_menu()
    {
        $query = $this->db->query("SELECT * FROM admin_menus ORDER BY parent_id ASC");
        $row = $query->result();
		return $row;
    }

    public function select_parent($parent_id)
    {
        $query = $this->db->query("SELECT title FROM admin_menus WHERE id = $parent_id");
        foreach ($query->result() as $parent)
        {
            $parent = $parent->title;
            return $parent;
        }
    }

    public function select_permission()
    {
        $query = $this->db->query("SELECT users_groups.id, groups.description, users_groups.group_id, users_groups.user_id FROM groups LEFT JOIN users_groups ON groups.id = users_groups.group_id ORDER BY users_groups.id");
        $row = $query->result();
		return $row;
    }

    public function select_username_perm($id)
    {
        $query = $this->db->query("SELECT id, username FROM users WHERE id = '$id'");
        $row = $query->result();
		return $row;
    }

    public function select_groups()
    {
        $query = $this->db->query("SELECT * FROM groups WHERE 1");
        $row = $query->result();
        return $row;
    }

    public function menu($table, $child = '')
    {
        $query = $this->db->query("SELECT * FROM $table WHERE status = 1 $child");
        $row = $query->result();
        return $row;
    }

    public function submenu($table, $parent_id)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE parent_id = $parent_id AND status = 1");
        $row = $query->result();
        return $row;
    }
}