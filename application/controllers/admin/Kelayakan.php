<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kelayakan extends CI_Controller
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
		$this->load->model('kriteria_model','mod_kriteria');
		$this->load->model('beasiswa_model','mod_beasiswa');
    }
    
    function index()
    {        
        $meta['judul']="Hasil Perhitungan Kelayakan Peserta Pengadaan";
        $this->load->view('tema/header',$meta);
        $d['jenis']=$this->mod_beasiswa->jenis_pengadaan();
        $this->load->view(akses().'/kelayakan/kelayakancontainer',$d);
        $this->load->view('tema/footer');
    }
    
    function getdetail()
    {
    	$id=$this->input->get('beasiswa');
		$output=array();
        $dKriteria['data']=$this->m_db->get_data('temp_hasil',array('kd_tender ='=>$id),'kd_tender ASC');
		
    	$this->load->view(akses().'/kelayakan/hasil',$dKriteria);
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
				redirect(base_url(akses().'/pengadaan'));
			}else{
				set_header_message('danger','Tambah Data','Gagal Tambah Data');
				redirect(base_url(akses().'/pengadaan/pengadaanadd'));
			}			
			
		}else{
			$meta['judul']="Tambah Peserta Pengadaan";
			$this->load->view('tema/header',$meta);
			$d['jenis']=$this->mod_beasiswa->jenis_pengadaan();
			$this->load->view(akses().'/pengadaan/pengadaanadd',$d);
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
