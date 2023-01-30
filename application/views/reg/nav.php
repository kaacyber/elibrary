<?php
$menu=array(
	'Data Peserta'=>array(		
		'icon'=>'fa fa-users',
		'slug'=>'pelamar',
		'child'=>array(
				'Semua Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/pelamar",
					'target'=>"",
					),
				'Tambah Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/pelamar/add",
					'target'=>"",
					),				
			),
	),
	'Registrasi'=>array(		
		'icon'=>'fa fa-money',
		'slug'=>'beasiswa',
		'child'=>array(
				'Data Penerimaan Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/kontrak/kontrak",
					'target'=>"",
					),
				'Dftar Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/kontrak/peserta",
					'target'=>"",
					),
				'Tambah Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/kontrak/peserta/add",
					'target'=>"",
					),
			),
	),
);
?>