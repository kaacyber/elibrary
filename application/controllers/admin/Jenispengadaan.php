<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenispengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->library('m_db');
        if(akses()!="admin")
        {
			redirect(base_url().'logout');
		}
    }
    
    function index()
    {
        $meta['judul']="Jenis Pengadaan";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('tender',array('kd_tender !='=>''),'nama ASC');
        $this->load->view(akses().'/jenispengadaan/jenisview',$d);
        $this->load->view('tema/footer');
    }
    
    function add()
    {
		$this->form_validation->set_rules('kd_tender','Kode Jenis','required');
		$this->form_validation->set_rules('nama','Jenis Pengadaan','required');
		if($this->form_validation->run()==TRUE)
		{
			$kd_tender=$this->input->post('kd_tender');
			$nama=$this->input->post('nama');
			
			
			$d=array(
			'kd_tender'=>$kd_tender,
			'nama'=>$nama,
			
			);
			if($this->m_db->add_row('tender',$d)==TRUE)
			{
				$userID=$this->m_db->last_insert_id();
				
				//$this->add_manajemen($table,$userID,$username,$nama);
				set_header_message('success','Tambah Data','Berhasil Tambah Data');
				redirect(base_url(akses().'/jenispengadaan'));
			}else{
				set_header_message('danger','Tambah Data','Gagal Tambah Data');
				redirect(base_url(akses().'/jenispengadaan/add'));
			}			
			
		}else{
			$meta['judul']="Tambah Jenis Pengadaan";
			$this->load->view('tema/header',$meta);
			$this->load->view(akses().'/jenispengadaan/jenisadd');
			$this->load->view('tema/footer');
		}
	}
	
	function delete()
	{
		$id=$this->input->get('id');
		$s=array(
		'kd_tender'=>$id,
		);
		if($this->m_db->is_bof('tender',$s)==FALSE)
		{
			$this->m_db->delete_row('tender',$s);
			
			set_header_message('success','Hapus User','Berhasil Menghapus User');
			redirect(base_url(akses().'/jenispengadaan'));
		}else{
			set_header_message('danger','Hapus User','Gagal Menghapus User');
			redirect(base_url(akses().'/jenispengadaan'));
		}
	}
	
	
    
}
