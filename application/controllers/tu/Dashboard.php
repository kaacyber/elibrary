<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
    }
    
    function index()
    {
        $meta['judul']="Dashboard Tata Usaha";
        $this->load->view('tema/header',$meta);

        $buku="select count(IDbuku) as jml from perpus_reg";
        $d=$this->m_db->get_query_data($sql);
        foreach($d as $r)
        {
            $jml_buku.=$r->jml;
        }

        
        $ds =array('buku' => $jml_buku, );
        $this->load->view(akses().'/dashboardview',$ds);
        $this->load->view('tema/footer');
    }
    
}
