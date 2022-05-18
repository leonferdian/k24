<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEmber extends MY_Controller 
{

	public function __construct()
    {
        parent::__construct();
	}
	
	public function index()
	{
		$data = [
            'page_title' => 'Member',
			'parent_title' => ''
		];
        $this->render($data);
	}

	public function list_user_active() {
        $query = $this->db->query("select * from member where status_online = '1'");
        $qs = $query->result();
        $no = 1;
        foreach ($qs as $row) {
            // $status = $row['status'] ? '<span class="label label-success">active</span>' : '<span class="label label-default">disabled</span>';
            // $btn1 = '<a class="btn btn-sm btn-info" href="'.site_url('administrator/'.$table.'/edit/'.$row['id']).'">edit</a>';
            $btn2 = '<button class="btn btn-delete btn-sm btn-danger" data-url="'.site_url('administrator/del_penjualan/'.$row->NoPenjualan.'').'">delete</button>';

            $data[] = array(
                $no,
                $row->nama
            );
            
            $no++;
        }

        $this->render($data, 'member/list_member');
	}

	public function register() {

		$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';
		$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
		$tgl_lahir = isset($_POST['tgl_lahir']) ? trim($_POST['tgl_lahir']) : '';
		$email = isset($_POST['email']) ? trim($_POST['email']) : '';
		$nik = isset($_POST['nik']) ? trim($_POST['nik']) : '';
		$foto = isset($_POST['foto']) ? trim($_POST['foto']) : '';
		$nama_foto = 'foto-'.$nik.'-'.$tgl_lahir;
		$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

		$data = array(
			'nama' => $nama,
			'password' => $password,
			'phone' => $phone,
			'tgl_lahir' > $tgl_lahir,
			'email' => $email,
			'nik' => $nik,
			'foto' => $nama_foto,
			'gender' => $gender
		);

		if (count($_POST)) {
			$sql = "INSERT INTO admin_menus (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
		}
		
	}
}
