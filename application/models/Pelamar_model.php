<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pelamar_model extends CI_Model
{
	private $tb_pelamar='pelamar';
    function __construct()
    {
         $this->load->library('m_db');
    }
    
    function pelamar_data($where=array(),$order="nama ASC")
    {
		$d=$this->m_db->get_data($this->tb_pelamar,$where,$order);
		return $d;
	}
	
	function pelamar_info($pelamarID,$output)
	{
		$s=array(
		'pelamar_id'=>$pelamarID,
		);
		$item=$this->m_db->get_row($this->tb_pelamar,$s,$output);
		return $item;
	}
	
	function pelamar_add($nisn,$nama,$pendidikan,$jk,$wali,$tmp_lahir,$tgl,$alamat,$nuptk)
	{
		$s=array(
		'nisn'=>$nisn,
		);
		if($this->m_db->is_bof($this->tb_pelamar,$s)==TRUE)
		{
			if($this->m_db->is_bof('pengguna',array('username'=>$nisn))==TRUE)
			{
				
			
			$dUser=array(
			'nama'=>$nama,
			'username'=>$nisn,
			'password'=>md5($nisn),
			'akses'=>'pelamar',
			);
			if($this->m_db->add_row('pengguna',$dUser)==TRUE)
			{
				$user_id=$this->m_db->last_insert_id();
				$d=array(
				'nisn'=>$nisn,
				'nama'=>$nama,
				//'kelas'=>$kelas,
				'alamat'=>$alamat,
				'pendidikan'=>$pendidikan,
				'jenkel'=>$jk,
				//'tahun'=>$tahun,
				'walikelas_id'=>$wali,
				'user_id'=>$user_id,
				'tempat_lahir'=>$tmp_lahir,
				'tgl_lahir'=>$tgl,
				'nuptk'=>$nuptk,
				//'anak_ke'=>$anak_ke,
				//'saudara'=>$saudara,
				//'nama_ayah'=>$nama_ayah,
				//'pekerjaan_ayah'=>$kerja_ayah,
				//'nama_ibu'=>$nama_ibu,
				//'pekerjaan_ibu'=>$kerja_ibu,
				);
				if($this->m_db->add_row($this->tb_pelamar,$d)==TRUE)
				{
					return true;
				}else{
					$this->m_db->delete_row('pengguna',array('user_id'=>$user_id));
					return false;
				}
			}else{
				return false;
			}
			
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function pelamar_edit($pelamarID,$nisn,$nama,$kelas,$jurusan,$semester,$jk,$tahun,$wali_kelas,$tmp_lahir,$tgl_lahir,$alamat='',$anak_ke='',$saudara='',$nama_ayah='',$kerja_ayah='',$nama_ibu='',$kerja_ibu='')
	{
		$s=array(
		'nisn'=>$nisn,
		);
		$spelamar=array(
		'pelamar_id'=>$pelamarID,
		);
		$c=$this->m_db->count_data($this->tb_pelamar,$s);
		if($c < 2)
		{
			if($this->m_db->is_bof('pelamar',$spelamar)==FALSE)
			{
				
			$userID=$this->m_db->get_row('pelamar',$spelamar,'user_id');
			if($this->m_db->is_bof('pengguna',array('username'=>$nisn))==FALSE)
			{
				
			
			$dUser=array(
			'nama'=>$nama,
			'username'=>$nisn,
			'akses'=>'pelamar',
			);
			$sUser=array(
			'user_id'=>$userID,
			);
			if($this->m_db->edit_row('pengguna',$dUser,$sUser)==TRUE)
			{				
				$d=array(
				'nisn'=>$nisn,
				'nama'=>$nama,
				'kelas'=>$kelas,
				'jurusan'=>$jurusan,
				'semester'=>$semester,
				'jenkel'=>$jk,
				'tahun'=>$tahun,
				'walikelas_id'=>$wali_kelas,
				'tempat_lahir'=>$tmp_lahir,
				'tgl_lahir'=>$tgl_lahir,
				'alamat'=>$alamat,
				'anak_ke'=>$anak_ke,
				'saudara'=>$saudara,
				'nama_ayah'=>$nama_ayah,
				'pekerjaan_ayah'=>$kerja_ayah,
				'nama_ibu'=>$nama_ibu,
				'pekerjaan_ibu'=>$kerja_ibu,
				);
				if($this->m_db->edit_row($this->tb_pelamar,$d,$spelamar)==TRUE)
				{
					return true;
				}else{					
					return false;
				}
			}else{
				return false;
			}
			
			}else{
				return false;
			}
			
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function pelamar_edit_pelamar($pelamarID,$nisn,$nama,$jk,$tahun,$tmp_lahir,$tgl_lahir,$alamat='',$anak_ke='',$saudara='',$nama_ayah='',$kerja_ayah='',$nama_ibu='',$kerja_ibu='')
	{		
		$spelamar=array(
		'pelamar_id'=>$pelamarID,
		);
					
		$d=array(
		'nisn'=>$nisn,
		'nama'=>$nama,
		'jenkel'=>$jk,
		'tahun'=>$tahun,
		'tempat_lahir'=>$tmp_lahir,
		'tgl_lahir'=>$tgl_lahir,
		'alamat'=>$alamat,
		'anak_ke'=>$anak_ke,
		'saudara'=>$saudara,
		'nama_ayah'=>$nama_ayah,
		'pekerjaan_ayah'=>$kerja_ayah,
		'nama_ibu'=>$nama_ibu,
		'pekerjaan_ibu'=>$kerja_ibu,
		);
		if($this->m_db->edit_row($this->tb_pelamar,$d,$spelamar)==TRUE)
		{
			return true;
		}else{					
			return false;
		}
	}
	
	function pelamar_delete($pelamarID,$nuptk)
	{
		$s=array(
        'nuptk'=>$nuptk,
        //'jurusan'=>$jurusan,
        //'walikelas_id'=>$wali,
        'pelamar_id'=>$pelamarID,
        );
        $userid=$this->m_db->get_row('pelamar',$s,'user_id');
        if($this->m_db->delete_row('pelamar',$s)==TRUE)
        {
        	$this->m_db->delete_row('pengguna',array('user_id'=>$userid));
			return true;
		}else{
			return false;
		}
	}
}