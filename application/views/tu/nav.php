<?php

$menu=array(
	'Penerimaan'=>array(		
		'icon'=>'fa fa-money',
		'slug'=>'beasiswa',
		'child'=>array(
				'Semua Penerimaan'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/beasiswa/beasiswa",
					'target'=>"",
					),
				'Kriteria Penerimaan'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/beasiswa/kriteria",
					'target'=>"",
					),
				'Peserta Penerimaan'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/beasiswa/peserta",
					'target'=>"",
					),				
			),
	),
	
	'Master'=>array(		
		'icon'=>'fa fa-code',
		'slug'=>'master',
		'child'=>array(
				'Data Kriteria'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/master/kriteria",
					'target'=>"",
				),
				'Tambah Kriteria Utama'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/master/kriteria/add",
					'target'=>"",
				),				
			),
	),
);
?>