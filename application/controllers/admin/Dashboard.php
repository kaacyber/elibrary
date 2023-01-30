<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
        $meta['judul']="Dashboard Administrator";
        //$this->load->view('tema/header',$meta);


        $sql="select count(IDbuku) as jml from perpus_reg";
        $d=$this->m_db->get_query_data($sql);
        foreach($d as $r)
        {
            $jml_buku=$r->jml;
        }

        $sql="select count(id) as jml from perpus_rules";
        $d=$this->m_db->get_query_data($sql);
        foreach($d as $r)
        {
            $jml_regulasi=$r->jml;
        }

        $sql="select count(id) as jml from perpus_mhs";
        $d=$this->m_db->get_query_data($sql);
        foreach($d as $r)
        {
            $jml_penelitian=$r->jml;
        }

        $sql="select count(id) as jml from perpus_dok";
        $d=$this->m_db->get_query_data($sql);
        foreach($d as $r)
        {
            $jml_khusus=$r->jml;
        }

        $meta =array('judul' => 'Dashboard Elibrary', 
                     'buku' => $jml_buku, 
                     'regulasi' => $jml_regulasi,
                     'penelitian' => $jml_penelitian,
                     'khusus' => $jml_khusus,
        );
        $this->load->view(akses().'/dashboardview',$meta);
        //$this->load->view('tema/footer');
    }
    
}
