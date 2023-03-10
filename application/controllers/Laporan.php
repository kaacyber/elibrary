<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->library('m_db');
        if(empty(akses()))
        {
			redirect(base_url().'logout');
		}
		$this->load->model('beasiswa_model','mod_bea');
		$this->load->model('kriteria_model','mod_kriteria');
		//$this->load->model('siswa_model','mod_siswa');
    }
    
    function kelayakan()
    {
		$id=$this->input->get('id');
		$nama=$this->mod_bea->tender_info($id,'nama');
		$meta['judul']="Daftar Peserta Layak Dalam Proses Pengadaan ".$nama;
        $this->load->view('tema/cetak/header',$meta);
        //$d['data']=$this->mod_bea->beasiswa_data(array('id'=>$id));
       // $this->load->view('laporan/penerimabeasiswaview',$d);
        $d['data']=$this->mod_bea->jenis_pengadaan(array('kd_tender'=>$id));
        $this->load->view('laporan/penerimabeasiswaview',$d);
        $this->load->view('tema/cetak/footer');
	}
    
}