<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Hashids\Hashids;

class Menu extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');

        // if (!$this->ion_auth->logged_in())
		// {
		// 	// redirect them to the login page
		// 	redirect('onlyus/login', 'refresh');
        // }
        // else if (!$this->ion_auth->is_admin())
        // {
        //     return show_error('You must be an administrator to access this page.');
        // }
    }

    public function index()
    {
        $menu = $this->Menu_model->select_menu();

        $data = [
            'parent_title' => 'Settings',
            'page_title' => 'Admin Menu',
            'menu' => $menu
        ];
        $this->_assets();
        $this->render($data);
    }

    public function delete_menu()
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
            $sql = "DELETE FROM admin_menus WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/menu/permission', 'refresh');
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
            $sql = "DELETE FROM users_groups WHERE id = $id";
            $this->db->query($sql);
            redirect('admin/menu/permission', 'refresh');
        }
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
        $query = $this->db->query("SELECT COUNT(*) as total FROM admin_menus");
        $row = $query->row();
        if (isset($row)) $total = $row->total;
        
        $total_filter = $total;
        $data = array();
        $qs = $this->db->query("SELECT * FROM admin_menus ORDER BY id DESC LIMIT $start, $length");
        foreach($qs->result_array() as $row)
        {
            $status = $row['status'] ? '<span class="label label-success">active</span>' : '<span class="label label-default">disabled</span>';
            $edit = '<a href="'.site_url('admin/menu/edit/'.$row['id']).'">edit</a>';
            $url = '<a href="'.site_url($row['url']).'" target="_blank">'.site_url($row['url']).'</a>';
            $data[] = array(
                $row['id'],
                $row['title'],
                $url,
                $status,
                $edit
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

    public function list_tree()
    {
        $tree = array(
            array(
                'text' => 'Parent 1',
                'tags' => array('2'),
                'nodes' => array(
                    array(
                        'text' => 'Child 1',
                        'tags' => array('3'),
                        'nodes' => array(
                            array(
                                'text' => 'deep 3',
                                'tags' => array(6)
                            ),
                            array(
                                'text' => 'Sub menu deep 3',
                                'tags' => array(6)
                            )
                        )
                    ),
                ),

            ),
        );
        /*
        alternateData = [
            {
              text: 'Parent 1',
              tags: ['2'],
              nodes: [
                {
                  text: 'Child 1',
                  tags: ['3'],
                  nodes: [
                    {
                      text: 'Grandchild 1',
                      tags: ['6']
                    },
                    {
                      text: 'Grandchild 2',
                      tags: ['3']
                    }
                  ]
                },
                {
                  text: 'Child 2',
                  tags: ['3']
                }
              ]
            },
            {
              text: 'Parent 2',
              tags: ['7']
            },
            {
              text: 'Parent 3',
              icon: 'glyphicon glyphicon-earphone',
              href: '#demo',
              tags: ['11']
            },
            {
              text: 'Parent 4',
              icon: 'glyphicon glyphicon-cloud-download',
              href: '/demo.html',
              tags: ['19'],
              selected: true
            },
            {
              text: 'Parent 5',
              icon: 'glyphicon glyphicon-certificate',
              color: 'pink',
              backColor: 'red',
              href: 'http://www.tesco.com',
              tags: ['available','0']
            }
          ];
        */
        $this->render_json($tree);
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
        $op_permission = '';
        $list_perm = $this->Menu_model->select_groups();
        foreach ($list_perm as $perm)
        {
            $perm_id = $perm->id;
            $name = $perm->name;
            $s = $name == $perm_name ? "selected" : "";
            $op_permission .= '<option value="'.$perm_id.'" '.$s.'>'.$name.'</option>';
        }

        $data = [
            'op_permission' => $op_permission
        ];

        return $this->frm_permission($data);
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

        $query = $this->db->query("SELECT groups.description, users_groups.user_id FROM groups LEFT JOIN users_groups ON users_groups.group_id = groups.id WHERE users_groups.user_id = $id");
        foreach ($query->result() as $result)
        {
            $perm_name = $result->description;
        }

        $op_permission = isset($forms['op_permission']);
        if (!$op_permission)
        {
            $op_permission = '';
            $list_perm = $this->Menu_model->select_groups();
            foreach ($list_perm as $perm)
            {
                $perm_id = $perm->id;
                $name = $perm->name;
                $s = $name == $perm_name ? "selected" : "";
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
                $data = [
                    'user_id' => $user_id
                ];
                
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
            'page_title' => 'Admin Menu/Permission',
            'op_permission' => $op_permission,
            'forms' => $forms,
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
            $query = $this->db->query("SELECT id, title FROM admin_menus WHERE child > 0");
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
            foreach ($query->result() as $child)
            {
                $add_child = $child->id + 1;
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
                    $data['updated'] = time();
                    $arUpdate = array();
                    foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                    $sql = "UPDATE admin_menus SET ".implode(',', $arUpdate)." WHERE id=".$forms['id']." LIMIT 1";
                }
                else
                {
                    $sql = "INSERT INTO admin_menus (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
                    $sql2 = "UPDATE admin_menus SET child = $add_child WHERE id = $parent_id";
                    $this->db->query($sql2);
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
        $op_username = '';
        $op_permission = '';

        $list_permission = $this->Menu_model->select_permission();

        $query = $this->db->query("SELECT * FROM users ORDER BY id");
        foreach ($query->result() as $user)
        {
            $user_id = $user->id;
            $name = $user->username;
            $op_username .= '<option value="'.$user_id.'">'.$name.'</option>';
        }
        
        $list_group = $this->Menu_model->select_groups();
        foreach ($list_group as $group)
        {
            $group_id = $group->id;
            $description = $group->description;
            $op_permission .= '<option value="'.$group_id.'">'.$description.'</option>';
        }

        $data = [
            'parent_title' => 'Settings',
            'page_title' => 'Admin Menu/Permission',
            'list_permission' => $list_permission,
            'op_username' => $op_username,
            'op_permission' => $op_permission
        ];
        $this->_assets();
        $this->render($data);
    }
    
    private function _assets()
    {
        $this->add_css(site_url('assets/vendor/fontawesome-picker/css/fontawesome-iconpicker.min.css'));
        $this->add_js(site_url('assets/vendor/fontawesome-picker/js/fontawesome-iconpicker.js'));
        $this->add_css(site_url('assets/vendor/bootstrap-treeview/bootstrap-treeview.min.css'));
        $this->add_js(site_url('assets/vendor/bootstrap-treeview/bootstrap-treeview.min.js'));
        $this->add_js(site_url('assets/js/pages/admin_menu.js'));
    }
}
