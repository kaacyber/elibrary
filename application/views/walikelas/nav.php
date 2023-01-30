<?php
$menu=array(
	'Data Peserta'=>array(		
		'icon'=>'fa fa-users',
		'slug'=>'siswa',
		'child'=>array(
				'Semua Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/siswa",
					'target'=>"",
					),
				'Tambah Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/siswa/add",
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
					'url'=>base_url(akses())."/beasiswa/beasiswa",
					'target'=>"",
					),
				'Dftar Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/beasiswa/peserta",
					'target'=>"",
					),
				'Tambah Peserta'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/beasiswa/peserta/add",
					'target'=>"",
					),
			),
	),
);
?>