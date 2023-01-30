<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Elibrary extends CI_Controller
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
		$this->load->model('elib_model','mod_elib');
    }
    
    function index()
    {
        $meta['judul']="User Management";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('pengguna',array('akses !='=>'xx'),'nama ASC');


        $buku="select count(IDbuku) as jml from perpus_reg";
        $d=$this->m_db->get_query_data($sql);
        foreach($d as $r)
		{
			$jml_buku.=$r->jml;
		}

        $this->load->view(akses().'/user/userview',$d);
        $this->load->view('tema/footer');
    }

    function load_buku()
    {
    	$meta['judul']="Data Buku";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_reg',array('idbuku !='=>'XX'),'idbuku DESC');
        $this->load->view(akses().'/elibrary/bukuview',$d);
        $this->load->view('tema/footer');
    }

    function view_jenisbuku()
    {
    	$meta['judul']="Data Jenis Buku";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_reg_item',array('id !='=>'XX'),'id DESC');
        $this->load->view(akses().'/elibrary/view_jenisbuku',$d);
        $this->load->view('tema/footer');
    }

    function load_regulasi()
    {
    	$meta['judul']="Data Regulasi";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_rules',array('id !='=>'XX'),'id DESC');
        $this->load->view(akses().'/elibrary/regulasiview',$d);
        $this->load->view('tema/footer');
    }

    function view_jenisregulasi()
    {
    	$meta['judul']="Data Jenis Regulasi";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_rules_item',array('id !='=>'XX'),'id DESC');
        $this->load->view(akses().'/elibrary/view_jenisregulasi',$d);
        $this->load->view('tema/footer');
    }

    function load_penelitian()
    {
    	$meta['judul']="Data Penelitian / Skripsi";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_mhs',array('id !='=>'XX'),'jskripsi ASC');
        $this->load->view(akses().'/elibrary/skripsiview',$d);
        $this->load->view('tema/footer');
    }

    function load_khusus()
    {
    	$meta['judul']="Data Laporan Khusus";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_dok',array('id !='=>'XX'),'id DESC');
        $this->load->view(akses().'/elibrary/khususview',$d);
        $this->load->view('tema/footer');
    }

    function view_jenislap()
    {
    	$meta['judul']="Data Jenis Laporan Khusus";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->m_db->get_data('perpus_dok_item',array('id !='=>'XX'),'id DESC');
        $this->load->view(akses().'/elibrary/view_jenislap',$d);
        $this->load->view('tema/footer');
    }

    function files_pdf()
	{
		//$meta['judul']="Data Laporan Khusus";
        //$this->load->view('tema/header',$meta);

		$id['nama_file'] = $this->input->get('namadok');
		$this->load->view('tema/pdf/view_files',$id);
		//$this->load->view('tema/footer');
	}


	function files_pdf_lap()
	{
		//$meta['judul']="Data Laporan Khusus";
        //$this->load->view('tema/header',$meta);

		$id['nama_file'] = $this->input->get('file');
		$this->load->view('tema/pdf/view_files_lap',$id);
		//$this->load->view('tema/footer');
	}

	function addregulasi()
    {
		$this->form_validation->set_rules('jenis','Jenis Dokumen','required');
		$this->form_validation->set_rules('judul','Judul Regulasi','required');
		$this->form_validation->set_rules('ket','Keterangan','required');
		$this->form_validation->set_rules('visible','Visibility','required');

		
		if($this->form_validation->run()==TRUE)
		{
			$jenis=$this->input->post('jenis');
			$namadok=$this->input->post('namadok');
			$ket=$this->input->post('ket');
			$visible=$this->input->post('visible');
			$tanggal=$this->input->post('tanggal');
			$uploadby=$this->input->post('uploadby');
			$judul=$this->input->post('judul');

			$nmfile = "file_".time();
			$config['upload_path']          = './files_upload/regulasi/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 0;
			$config['file_name']			= $nmfile;

			date_default_timezone_set('UTC');
			$tstamp = strval(time()-strtotime('1970‐01‐01 00:00:00'));

			$this->load->library('upload',$config);

			if (! $this->upload->do_upload('namadok'))
			{
				$meta['judul']="Tambah Data Regulasi";
				$this->load->view('tema/header',$meta);
				$d['jenis']=$this->mod_elib->jenis_regulasi();
				$d['error']=$this->upload->display_errors();
				$this->load->view(akses().'/elibrary/addregulasi',$d);
				$this->load->view('tema/footer');
			
			} else
			{
				$data = array('upload_data' => $this->upload->data());

				$tampil = $this->upload->data();

				$detail=array(
					'jenis'=>$jenis,
					'namadok'=>$tampil['file_name'],
					'ket'=>$ket,
					'visible'=>$visible,
					'tanggal'=>date("Y-m-d"),
					'uploadby'=>user_info('username'),
					'judul'=>$judul,
					);
				if (empty($detail)){
					$nilai = "0";
				} else {
					$nilai = "1";
					$data1 = $this->mod_elib->tambahupload($detail);
				}

				set_header_message('success','Tambah Data Regulasi','Berhasil Tambah Regulasi');
				redirect(base_url(akses().'/elibrary/load_regulasi'));
			}

			
		}else{
			$meta['judul']="Tambah Data Regulasi";
			$this->load->view('tema/header',$meta);
			$d['jenis']=$this->mod_elib->jenis_regulasi();
			$d['error']='';
			$this->load->view(akses().'/elibrary/addregulasi',$d);
			$this->load->view('tema/footer');
		}
	}

	function addbuku()
    {
		$this->form_validation->set_rules('jenis_buku','Jenis Buku','required');
		$this->form_validation->set_rules('nobuku','Nomor Buku','required');
		$this->form_validation->set_rules('jbuku','Judul Buku','required');
		$this->form_validation->set_rules('jml','Jumlah Buku','required');
		$this->form_validation->set_rules('ket','Keterangan','required');
		$this->form_validation->set_rules('pengarang','Pengarang','required');

		
		if($this->form_validation->run()==TRUE)
		{
			$jenis_buku=$this->input->post('jenis_buku');
			$nobuku=$this->input->post('nobuku');
			$jbuku=$this->input->post('jbuku');
			$jml=$this->input->post('jml');
			$ket=$this->input->post('ket');
			$pengarang=$this->input->post('pengarang');
			$regtime=$this->input->post('regtime');
			$userid=$this->input->post('userid');

			$nmfile = "file_".time();
			$config['upload_path']          = './files_upload/buku/';
			$config['allowed_types']        = 'pdf|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['file_name']			= $nmfile;

			date_default_timezone_set('UTC');
			$tstamp = strval(time()-strtotime('1970‐01‐01 00:00:00'));

			$this->load->library('upload',$config);

			if (! $this->upload->do_upload('cover'))
			{
				$meta['judul']="Tambah Data Buku";
				$this->load->view('tema/header',$meta);
				$d['jenis']=$this->mod_elib->jenis_buku();
				$d['error']=$this->upload->display_errors();
				$this->load->view(akses().'/elibrary/addbuku',$d);
				$this->load->view('tema/footer');
			
			} else
			{
				$data = array('upload_data' => $this->upload->data());

				$tampil = $this->upload->data();

				if ($tampil['file_name'] != ''){
					$cover = $tampil['file_name'];
				} else {
					$cover = 'default.jpg';
				}

				$detail=array(
					'jenis_buku'=>$jenis_buku,
					'nobuku'=>$nobuku,
					'jbuku'=>$jbuku,
					'jml'=>$jml,
					'ket'=>$ket,
					'cover'=>$tampil['file_name'],
					'pengarang'=>$pengarang,
					'regtime'=>date("Y-m-d"),
					'userid'=>user_info('username'),
					);
				if (empty($detail)){
					$nilai = "0";
				} else {
					$nilai = "1";
					$data1 = $this->mod_elib->tambahupload_buku($detail);
				}

				set_header_message('success','Tambah Data Regulasi','Berhasil Tambah Buku');
				redirect(base_url(akses().'/elibrary/load_buku'));
			}

			
		}else{
			$meta['judul']="Tambah Data Buku";
			$this->load->view('tema/header',$meta);
			$d['jenis']=$this->mod_elib->jenis_buku();
			$d['error']='';
			$this->load->view(akses().'/elibrary/addbuku',$d);
			$this->load->view('tema/footer');
		}
	}

	function addkhusus()
    {
		$this->form_validation->set_rules('jenis','Jenis Dokumen','required');
		$this->form_validation->set_rules('judul','Judul Regulasi','required');
		$this->form_validation->set_rules('ket','Keterangan','required');
		$this->form_validation->set_rules('visible','Visibility','required');

		
		if($this->form_validation->run()==TRUE)
		{
			$jenis=$this->input->post('jenis');
			$file=$this->input->post('file');
			$ket=$this->input->post('ket');
			$visible=$this->input->post('visible');
			$judul=$this->input->post('judul');

			$nmfile = "file_".time();
			$config['upload_path']          = './files_upload/lapkhusus/';
			$config['allowed_types']        = 'pdf|doc|docx|xls|xlsx';
			$config['max_size']             = 0;
			$config['file_name']			= $nmfile;

			date_default_timezone_set('UTC');
			$tstamp = strval(time()-strtotime('1970‐01‐01 00:00:00'));

			$this->load->library('upload',$config);

			if (! $this->upload->do_upload('file'))
			{
				$meta['judul']="Tambah Data Laporan";
				$this->load->view('tema/header',$meta);
				$d['jenis']=$this->mod_elib->jenis_laporan();
				$d['error']=$this->upload->display_errors();
				$this->load->view(akses().'/elibrary/addkhusus',$d);
				$this->load->view('tema/footer');
			
			} else
			{
				$data = array('upload_data' => $this->upload->data());

				$tampil = $this->upload->data();

				$detail=array(
					'jenis'=>$jenis,
					'file'=>$tampil['file_name'],
					'judul'=>$judul,
					'ket'=>$ket,
					'visible'=>$visible,
					'tgl'=>date("Y-m-d"),
					'user'=>user_info('username'),
					
					);
				if (empty($detail)){
					$nilai = "0";
				} else {
					$nilai = "1";
					$data1 = $this->mod_elib->tambahupload_khusus($detail);
				}

				set_header_message('success','Tambah Data Regulasi','Berhasil Tambah Laporan');
				redirect(base_url(akses().'/elibrary/load_khusus'));
			}

			
		}else{
			$meta['judul']="Tambah Data Laporan Khusus";
			$this->load->view('tema/header',$meta);
			$d['jenis']=$this->mod_elib->jenis_laporan();
			$d['error']='';
			$this->load->view(akses().'/elibrary/addkhusus',$d);
			$this->load->view('tema/footer');
		}
	}

	function addregulasi1()
    {
		$this->form_validation->set_rules('jenis','Jenis Dokumen','required');
		$this->form_validation->set_rules('judul','Judul Regulasi','required');
		$this->form_validation->set_rules('ket','Keterangan','required');
		$this->form_validation->set_rules('visible','Visibility','required');
		$this->form_validation->set_rules('tanggal','Tanggal Entry','required');
		$this->form_validation->set_rules('uploadby','Upload By User','required');
		
		if($this->form_validation->run()==TRUE)
		{
			$jenis=$this->input->post('jenis');
			$namadok=$this->input->post('namadok');
			$ket=$this->input->post('ket');
			$visible=$this->input->post('visible');
			$tanggal=$this->input->post('tanggal');
			$uploadby=$this->input->post('uploadby');
			$judul=$this->input->post('judul');
			
			$d=array(
			'jenis'=>$jenis,
			'namadok'=>$namadok,
			'ket'=>$ket,
			'visible'=>$visible,
			'tanggal'=>$tanggal,
			'uploadby'=>$uploadby,
			'judul'=>$judul,
			);
			if($this->m_db->add_row('perpus_rules',$d)==TRUE)
			{
				$userID=$this->m_db->last_insert_id();
				
				//$this->add_manajemen($table,$userID,$username,$nama);
				set_header_message('success','Tambah Data Regulasi','Berhasil Tambah User');
				redirect(base_url(akses().'/elibrary/load_regulasi'));
			}else{
				set_header_message('danger','Tambah Data Regulasi','Gagal Tambah User');
				redirect(base_url(akses().'/elibrary/addregulasi'));
			}			
			
		}else{
			$meta['judul']="Tambah Data Regulasi";
			$this->load->view('tema/header',$meta);
			$d['jenis']=$this->mod_elib->jenis_regulasi();
			$this->load->view(akses().'/elibrary/addregulasi',$d);
			$this->load->view('tema/footer');
		}
	}

	function deleteregulasi()
	{
		$id=$this->input->get('id');
		$namadok=$this->input->get('namadok');
		$s=array(
		'id'=>$id,
		);
		if (file_exists("./files_upload/regulasi/".$namadok )) unlink("./files_upload/regulasi/".$namadok );
		
		if($this->m_db->is_bof('perpus_rules',$s)==FALSE)
		{
			$this->m_db->delete_row('perpus_rules',$s);

			
			
			set_header_message('success','Hapus Regulasi','Berhasil Menghapus Data Regulasi');
			redirect(base_url(akses().'/elibrary/load_regulasi'));
		}else{
			set_header_message('danger','Hapus Regulasi','Gagal Menghapus Data Regulasi');
			redirect(base_url(akses().'/elibrary/load_regulasi'));
		}
	}


	function deletebuku()
	{
		$id=$this->input->get('idbuku');
		$cover=$this->input->get('cover');
		$s=array(
		'idbuku'=>$id,
		);
		if (file_exists("./files_upload/buku/".$cover )) unlink("./files_upload/buku/".$cover );
		
		if($this->m_db->is_bof('perpus_reg',$s)==FALSE)
		{
			$this->m_db->delete_row('perpus_reg',$s);

			
			
			set_header_message('success','Hapus Buku','Berhasil Menghapus Data buku');
			redirect(base_url(akses().'/elibrary/load_buku'));
		}else{
			set_header_message('danger','Hapus Buku','Gagal Menghapus Data Buku');
			redirect(base_url(akses().'/elibrary/load_buku'));
		}
	}

	function deletekhusus()
	{
		$id=$this->input->get('id');
		$file=$this->input->get('file');
		$s=array(
		'id'=>$id,
		);
		if (file_exists("./files_upload/lapkhusus/".$cover )) unlink("./files_upload/lapkhusus/".$file );
		
		if($this->m_db->is_bof('perpus_dok',$s)==FALSE)
		{
			$this->m_db->delete_row('perpus_dok',$s);

			
			
			set_header_message('success','Hapus Laporan','Berhasil Menghapus Data Laporan');
			redirect(base_url(akses().'/elibrary/load_khusus'));
		}else{
			set_header_message('danger','Hapus Laporan','Gagal Menghapus Data Laporan');
			redirect(base_url(akses().'/elibrary/load_khusus'));
		}
	}
	
    
    function add()
    {
		$this->form_validation->set_rules('nama','Nama User','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password User','required');
		$this->form_validation->set_rules('akses','Akses User','required');
		if($this->form_validation->run()==TRUE)
		{
			$nama=$this->input->post('nama');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$akses=$this->input->post('akses');
			
			$d=array(
			'username'=>$username,
			'nama'=>$nama,
			'password'=>md5($password),
			'akses'=>$akses,
			);
			if($this->m_db->add_row('pengguna',$d)==TRUE)
			{
				$userID=$this->m_db->last_insert_id();
				
				//$this->add_manajemen($table,$userID,$username,$nama);
				set_header_message('success','Tambah User','Berhasil Tambah User');
				redirect(base_url(akses().'/users'));
			}else{
				set_header_message('danger','Tambah User','Gagal Tambah User');
				redirect(base_url(akses().'/users/add'));
			}			
			
		}else{
			$meta['judul']="Tambah User";
			$this->load->view('tema/header',$meta);
			$this->load->view(akses().'/user/useradd');
			$this->load->view('tema/footer');
		}
	}
	
	function delete()
	{
		$id=$this->input->get('id');
		$s=array(
		'user_id'=>$id,
		);
		if($this->m_db->is_bof('pengguna',$s)==FALSE)
		{
			$this->m_db->delete_row('pengguna',$s);
			$this->m_db->delete_row('tata_usaha',$s);
			$this->m_db->delete_row('waka_siswa',$s);
			$this->m_db->delete_row('user_reg',$s);
			set_header_message('success','Hapus User','Berhasil Menghapus User');
			redirect(base_url(akses().'/users'));
		}else{
			set_header_message('danger','Hapus User','Gagal Menghapus User');
			redirect(base_url(akses().'/users'));
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
