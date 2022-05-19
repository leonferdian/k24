<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Controller 
{

	public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
        }
        $this->load->model('Penjualan_model');
	}
	
	public function index()
	{
		$data = [
			'parent_title' => '',
			'page_title' => 'Administrator'
        ];
        $this->_assets();
		$this->render($data);
	}

    public function list_member()
	{
		$data = [
			'page_title' => 'List Member',
			'parent_title' => ''
		];

		$this->_assets();
		$this->render($data, 'administrator/list_member');
	}

    public function profile_member($email = "")
	{
		$query = $this->db->query("select * from member where email = '" . $email . "'");
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
		$this->render($data, 'administrator/profile');
	}

	public function listdata($table)
    {
        $response = [];
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 100000;
        $orders = isset($_GET['order']) ? $_GET['order'] : array();
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

        $total = 0;
        $query = $this->db->query("SELECT COUNT(*) as total FROM $table a left join penjualandetil b on a.NoPenjualan = b.NoPenjualan");
        $row = $query->row();
        if (isset($row)) $total = $row->total;
        
        $total_filter = $total;
        $data = array();
        // $qs = $this->db->query("SELECT * FROM $table ORDER BY id DESC LIMIT $start, $length");
        $qs = $this->Penjualan_model->list_penjualan();
        // foreach($qs->result_array() as $row)
        $no = 1;
        foreach ($qs as $row) {
            // $status = $row['status'] ? '<span class="label label-success">active</span>' : '<span class="label label-default">disabled</span>';
            // $btn1 = '<a class="btn btn-sm btn-info" href="'.site_url('administrator/'.$table.'/edit/'.$row['id']).'">edit</a>';
            $btn2 = '<button class="btn btn-delete btn-sm btn-danger" data-url="'.site_url('administrator/del_penjualan/'.$row->NoPenjualan.'').'">delete</button>';

            $data[] = array(
                $no,
                $row->NamaPelanggan,
                $row->Tanggal,
                $row->Jam,
                $row->Total,
                $row->BayarTunai,
                $row->Kembali,
                $row->Item,
                $row->Qty,
                $row->HargaSatuan,
                $row->SubTotal,
                $btn2
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
    
    public function calculate()
    {
        $json = "";
        if (count($_POST))
        {
            $total = isset($_POST['total']) ? $_POST['total'] : 0;
            $pajak = isset($_POST['pajak']) ? $_POST['pajak'] : 0;

            $net_sales = $total - (($total * $pajak) / 100);
            $pajak_rp = ($total * $pajak) / 100;

            $arr_data = array(
                'net_sales' => $net_sales,
                'pajak_rp' => $pajak_rp
            );

            $json = json_encode($arr_data);
        }
        print_r($json);
    }

    public function multidiscount()
    {
        $json = "";
        if (count($_POST))
        {
            $total_harga = isset($_POST['total_harga']) ? $_POST['total_harga'] : 0;
            $json_diskon = isset($_POST['json_diskon']) ? $_POST['json_diskon'] : 0;

            $data = json_decode($json_diskon);
            $arr_data = [];
            // print_r($data->{'discounts'});
            $discount = $data->{'discounts'};
            $num = 0;
            foreach ($discount as $k => $row) {
                // echo $row->diskon;
                $num++;
                $total_diskon = ($total_harga * $row->diskon) / 100;
                $total_harga_setelah_diskon = $total_harga - $total_diskon;

                if ($num > 1) {
                    $total_diskon = ($total_harga_setelah_diskon * $row->diskon) / 100;
                    $total_harga_setelah_diskon = $total_harga_setelah_diskon - $total_diskon;
                }

                $arr_data[] = array(
                    'total_diskon' => $total_diskon,
                    'total_harga_setelah_diskon' => $total_harga_setelah_diskon
                );
            }

            $json = json_encode($arr_data);
        }
        print_r($json);
    }

    public function markup()
    {
        $json = "";
        if (count($_POST))
        {
            $total_harga = isset($_POST['total_harga']) ? $_POST['total_harga'] : 0;
            $markup_persen = isset($_POST['markup_persen']) ? $_POST['markup_persen'] : 0;
            $share_persen = isset($_POST['share_persen']) ? $_POST['share_persen'] : 0;

            $subtotal = $total_harga + (($total_harga * $markup_persen)/100);
            $share_untuk_ojol = ($subtotal * $share_persen) / 100;
            $net_untuk_resto = $subtotal - $share_untuk_ojol;

            $arr_data[] = array(
                'net_untuk_resto' => $net_untuk_resto,
                'share_untuk_ojol' => $share_untuk_ojol
            );

            $json = json_encode($arr_data);
        }
        print_r($json);
    }

    public function del_penjualan($id)
    {
        $sql = "delete from penjualan where NoPenjualan = ".$_POST['NoPenjualan']."";
        $this->db->query($sql);
    }

	public function upload_penjualan()
    {
        
        $NoPenjualan = $this->code_maker(100);

        $file = isset($_POST['input_json']) ? trim($_POST['input_json']) : '';

        $row = json_decode($file);
        $DetilPenjualan = $row->{'DetilPenjualan'};
        
            $data = array(
                'NoPenjualan' => $NoPenjualan,
                'NamaPelanggan' => $row->{'NamaPelanggan'},
                'Tanggal' => $row->{'Tanggal'},
                'Jam' => $row->{'Jam'},
                'Total' => $row->{'Total'},
                'BayarTunai' => $row->{'BayarTunai'},
                'Kembali' => $row->{'Kembali'}
            );

        $check_conn = $this->db->query("select * from penjualan a left join penjualandetil b on a.NoPenjualan = b.NoPenjualan");

        if ($check_conn) {
            $sql = "INSERT INTO penjualan (".implode(',', array_keys($data)).") VALUES ('".implode("','", array_values($data))."')";
            $stmt = $this->db->query($sql);

            foreach ($DetilPenjualan as $k => $row) {
                $Item = $row->{'Item'};
                $Qty = $row->{'Qty'};
                $HargaSatuan = $row->{'HargaSatuan'};
                $SubTotal = $row->{'SubTotal'};
                $sql_detil = "INSERT INTO penjualandetil (NoPenjualan, Item, Qty, HargaSatuan, SubTotal) VALUES ('$NoPenjualan', '$Item', '$Qty','$HargaSatuan','$SubTotal')";
                $stmt2 = $this->db->query($sql_detil);
            }
        }

        if ($stmt && $stmt2) {
             // $this->session->set_flashdata('success', 'Data berhasil diupload');
            echo "Data berhasil disimpan";
        }
        
        redirect('soal1');
    }

    private function code_maker($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
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
        $this->add_js(site_url('assets/javascripts/ui-elements/examples.notifications.js'));
        $this->add_css(site_url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css'));
        $this->add_js(site_url('assets/vendor/jquery-autosize/jquery.autosize.js'));
        $this->add_js(site_url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js'));
    }
}
