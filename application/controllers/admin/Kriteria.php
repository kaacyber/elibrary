<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller
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
        $meta['judul']="Kriteria Management";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('daf_kriteria',array('id !='=>''),'kriteria ASC');
        $this->load->view(akses().'/kriteria/kriteriaview',$d);
        $this->load->view('tema/footer');
    }
    
    function add()
    {
		$this->form_validation->set_rules('kriteria','Nama Kriteria','required');
		$this->form_validation->set_rules('jml_point','Jumlah Point','required');
		$this->form_validation->set_rules('min_value','Min Value','required');
		$this->form_validation->set_rules('max_value','Max value','required');
		if($this->form_validation->run()==TRUE)
		{
			
			$kriteria=$this->input->post('kriteria');
			$jml_point=$this->input->post('jml_point');
			$min_value=$this->input->post('min_value');
			$max_value=$this->input->post('max_value');
			
			$d=array(
			'kriteria'=>$kriteria,
			'jml_point'=>$jml_point,
			'min_value'=>$min_value,
			'max_value'=>$max_value,
			);
			if($this->m_db->add_row('daf_kriteria',$d)==TRUE)
			{
				$userID=$this->m_db->last_insert_id();
				
				//$this->add_manajemen($table,$userID,$username,$nama);
				set_header_message('success','Tambah Kriteria','Berhasil Tambah Kriteria');
				redirect(base_url(akses().'/kriteria'));
			}else{
				set_header_message('danger','Tambah Kriteria','Gagal Tambah Kriteria');
				redirect(base_url(akses().'/kriteria/add'));
			}			
			
		}else{
			$meta['judul']="Tambah Kriteria";
			$this->load->view('tema/header',$meta);
			$this->load->view(akses().'/kriteria/kriteriaadd');
			$this->load->view('tema/footer');
		}
	}
	
	function delete()
	{
		$id=$this->input->get('id');
		$s=array(
		'id'=>$id,
		);
		if($this->m_db->is_bof('daf_kriteria',$s)==FALSE)
		{
			$this->m_db->delete_row('daf_kriteria',$s);
			set_header_message('success','Hapus User','Berhasil Menghapus Kriteria');
			redirect(base_url(akses().'/kriteria'));
		}else{
			set_header_message('danger','Hapus User','Gagal Menghapus Kriteria');
			redirect(base_url(akses().'/kriteria'));
		}
	}
	
	private function add_manajemen($table,$userID,$username,$nama)
	{
		if(!empty($userID))
		{
			$d=array(
			'nuptk'=>$username,
			'nama'=>$nama,
			'user_id'=>$userID,
			);
			if($this->m_db->add_row($table,$d)==TRUE)
			{
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
    
}
