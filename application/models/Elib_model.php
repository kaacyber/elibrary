<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Elib_model extends CI_Model
{	
    function __construct()
    {
         $this->load->library('m_db');
    }

    function jenis_regulasi($where=array('id !='=>''),$order="jenis_regulasi ASC")
    {
		$d=$this->m_db->get_data('perpus_rules_item',$where,$order);
		return $d;
	}

	function jenis_buku($where=array('id !='=>''),$order="jenis_buku ASC")
    {
		$d=$this->m_db->get_data('perpus_reg_item',$where,$order);
		return $d;
	}

	function jenis_laporan($where=array('id !='=>''),$order="jenis_lap ASC")
    {
		$d=$this->m_db->get_data('perpus_dok_item',$where,$order);
		return $d;
	}

	public function tambahupload($detail){
		$this->db->insert('perpus_rules',$detail);
	}

	public function tambahupload_buku($detail){
		$this->db->insert('perpus_reg',$detail);
	}

	public function tambahupload_khusus($detail){
		$this->db->insert('perpus_dok',$detail);
	}


}