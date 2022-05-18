<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function select_users()
    {
        $query = $this->db->query("SELECT * FROM users ORDER BY id");
        $row = $query->result();
		return $row;
    }

	public function get_group($id)
    {
        $query = $this->db->query("SELECT group_id FROM users_groups WHERE user_id = '$id'");
        foreach ($query->result() as $groups)
        {
            $groups = $groups->group_id;
        }
        return $groups;
    }

    public function select_groups($group_id = 1)
    {
        $query = $this->db->query("SELECT * FROM groups WHERE $group_id");
        $row = $query->result();
        return $row;
    }
}