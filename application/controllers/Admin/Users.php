<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Hashids\Hashids;

class Users extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');

        if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('./login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin())
        {
            return show_error('You must be an administrator to access this page.');
        }
    }

    public function index()
    {
		$users = $this->Users_model->select_users();
        $data = [
            'parent_title' => 'Users',
            'page_title' => 'Admin Users',
			'users' => $users
        ];
        $this->_assets();
        $this->render($data);
    }

    public function listdata()
    {
        $response = [];
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 25;
        $orders = isset($_GET['order']) ? $_GET['order'] : array();
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

        $total = 0;
        $query = $this->db->query("SELECT COUNT(*) as total FROM users");
        $row = $query->row();
        if (isset($row)) $total = $row->total;
        
        $total_filter = $total;
        $data = array();
        $qs = $this->db->query("SELECT * FROM users LIMIT $start, $length");
        foreach($qs->result_array() as $row)
        {
            $status = $row['active'] ? '<span class="label label-success">active</span>' : '<span class="label label-default">disabled</span>';
            $url_edit = site_url('admin/users/edit/'.$row['id']);
            $url_del = site_url('admin/users/del/'.$row['id']);
            
            $action = '<div class="btn-group"> <a href="'.$url_edit.'" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="'.$url_del.'" class="btn btn-danger btn-xs btnRemove">del</a> </div>';
            foreach ($this->ion_auth->get_users_groups($row['id'])->result() as $line) $groups[] = $line->name;
            $data[] = array(
                'id' => $row['id'],
				'username' => $row['username'],
                'firstname' => $row['first_name'],
                'lastname' => $row['last_name'],
                'email' => $row['email'],
                'groups' => implode(', ', $groups),
                'status' => $status,
                'action' => $action
            );
        }

        $response = [
            'data' => $data,
            'draw' => $draw,
            'length' => $length,
            'recordsTotal' => $total,
            'recordsFiltered' => $total_filter
        ];

        $this->render_json($response);
    }

    public function listgroup()
    {
        $response = [];
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 100000;
        $orders = isset($_GET['order']) ? $_GET['order'] : array();
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

        $total = 0;
        $query = $this->db->query("SELECT COUNT(*) as total FROM groups");
        $row = $query->row();
        if (isset($row)) $total = $row->total;
        
        $total_filter = $total;
        $data = array();
        $qs = $this->db->query("SELECT * FROM groups ORDER BY id DESC LIMIT $start, $length");
        foreach($qs->result_array() as $row)
        {
            $url_edit = site_url('admin/users/groups/edit/'.$row['id']);
            $url_del = site_url('admin/users/groups/del/'.$row['id']);
            
            $action = '<div class="btn-group pull-right"> <a href="'.$url_edit.'" class="btn btn-default btn-xs btnEdit">Edit</a> <a href="'.$url_del.'" class="btn btn-danger btn-xs btnRemove">del</a> </div>';
            $groups = array();
            foreach ($this->ion_auth->get_users_groups($row['id'])->result() as $line) $groups[] = $line->name;
            $data[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'action' => $action
            );
        }
        
        $response = [
            'data' => $data,
            'draw' => $draw,
            'length' => $length,
            'recordsTotal' => $total,
            'recordsFiltered' => $total_filter
        ];

        $this->render_json($response);
    }

    public function add()
    {
        return $this->frm_user();
    }

    public function edit()
    {
        $id = intval($this->uri->segment(4,0));
        if (!$id)
        {
            $this->session->set_flashdata('error', 'Invalid edit user url');
            redirect('admin/users');
        }

        $qs = $this->db->query("SELECT * FROM users WHERE id=$id LIMIT 1");
        $row = $qs->row_array();
        if (isset($row) && $row)
        {
            return $this->frm_user($row);
        }

        $this->session->set_flashdata('error', 'Invalid edit users url.');
        redirect('admin/users');
    }

    public function delete()
    {
        $id = intval($this->uri->segment(4,0));
        $id = intval($id);

        if (!$id)
        {
            $this->session->set_flashdata('error', 'Invalid delete url!');
            redirect('admin/users');
        }

        if ($id)
        {
            $sql = "DELETE FROM users WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/users');
        }
    }

    public function del()
    {
        $id = $this->uri->segment(4,0);
        $id = intval($id);
        $confirm_id = $this->uri->segment(5);

        if (!$id)
        {
            $this->session->set_flashdata('error', 'Invalid delete User url!');
            redirect('admin/users');
        }

        $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
        $qs = $this->db->query($sql);
        $row = $qs->row_array();
        if (!isset($row) || !$row)
        {
            $this->session->set_flashdata('error', 'Invalid delete User url');
            redirect('admin/users');
        }

        $hashids = new Hashids(session_id());
        $ses_key = 'del_user';
        if ($confirm_id)
        {
            $ar = $hashids->decode($confirm_id);
            $del_key = $this->session->has_userdata($ses_key);
            $now = time();
            if (!$ar || count($ar) != 3 || $id != $ar[0] || $now > $ar[1] || $del_key != $ar[2])
            {
                $this->session->set_flashdata("danger", "Invalid delete command!");
                redirect('admin/users', 'refresh');
            } 

            $this->db->query("DELETE FROM users WHERE id=$id LIMIT 1");
            $this->session->unset_userdata($ses_key);
            $this->session->set_flashdata("success", "Data telah dihapus");
            redirect('admin/users', 'refresh');
        }
        else
        {
            $del_key = rand(1000, 9999);
            $confirm = array(
                $id,
                strtotime("+2 minute"),
                $del_key
            );
            $this->session->set_userdata($ses_key, $del_key);
            $confirm_id = $hashids->encode($confirm);
        }
        $data = array(
            'row' => $row,
            'confirm_id' => $confirm_id
        );
        $this->render($data, 'admin/users/del_user_confirmation');
    }

    protected function frm_user($forms=array())
    {
        $errors = array();
        $user_id = isset($forms['id']) ? intval($forms['id']) : 0;
        if (count($_POST))
        {
            $first_name = isset($_POST['first_name'])? trim($_POST['first_name']) : '';
            $first_name = strip_tags($first_name);
            if (!$first_name)
            {
                $errors['first_name'] = "Firstname harus diisi";
            }
            else
            {
                $len = strlen($first_name);
                if ($len > 25)
                {
                    $errors['first_name'] = "Firstname maksimal 25 huruf";
                }
            }

            $last_name = isset($_POST['last_name'])? trim($_POST['last_name']) : '';
            $last_name = strip_tags($last_name);
            $len = strlen($last_name);
            if ($len > 25)
            {
                $errors['last_name'] = "Lastname maksimal 25 huruf";
            }

            $company = isset($_POST['company'])? trim($_POST['company']) : '';
            $company = filter_var($company, FILTER_SANITIZE_STRING);
            $len = strlen($company);
            if ($len > 25)
            {
                $errors['company'] = "Company maksimal 25 huruf";
            }
			
			$username = isset($_POST['username'])? trim($_POST['username']) : '';
            $len = strlen($username);
            if ($len > 25)
            {
                $errors['username'] = "username maksimal 25 huruf";
            }
            else
            {
                if ($user_id)
                    $sql = "SELECT id FROM users WHERE id<>$user_id AND username='$username' LIMIT 1";
                else
                    $sql = "SELECT id FROM users WHERE username='$username' LIMIT 1";
                
                $qs = $this->db->query($sql);
                $row = $qs->row();
                if (isset($row) && $row)
                {
                    $errors['username'] = "username sudah digunakan";
                }
            }

            $email = isset($_POST['email'])? trim($_POST['email']) : '';
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $errors['email'] = "Email tidak valid";
            }
            else
            {
                if ($user_id)
                    $sql = "SELECT id FROM users WHERE id<>$user_id AND email='$email' LIMIT 1";
                else
                    $sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
                
                $qs = $this->db->query($sql);
                $row = $qs->row();
                if (isset($row) && $row)
                {
                    $errors['email'] = "Email sudah digunakan";
                }
            }

            $phone = isset($_POST['phone'])? trim($_POST['phone']) : '';
            $phone = preg_replace('/[^0-9]/','',$phone);
            $len = strlen($phone);
            if ($phone && ($len < 9 || $len > 15))
            {
                $errors['phone'] = "Nomor hp tidak valid";
            }

            $active = isset($_POST['active'])? intval($_POST['active']) : 0;

            $password = $this->input->post('password');
            $encrypted_password = $this->ion_auth->hash_password($password);
            $len = strlen($password);
            if (!$user_id && !$password)
            {
                $errors['password'] = "Password harus diisi";
            }
            elseif($password && $len < 4)
            {
                $errors['password'] = "Password minimal 5 huruf";
            }

            $password_confirm = $this->input->post('password_confirm');
            if ($password && !$password_confirm)
            {
                $errors['password_confirm'] = "Konfirmasi Password harus diisi";
            }
            elseif($password && ($password != $password_confirm))
            {
                $errors['password_confirm'] = "Konfirmasi password harus sama dengan password";
            }

            if (!count($errors))
            {
				$data = array(
                    'ip_address' => '127.0.0.1',
                    'username' => $username,
                    'password' => $encrypted_password,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'company' => $company,
					'phone' => $phone,
					'email' => $email,
					'active' => $active,
					'id' => $user_id
                );
				
                if ($user_id)
                {
                    $arUpdate = array();
                    foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                    $sql = "UPDATE users SET ".implode(',', $arUpdate)." WHERE id=".$user_id." LIMIT 1";
                    $this->db->query($sql);
                }
                else
                {
                    $sql = "INSERT INTO users (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
                    $this->db->query($sql);
                    $id_user = $this->db->insert_id();
                    $sql_group = "INSERT INTO users_groups (user_id, group_id) VALUES (".$id_user.",'1')";
                    $this->db->query($sql_group);
                }
                redirect('admin/users');
            }
            
            $forms = array(
				'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'company' => $company,
                'phone' => $phone,
                'email' => $email,
                'active' => $active,
                'id' => $user_id
            );
        }
        $data = array(
            'forms' => $forms,
			'parent_title' => 'Users Backend',
            'page_title' => 'Admin User',
            'errors' => $errors
        );

        $this->_assets();
        $this->render($data, 'admin/users/frm_user');
    }

    public function groups()
    {
        $list_group = $this->Users_model->select_groups();
        $parameter = $this->uri->segment(4);
        if ($parameter == 'edit' || $parameter == 'add')
        {
            return $this->frm_group();
        }
        elseif ($parameter == 'del')
        {
            return $this->del_group();
        }

        $data = [
            'parent_title' => 'Users Backend',
            'page_title' => 'Admin Groups',
            'list_group' => $list_group
        ];

        $this->_assets();
        $this->render($data);
    }

    protected function del_group()
    {
        $id = $this->uri->segment(5,0);
        $id = intval($id);

        if (!$id)
        {
            $this->session->set_flashdata('error', 'Invalid delete Group url!');
            redirect('admin/users/groups');
        }

        if ($id)
        {
            $this->db->query("DELETE FROM groups WHERE id=$id LIMIT 1");
            $this->session->set_flashdata("success", "Data telah dihapus");
            redirect('admin/users/groups', 'refresh');
        }
    }

    protected function frm_group()
    {
        $group_id = $this->uri->segment(5,0);
        $data = array();
        $errors = array();
        $forms = array();

        if ($group_id)
        {
            $sql = "SELECT * FROM groups WHERE id=$group_id LIMIT 1";
            $qs = $this->db->query($sql);
            $row = $qs->row();
            if (isset($row) && $row)
            {
                $forms = array(
                    'id' => $group_id,
                    'group_name' => $row->name,
                    'group_desc' => $row->description,
                );
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid edit Group url');
                redirect('admin/users/groups');
            }
        }

        if (count($_POST))
        {
            $group_name = isset($_POST['group_name']) ? trim($_POST['group_name']) : '';
            $group_name = filter_var($group_name, FILTER_SANITIZE_STRING);
            $group_name = preg_replace('/\s/', '', $group_name);
            $len = strlen($group_name);
            if (!$group_name)
            {
                $errors['group_name'] = "Nama group harus diisi";
            }
            elseif ($len > 20)
            {
                $errors['group_name'] = "Nama group maksimal 20 huruf";
            }
            else
            {
                if ($group_id)
                    $sql2 = "SELECT id FROM `groups` WHERE `name`='$group_name' AND id<>$group_id LIMIT 1";
                else
                    $sql2 = "SELECT id FROM `groups` WHERE `name`='$group_name' LIMIT 1";
                
                $qs2 = $this->db->query($sql2);
                $row2 = $qs2->row();
                if (isset($row2) && $row2)
                {
                    $errors['group_name'] = "Nama group sudah digunakan $sql2";
                }
            }

            $group_desc = isset($_POST['group_desc']) ? trim($_POST['group_desc']) : '';
            $group_desc = filter_var($group_desc, FILTER_SANITIZE_STRING);
            $len = strlen($group_desc);
            if ($len > 80)
            {
                $errors['group_desc'] = "Deskripsi group maksimal 80 huruf";
            }

            if (!count($errors))
            {
                $data = [
                    'name' => $group_name,
                    'description' => $group_desc
                ];
                if ($group_id)
                {
                    //$group_update = $this->ion_auth->update_group($group_id, $group_name, $group_desc);
                    $arUpdate = array();
                    foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                    $sql = "UPDATE groups SET ".implode(',', $arUpdate)." WHERE id=".$group_id." LIMIT 1";
                }
                else
                {
                    //$new_group_id = $this->ion_auth->create_group($group_name, $group_desc);
                    $sql = "INSERT INTO groups (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
                }
                
                //$this->session->set_flashdata('success', 'Group berhasil disimpan');
                $this->db->query($sql);
                redirect('admin/users/groups');
            }
            
            $forms = array(
                'group_name' => $group_name,
                'group_desc' => $group_desc,
            );

            if ($group_id) $forms['id'] = $group_id;
        }

        $data = array(
            'errors' => $errors,
			'parent_title' => 'Users Backend',
            'page_title' => 'Admin Groups',
            'forms' => $forms,
        );
        $this->_assets();
        $this->render($data, 'admin/users/frm_group');
    }

    private function _assets()
    {
        $this->add_css(site_url('assets/vendor/iCheck/all.css'));
        $this->add_js(site_url('assets/vendor/iCheck/icheck.min.js'));
        $this->add_js(site_url('assets/js/pages/admin_users.js'));

        $this->add_css(site_url('assets/vendor/fontawesome-picker/css/fontawesome-iconpicker.min.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-picker/js/fontawesome-iconpicker.min.js'));
        $this->add_css(site_url('assets/vendor/fontawesome-picker/css/fontawesome-iconpicker.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-picker/js/fontawesome-iconpicker.js'));
        $this->add_css(site_url('assets/vendor/fontawesome-5.3.1/css/fontawesome.min.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-5.3.1/js/fontawesome.min.js'));
        $this->add_css(site_url('assets/vendor/bootstrap-treeview/bootstrap-treeview.min.css'));
        $this->add_js(site_url('assets/vendor/bootstrap-treeview/bootstrap-treeview.min.js'));
        #vendor template
        $this->add_css(site_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'));
		$this->add_css(site_url('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css'));
		$this->add_css(site_url('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css'));
		$this->add_css(site_url('assets/vendor/dropzone/css/basic.css'));
		$this->add_css(site_url('assets/vendor/dropzone/css/dropzone.css'));
		$this->add_css(site_url('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css'));
		$this->add_css(site_url('assets/vendor/summernote/summernote.css'));
		$this->add_css(site_url('assets/vendor/summernote/summernote-bs3.css'));
		$this->add_css(site_url('assets/vendor/codemirror/lib/codemirror.css'));
		$this->add_css(site_url('assets/vendor/codemirror/theme/monokai.css'));
        $this->add_js(site_url('assets/vendor/jquery-maskedinput/jquery.maskedinput.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js'));
		$this->add_js(site_url('assets/vendor/fuelux/js/spinner.js'));
		$this->add_js(site_url('assets/vendor/dropzone/dropzone.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-markdown/js/markdown.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-markdown/js/to-markdown.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js'));
		$this->add_js(site_url('assets/vendor/codemirror/lib/codemirror.js'));
		$this->add_js(site_url('assets/vendor/codemirror/addon/selection/active-line.js'));
		$this->add_js(site_url('assets/vendor/codemirror/addon/edit/matchbrackets.js'));
		$this->add_js(site_url('assets/vendor/codemirror/mode/javascript/javascript.js'));
		$this->add_js(site_url('assets/vendor/codemirror/mode/xml/xml.js'));
		$this->add_js(site_url('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js'));
		$this->add_js(site_url('assets/vendor/codemirror/mode/css/css.js'));
		$this->add_js(site_url('assets/vendor/summernote/summernote.js'));
		$this->add_js(site_url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js'));
        $this->add_js(site_url('assets/vendor/ios7-switch/ios7-switch.js'));
        $this->add_css(site_url('assets/vendor/pnotify/pnotify.custom.css'));
        $this->add_js(site_url('assets/vendor/pnotify/pnotify.custom.js'));
    }
}
