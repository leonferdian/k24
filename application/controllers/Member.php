<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		if (!isset($_SESSION['id_user'])) {
			redirect('member/login');
		}

		$data = [
			'page_title' => 'Register Member',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data);
	}

	public function login()
	{

		$data = [
			'page_title' => 'Login',
			'parent_title' => ''
		];
		$this->_assets();
		$this->render($data, 'member/login');
	}

	public function login_submit()
	{
		if (count($_POST)) {

			$password = md5("user" . sha1(trim($_POST['password'])) . "k24");
			$query = $this->db->query("select * from member where email = '" . $_POST['email'] . "'");
			$qs = $query->result();
			foreach ($qs as $row) {
				if ($row->password == $password) {
					$query = $this->db->query("update member set status_online = '1' where email = '" . $_POST['email'] . "'");
					$_SESSION['nama'] = $row->nama;
					$_SESSION['id_user'] = $row->id;
					$_SESSION['phone'] = $row->phone;
					$_SESSION['tgl_lahir'] = $row->tgl_lahir;
					$_SESSION['email'] = $row->email;
					$_SESSION['nik'] = $row->nik;
					$_SESSION['foto'] = $row->foto;
					$_SESSION['gender'] = $row->gender;
					echo "Login Success";
					// redirect('member/dashboard');
				} else {
					echo "Email atau password salah!";
					// redirect('member/login');
					$data = [
						'page_title' => 'Login',
						'parent_title' => ''
					];

					$this->_assets();
					$this->render($data, 'member/login');
				}
			}
		}
	}

	public function logout($email)
	{
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();

		$this->db->query("update member set status_online = '0' where email = '" . $email . "'");

		redirect('member/login');
	}

	public function profile()
	{
		if (!isset($_SESSION['id_user'])) {
			redirect('member/login');
		}

		$query = $this->db->query("select * from member where email = '" . $_SESSION['email'] . "'");
		$qs = $query->result();
		$row_data = [];
		foreach ($qs as $row) {
			$row_data['nama'] = $row->nama;
			$row_data['id_user'] = $row->id;
			$row_data['phone'] = $row->phone;
			$row_data['tgl_lahir'] = $row->tgl_lahir;
			$row_data['email'] = $row->email;
			$row_data['nik'] = $row->nik;
			$row_data['foto'] = $row->foto;
			$row_data['gender'] = $row->gender;
		}

		$data = [
			'page_title' => 'Profile',
			'parent_title' => 'Member',
			'row_data' => $row_data
		];

		$this->_assets();
		$this->render($data, 'member/profile');
	}

	public function dashboard()
	{
		if (!isset($_SESSION['id_user'])) {
			redirect('member/login');
		}
		
		$data = [
			'page_title' => 'Dashboard',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'member/list_member');
	}

	public function list_user_active()
	{
		$response = [];
		$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
		$length = isset($_GET['length']) ? intval($_GET['length']) : 100000;
		$orders = isset($_GET['order']) ? $_GET['order'] : array();
		$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
		$search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

		$total = 0;
		$query = $this->db->query("SELECT COUNT(*) as total FROM member where status_online = '1'");
		$row = $query->row();
		if (isset($row)) $total = $row->total;

		$total_filter = $total;
		$data = array();
		$qs = $this->db->query("SELECT * FROM member where status_online = '1' LIMIT $start, $length");
		$no = 1;
		foreach ($qs->result_array() as $row) {
			$data[] = array(
				$no,
				'<i class="text-success fa fa-circle"></i> ' . $row['nama'],
				$row['email']
			);
			$no++;
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

	public function list_data()
	{
		$response = [];
		$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
		$length = isset($_GET['length']) ? intval($_GET['length']) : 100000;
		$orders = isset($_GET['order']) ? $_GET['order'] : array();
		$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
		$search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

		$total = 0;
		$query = $this->db->query("SELECT COUNT(*) as total FROM member order by nama");
		$row = $query->row();
		if (isset($row)) $total = $row->total;

		$total_filter = $total;
		$data = array();
		$qs = $this->db->query("SELECT * FROM member order by nama LIMIT $start, $length");
		$no = 1;
		foreach ($qs->result_array() as $row) {
			$data[] = array(
				$no,
				$row['nama'],
				$row['phone'],
				$row['tgl_lahir'],
				$row['email'],
				$row['nik'],
				$row['gender'],
				$row['status'],
				'<a class="btn btn-sm btn-info" href="'.site_url('administrator/profile_member/'.$row['email']).'">edit</a>'
			);
			$no++;
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

	public function register()
	{

		if (count($_POST)) {
			$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
			$password = isset($_POST['password']) ? md5("user" . sha1(trim($_POST['password'])) . "k24") : '';
			$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
			$tgl_lahir = isset($_POST['tgl_lahir']) ? date("Y-m-d", strtotime($_POST['tgl_lahir'])) : date("Y-m-d");
			$email = isset($_POST['email']) ? trim($_POST['email']) : '';
			$nik = isset($_POST['nik']) ? trim($_POST['nik']) : '';
			$foto = $_FILES['foto']['tmp_name'];
			$nama_foto = 'foto-' . $nik . '-' . $tgl_lahir . '.jpg';
			$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';


			$data = array(
				'nama' => $nama,
				'password' => $password,
				'phone' => $phone,
				'tgl_lahir' => $tgl_lahir,
				'email' => $email,
				'nik' => $nik,
				'foto' => $nama_foto,
				'gender' => $gender
			);


			if ($_POST['password'] == $_POST['pwd_confirm']) {
				if (move_uploaded_file($foto, 'images/avatar/' . $nama_foto)) {
					$sql = "INSERT INTO member (" . implode(',', array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
					$this->db->query($sql);
					echo "Register success, click ok to login";
				} else {
					echo "Gagal upload file";
				}
			} else {
				echo "Password and confirm doesn't match!";
			}
		}
	}

	public function update_profile()
	{
		if (count($_POST)) {
			$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
			$password = isset($_POST['password']) ? md5("user" . sha1(trim($_POST['password'])) . "k24") : '';
			$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
			$tgl_lahir = isset($_POST['tgl_lahir']) ? date("Y-m-d", strtotime($_POST['tgl_lahir'])) : date("Y-m-d");
			$email = isset($_POST['email']) ? trim($_POST['email']) : '';
			$nik = isset($_POST['nik']) ? trim($_POST['nik']) : '';
			$foto = $_FILES['foto']['tmp_name'];
			$nama_foto = 'foto-' . $nik . '-' . $tgl_lahir . '.jpg';
			$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

			if ($_POST['password'] == $_POST['pwd_confirm']) {
				if ($_POST['password'] != "") {
					if ($_POST['size'] > 0) {
						$data = array(
							'nama' => $nama,
							'password' => $password,
							'phone' => $phone,
							'tgl_lahir' => $tgl_lahir,
							'email' => $email,
							'nik' => $nik,
							'foto' => $nama_foto,
							'gender' => $gender
						);
					} else {
						$data = array(
							'nama' => $nama,
							'password' => $password,
							'phone' => $phone,
							'tgl_lahir' => $tgl_lahir,
							'email' => $email,
							'nik' => $nik,
							'gender' => $gender
						);
					}
					
				} else {
					if ($_POST['size'] > 0) {
						$data = array(
							'nama' => $nama,
							'phone' => $phone,
							'tgl_lahir' => $tgl_lahir,
							'email' => $email,
							'nik' => $nik,
							'foto' => $nama_foto,
							'gender' => $gender
						);
					} else {
						$data = array(
							'nama' => $nama,
							'phone' => $phone,
							'tgl_lahir' => $tgl_lahir,
							'email' => $email,
							'nik' => $nik,
							'gender' => $gender
						);
					}
				}
			} else {
				echo "Password and confirm doesn't match!";
			}


			if ($_POST['size'] > 0) {
				if (move_uploaded_file($foto, 'images/avatar/' . $nama_foto)) {
					$arUpdate = array();
					foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
					$sql = "UPDATE member SET ".implode(',', $arUpdate)." WHERE email = ".$_POST['email']." LIMIT 1";
					$this->db->query($sql);
					echo "Sukses update";
				} else {
					echo "Gagal upload file";
				}
			} else {
				$arUpdate = array();
                foreach($data as $k=>$v) $arUpdate[] = " $k='$v'";
                $sql = "UPDATE member SET ".implode(',', $arUpdate)." WHERE email = ".$_POST['email']." LIMIT 1";
                $this->db->query($sql);
				echo "Sukses update";
			}
		}
	}

	private function _assets()
	{
		$this->add_js(site_url('assets/js/back_page.js'));
	}
}
