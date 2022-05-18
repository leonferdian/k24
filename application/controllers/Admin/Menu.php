<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Hashids\Hashids;

class Menu extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');

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
        $table = 'admin_menus';

        $data = [
            'parent_title' => 'Settings',
            'page_title' => 'Admin Menu',
            'table' => $table
        ];
        $this->_assets();
        $this->render($data);
    }

    public function top_menu($action = '', $id = '')
    {
        $table = 'top_menu';

        $op_parents = '<option value="0">New Parent</option>';
        $query = $this->db->query("SELECT id, title FROM $table WHERE parent_id < 1");
        foreach ($query->result() as $parents)
        {
            $parent_id = $parents->id;
            $parent_title = $parents->title;
            $op_parents .= '<option value="'.$parent_id.'">'.$parent_title.'</option>';
        }

        if ($action == 'add')
        {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $forms['title'] = $title;
                
            $parent_id = isset($_POST['parent_id']) ? trim($_POST['parent_id']) : '';
            $forms['parent_id'] = $parent_id;

            $url = isset($_POST['url']) ? trim($_POST['url']) : '';
            $forms['url'] = $url;

            $status = isset($_POST['status']) ? 1 : 0;
            $forms['status'] = $status;

            $this->form_menu($forms, $table);
        }
        elseif ($action == 'edit')
        {
            $qs = $this->db->query("SELECT * FROM $table WHERE id=$id LIMIT 1");
            $row = $qs->row_array();
            if (isset($row) && $row)
            {
                return $this->form_menu($row, $table);
            }
        }
        elseif ($action == 'delete')
        {
            $sql = "DELETE FROM $table WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/menu/'.$table, 'refresh');
        }

        $data = [
            'page_title' => 'Top Menu',
            'table' => $table,
            'action_add' => 'admin/menu/'.$table.'/add',
            'op_parents' => $op_parents
        ];
        $this->_assets();
        $this->render($data);
    }

    public function main_menu($action = '', $id = '')
    {
        $table = 'main_menu';

        $op_parents = '<option value="0">New Parent</option>';
        $query = $this->db->query("SELECT id, title FROM $table WHERE parent_id < 1");
        foreach ($query->result() as $parents)
        {
            $parent_id = $parents->id;
            $parent_title = $parents->title;
            $op_parents .= '<option value="'.$parent_id.'">'.$parent_title.'</option>';
        }

        if ($action == 'add')
        {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $forms['title'] = $title;
                
            $parent_id = isset($_POST['parent_id']) ? trim($_POST['parent_id']) : '';
            $forms['parent_id'] = $parent_id;

            $url = isset($_POST['url']) ? trim($_POST['url']) : '';
            $forms['url'] = $url;

            $status = isset($_POST['status']) ? 1 : 0;
            $forms['status'] = $status;

            $this->form_menu($forms, $table);
        }
        elseif ($action == 'edit')
        {
            $qs = $this->db->query("SELECT * FROM $table WHERE id=$id LIMIT 1");
            $row = $qs->row_array();
            if (isset($row) && $row)
            {
                return $this->form_menu($row, $table);
            }
        }
        elseif ($action == 'delete')
        {
            $sql = "DELETE FROM $table WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/menu/'.$table, 'refresh');
        }

        $data = [
            'page_title' => 'Main Menu',
            'table' => $table,
            'action_add' => 'admin/menu/'.$table.'/add',
            'op_parents' => $op_parents
        ];
        $this->_assets();
        $this->render($data);
    }

    public function footer_menu($action = '', $id = '')
    {
        $table = 'footer_menu';

        $op_parents = '<option value="0">New Parent</option>';
        $query = $this->db->query("SELECT id, title FROM $table WHERE parent_id < 1");
        foreach ($query->result() as $parents)
        {
            $parent_id = $parents->id;
            $parent_title = $parents->title;
            $op_parents .= '<option value="'.$parent_id.'">'.$parent_title.'</option>';
        }

        if ($action == 'add')
        {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $forms['title'] = $title;
                
            $parent_id = isset($_POST['parent_id']) ? trim($_POST['parent_id']) : '';
            $forms['parent_id'] = $parent_id;

            $url = isset($_POST['url']) ? trim($_POST['url']) : '';
            $forms['url'] = $url;

            $status = isset($_POST['status']) ? 1 : 0;
            $forms['status'] = $status;

            $this->form_menu($forms, $table);
        }
        elseif ($action == 'edit')
        {
            $qs = $this->db->query("SELECT * FROM $table WHERE id=$id LIMIT 1");
            $row = $qs->row_array();
            if (isset($row) && $row)
            {
                return $this->form_menu($row, $table);
            }
        }
        elseif ($action == 'delete')
        {
            $sql = "DELETE FROM $table WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/menu/'.$table, 'refresh');
        }

        $data = [
            'page_title' => 'Footer Menu',
            'table' => $table,
            'action_add' => 'admin/menu/'.$table.'/add',
            'op_parents' => $op_parents
        ];
        $this->_assets();
        $this->render($data);
    }

    protected function form_menu($forms=array(), $table)
    {
        $op_parents = '<option value="0">New Parent</option>';
        $query = $this->db->query("SELECT id, title FROM $table WHERE parent_id < 1");
        foreach ($query->result() as $parents)
        {
            $id = $parents->id;
            $parent_title = $parents->title;
            $s = $id== $forms['parent_id'] ? "selected" : "";
            $op_parents .= '<option value="'.$id.'"'.$s.'>'.$parent_title.'</option>';
        }

        $errors = array();
        if (count($_POST))
        {
            $errors = array();
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $forms['title'] = $title;
            
            $parent_id = isset($_POST['parent_id']) ? trim($_POST['parent_id']) : '';
            $forms['parent_id'] = $parent_id;

            $url = isset($_POST['url']) ? trim($_POST['url']) : '';
            $forms['url'] = $url;

            $status = isset($_POST['status']) ? 1 : 0;
            $forms['status'] = $status;

            $query = $this->db->query("SELECT child FROM $table WHERE id = $parent_id");
            foreach ($query->result() as $child)
            {
                $add_child = $child->child + 1;
            }

            if (!count($errors))
            {
                $data = array(
                    'title' => $title,
                    'parent_id' => $parent_id,
                    'url' => $url,
                    'status' => $status,
                );

                if (isset($forms['id']) && $forms['id'])
                {
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $arUpdate = array();
                    foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                    $sql = "UPDATE $table SET ".implode(',', $arUpdate)." WHERE id=".$forms['id']." LIMIT 1";
                }
                else
                {
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO $table (".implode(',', array_keys($add_data)).") VALUES ('".implode("','", array_values($add_data))."')";
                    if ($parent_id > 0)
                    {
                        $sql2 = "UPDATE $table SET child = $add_child WHERE id = $parent_id";
                        $this->db->query($sql2);
                    }
                }
                
                $this->db->query($sql);
                redirect('admin/menu/'.$table);
            }
        }

        $data = array(
            'forms' => $forms,
            'parent_title' => 'Settings',
            'page_title' => 'Admin Menu',
            'op_parents' => $op_parents,
            'table' => $table,
            'errors' => $errors
        );
        $this->_assets();
        $this->render($data, 'admin/menu/form_menu');
    }

    public function delete_menu()
    {
        $id = intval($this->uri->segment(4,0));
        $id = intval($id);

        if (!$id)
        {
            $this->session->set_flashdata('error', 'Invalid delete url!');
            redirect('admin/menu');
        }

        if ($id)
        {
            $sql = "DELETE FROM admin_menus WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/menu', 'refresh');
        }
    }

    public function delete_permission()
    {
        $id = intval($this->uri->segment(4,0));
        $id = intval($id);

        if (!$id)
        {
            $this->session->set_flashdata('error', 'Invalid delete Group url!');
            redirect('admin/menu/permission');
        }

        if ($id)
        {
            $sql = "DELETE FROM users_groups WHERE `user_id` = $id";
            $this->db->query($sql);
            redirect('admin/menu/permission', 'refresh');
        }
    }

    public function listdata($table = '')
    {
        $response = [];
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 100000;
        $orders = isset($_GET['order']) ? $_GET['order'] : array();
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

        $total = 0;
        $query = $this->db->query("SELECT COUNT(*) as total FROM $table");
        $row = $query->row();
        if (isset($row)) $total = $row->total;
        
        $total_filter = $total;
        $data = array();
        $qs = $this->db->query("SELECT * FROM $table ORDER BY id DESC LIMIT $start, $length");
        foreach($qs->result_array() as $row)
        {
            $status = $row['status'] ? '<span class="label label-success">active</span>' : '<span class="label label-default">disabled</span>';
            if ($table == 'admin_menus')
            {
                $btn1 = '<a class="btn btn-sm btn-info" href="'.site_url('admin/menu/edit/'.$row['id']).'">edit</a>';
                $btn2 = '<button class="btn btn-delete btn-sm btn-danger" data-url="'.site_url('admin/menu/delete_menu/'.$row['id']).'">delete</button>';
            }
            else
            {
                $btn1 = '<a class="btn btn-sm btn-info" href="'.site_url('admin/menu/'.$table.'/edit/'.$row['id']).'">edit</a>';
                $btn2 = '<button class="btn btn-delete btn-sm btn-danger" data-url="'.site_url('admin/menu/'.$table.'/delete/'.$row['id']).'">delete</button>';
            }
            $url = '<a href="'.site_url($row['url']).'" target="_blank">'.site_url($row['url']).'</a>';
            $data[] = array(
                $row['id'],
                $row['title'],
                $url,
                $status,
                $btn1.' '.$btn2
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
        $add = [
            'parent_id' => ''
        ];
        
        $this->frm_menu($add);
    }

    public function add_permission()
    {
        return $this->frm_permission();
    }

    public function edit_permission()
    {
        $id = intval($this->uri->segment(4,0));
        $id = intval($id);
        $edit = [
            'id' => $id
        ];

        $this->frm_permission($edit);
    }

    public function edit()
    {
        $id = intval($this->uri->segment(4,0));
        $id = intval($id);

        $qs = $this->db->query("SELECT * FROM admin_menus WHERE id=$id LIMIT 1");
        $row = $qs->row_array();
        if (isset($row) && $row)
        {
            return $this->frm_menu($row);
        }
    }

    protected function frm_permission($forms=array())
    {
        if (isset($forms['id']))
        {
            $id = $forms['id'];
        }
        else
        {
            $id = intval($this->uri->segment(4,0));
            $id = intval($id);
        }

        if ($id)
        {
            $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
            $qs = $this->db->query($sql);
            $row = $qs->row();
            if (isset($row) && $row)
            {
                $forms = array(
                    'id' => $id,
                    'username' => $row->username
                );
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid edit Group url');
                redirect('admin/menu/permission');
            }
        }

        $op_username = '';
        $query = $this->db->query("SELECT * FROM users ORDER BY id");
        foreach ($query->result() as $user)
        {
            $user_id = $user->id;
            $username = $user->username;
            $s = $username == isset($forms['username']) ? "selected" : "";
            $op_username .= '<option value="'.$user_id.'" '.$s.'>'.$username.'</option>';
        }

        $query = $this->db->query("SELECT groups.description, users_groups.user_id FROM groups LEFT JOIN users_groups ON users_groups.group_id = groups.id WHERE users_groups.user_id = $id");
        foreach ($query->result() as $result)
        {
            $perm_name = $result->description;
        }

        $op_permission = '';
        if (!$op_permission)
        {
            $op_permission = '';
            $list_perm = $this->Menu_model->select_groups();
            foreach ($list_perm as $perm)
            {
                $perm_id = $perm->id;
                $name = $perm->name;
                $s = $name == isset($perm_name) ? "selected" : "";
                $op_permission .= '<option value="'.$perm_id.'" '.$s.'>'.$name.'</option>';
            }
        }

        if (count($_POST))
        {
            $user_id = isset($_POST['username']) ? trim($_POST['username']) : '';
            $group_id = isset($_POST['permission']) ? trim($_POST['permission']) : '';

            $data = [
                'group_id' => $group_id
            ];

            if ($id)
            {
                $arUpdate = array();
                foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                $sql = "UPDATE users_group SET ".implode(',', $arUpdate)." WHERE user_id=".$forms['id']." LIMIT 1";
            }
            else
            {
                $data['user_id'] = $user_id;
                $sql = "INSERT INTO users_groups (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
                $this->db->query($sql);
                redirect('admin/menu/permission');
            }
            $this->db->query($sql);
            redirect('admin/menu/permission');
            
            $forms = array(
                'username' => $username,
                'group_desc' => $group_desc,
            );

            if ($id) $forms['id'] = $id;
        }

        $data = array(
			'parent_title' => 'Settings',
            'page_title' => 'Permission',
            'op_username' => $op_username,
            'op_permission' => $op_permission,
            'forms' => $forms
        );
        $this->_assets();
        $this->render($data, 'admin/menu/frm_permission');
    }

    protected function frm_menu($forms=array())
    {
        $op_parents = isset($forms['op_parents']);
        if (!$op_parents)
        {
            $op_parents = '<option value="2">New Parent</option>';
            $query = $this->db->query("SELECT id, title FROM admin_menus WHERE parent_id = 2");
            foreach ($query->result() as $parents)
            {
                $id = $parents->id;
                $parent_title = $parents->title;
                $s = $id== $forms['parent_id'] ? "selected" : "";
                $op_parents .= '<option value="'.$id.'"'.$s.'>'.$parent_title.'</option>';
            }
        }

        $errors = array();
        if (count($_POST))
        {
            $errors = array();
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $len = strlen($title);
            if (!$title)
            {
                $errors['title'] = 'Menu Title harus diisi';
            }
            elseif($len < 3)
            {
                $errors['title'] = 'Menu Title minimal 3 huruf';
            }
            elseif($len > 50)
            {
                $errors['title'] = 'Menu Title maksimal 50 huruf';
            }
            $forms['title'] = $title;
            
            $parent_id = isset($_POST['parent_id']) ? trim($_POST['parent_id']) : '';
            $forms['parent_id'] = $parent_id;

            $url = isset($_POST['url']) ? trim($_POST['url']) : '';
            $forms['url'] = $url;

            $icon = isset($_POST['icon']) ? trim($_POST['icon']) : '';
            $forms['icon'] = $icon;

            $status = isset($_POST['status']) ? 1 : 0;
            $forms['status'] = $status;

            $query = $this->db->query("SELECT child FROM admin_menus WHERE id = $parent_id");
            $count = $query['COUNT(*)'];
            if ($count > 0) {
                foreach ($query->result() as $child)
                {
                    $add_child = $child->child + 1;
                }
            }
            

            if (!count($errors))
            {
                $url_info = parse_url($url);

                $data = array(
                    'title' => $title,
                    'parent_id' => $parent_id,
                    'url' => $url,
                    'icon' => $icon,
                    'scheme' => '',
                    'host' => '',
                    'path' => '',
                    'qs' => '',
                    'status' => $status,
                );

                if (isset($forms['id']) && $forms['id'])
                {
                    $data['updated'] = date("Y-m-d H:i:s");
                    $arUpdate = array();
                    foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                    $sql = "UPDATE admin_menus SET ".implode(',', $arUpdate)." WHERE id=".$forms['id']." LIMIT 1";
                }
                else
                {
                    $data['created'] = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO admin_menus (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
                    if ($count > 0) {
                        $sql2 = "UPDATE admin_menus SET child = $add_child WHERE id = $parent_id";
                        $this->db->query($sql2);
                    }
                }
                
                $this->db->query($sql);
                redirect('admin/menu');
            }
        }

        $data = array(
            'forms' => $forms,
            'parent_title' => 'Settings',
            'page_title' => 'Admin Menu',
            'op_parents' => $op_parents,
            'errors' => $errors
        );
        $this->_assets();
        $this->render($data, 'admin/menu/frm_menu');
    }

    public function permission()
    {
        $data = [
            'parent_title' => 'Settings',
            'page_title' => 'Permission'
        ];
        $this->_assets();
        $this->render($data);
    }

    public function listpermission()
    {
        $response = [];
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 25;
        $orders = isset($_GET['order']) ? $_GET['order'] : array();
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

        $total = 0;
        $query = $this->db->query("SELECT COUNT(*) as total FROM users_groups");
        $row = $query->row();
        if (isset($row)) $total = $row->total;
        
        $total_filter = $total;
        $data = array();
        $qs = $this->db->query("SELECT users_groups.user_id, groups.name, groups.description FROM users_groups LEFT JOIN groups ON users_groups.group_id = groups.id ORDER BY users_groups.user_id LIMIT $start, $length");
        foreach($qs->result_array() as $row)
        {
            $btn1 = '<a class="btn btn-sm btn-info" href="'.site_url('admin/menu/edit_permission/'.$row['user_id']).'">edit</a>';
            $btn2 = '<button class="btn btn-delete btn-sm btn-danger" data-url="'.site_url('admin/menu/delete_permission/'.$row['user_id']).'">delete</button>';
            $data[] = array(
                $row['user_id'],
                $row['description'],
                $btn1.' '.$btn2
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
    
    private function _assets()
    {
        $this->add_css(site_url('assets/vendor/fontawesome-picker/css/fontawesome-iconpicker.min.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-picker/js/fontawesome-iconpicker.min.js'));
        $this->add_css(site_url('assets/vendor/fontawesome-picker/css/fontawesome-iconpicker.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-picker/js/fontawesome-iconpicker.js'));
        $this->add_css(site_url('assets/vendor/fontawesome-5.3.1/css/fontawesome.min.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-5.3.1/js/fontawesome.min.js'));
        $this->add_css(site_url('assets/vendor/bootstrap-treeview/bootstrap-treeview.min.css'));
        $this->add_js(site_url('assets/vendor/bootstrap-treeview/bootstrap-treeview.min.js'));
        $this->add_js(site_url('assets/js/pages/admin_menu.js'));
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
