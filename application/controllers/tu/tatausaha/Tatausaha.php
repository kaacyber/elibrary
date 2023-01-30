<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tatausaha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->library('m_db');
        if(akses()!="tu")
        {
			redirect(base_url().'logout');
		}
		$this->load->model('Beasiswa_model','mod_bea');
		$this->load->model('kriteria_model','mod_kriteria');
    }
    
    function index()
    {
        $meta['judul']="Semua Penerimaan";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->mod_bea->beasiswa_data();
        $this->load->view(akses().'/beasiswa/beasiswa/beasiswaview',$d);
        $this->load->view('tema/footer');
    }
    
    function add()
    {
		$this->form_validation->set_rules('judul','Judul Penerimaan','required');
		$this->form_validation->set_rules('keterangan','Keterangan Penerimaan','required');
		$this->form_validation->set_rules('tahun','Tahun Penerimaan','required');
		$this->form_validation->set_rules('kuota','Kuota Penerimaan','required');
		if($this->form_validation->run()==TRUE)
		{
			$judul=$this->input->post('judul');
			$ket=$this->input->post('keterangan');
			$tahun=$this->input->post('tahun');
			$kuota=$this->input->post('kuota');
			
			if($this->mod_bea->beasiswa_add($judul,$ket,$tahun,$kuota)==TRUE)
			{
				set_header_message('success','Tambah Penerimaan','Berhasil menambah Penerimaan');
				redirect(base_url(akses()).'/tatausaha/tatausaha');
			}else{
				set_header_message('danger','Tambah Penerimaan','Gagal menambah Penerimaan');
				redirect(base_url(akses()).'/tatausaha/tatausaha/add');
			}
		}else{
			$meta['judul']="Tambah Penerimaan";
	        $this->load->view('tema/header',$meta);
	        $this->load->view(akses().'/beasiswa/beasiswa/beasiswaadd');
	        $this->load->view('tema/footer');
		}
	}
        
	function edit()
    {
		$this->form_validation->set_rules('beasiswaid','ID Penerimaan','required');
		$this->form_validation->set_rules('judul','Judul Penerimaan','required');
		$this->form_validation->set_rules('keterangan','Keterangan Penerimaan','required');
		$this->form_validation->set_rules('tahun','Tahun Penerimaan','required');
		$this->form_validation->set_rules('kuota','Kuota Penerimaan','required');
		if($this->form_validation->run()==TRUE)
		{
			$beasiswaid=$this->input->post('beasiswaid');
			$judul=$this->input->post('judul');
			$ket=$this->input->post('keterangan');
			$tahun=$this->input->post('tahun');
			$kuota=$this->input->post('kuota');
			
			if($this->mod_bea->beasiswa_edit($beasiswaid,$judul,$ket,$tahun,$kuota)==TRUE)
			{
				set_header_message('success','Ubah Penerimaan','Berhasil mengubah Penerimaan');
				redirect(base_url(akses()).'/beasiswa/beasiswa');
			}else{
				set_header_message('danger','Ubah Penerimaan','Gagal mengubah Penerimaan');
				redirect(base_url(akses()).'/beasiswa/beasiswa');
			}
		}else{
			$id=$this->input->get('id');
			$meta['judul']="Ubah Penerimaan";
	        $this->load->view('tema/header',$meta);
	        $d['data']=$this->mod_bea->beasiswa_data(array('beasiswa_id'=>$id));
	        $this->load->view(akses().'/beasiswa/beasiswa/beasiswaedit',$d);
	        $this->load->view('tema/footer');
		}
	}
	
	function delete()
	{
		$id=$this->input->get('id');
		if($this->mod_bea->beasiswa_delete($id)==TRUE)
		{
			set_header_message('success','Hapus Penerimaan','Berhasil menghapus Penerimaan');
			redirect(base_url(akses()).'/tatausaha/tatausaha');
		}else{
			set_header_message('danger','Hapus Penerimaan','Gagal menghapus Penerimaan');
			redirect(base_url(akses()).'/tatausaha/tatausaha');
		}
	}
	
	function proses()
	{
		$id=$this->input->get('id');
		$nama=$this->mod_bea->beasiswa_info($id,'judul');
		$meta['judul']="Daftar Penerima Beasiswa ".$nama;
        $this->load->view('tema/header',$meta);
        $d['data']=$this->mod_bea->beasiswa_data(array('beasiswa_id'=>$id));
        $this->load->view(akses().'/beasiswa/beasiswa/prosesview',$d);
        $this->load->view('tema/footer');
	}
	
	function proseshitung()
	{
		$id=$this->input->get('id');
		$this->mod_bea->proseshitung($id);		
		if($this->mod_bea->proseshitung($id)==TRUE)
		{
			//set_header_message('success','Proses Beasiswa','Beasiswa telah diproses');
			//redirect(base_url(akses().'/beasiswa/beasiswa').'?id='.$id);
			echo json_encode(array('status'=>'ok'));
		}else{
			//set_header_message('danger','Proses Beasiswa','Beasiswa gagal diproses');
			//redirect(base_url(akses().'/beasiswa/beasiswa'));
			echo json_encode(array('status'=>'no'));
		}		
	}
    
}
