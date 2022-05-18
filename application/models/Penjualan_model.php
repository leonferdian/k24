<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

    public function list_penjualan($where = '')
    {
        $query = $this->db->query("SELECT a.*, b.Item, b.Qty, b.HargaSatuan, b.SubTotal FROM penjualan a left join penjualandetil b on a.NoPenjualan = b.NoPenjualan $where ORDER BY a.Tanggal DESC");
        $row = $query->result();
		return $row;
    }
}