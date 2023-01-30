<?php
$menu=array(
	'Regulasi'=>array(		
		'icon'=>'fa fa-users',
		'slug'=>'user',
		'child'=>array(
				'Data Regulasi'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/load_regulasi",
					'target'=>"",
					),
			),
	),

	'Buku'=>array(		
		'icon'=>'fa fa-book',
		'slug'=>'user',
		'child'=>array(
				'Data Buku'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/load_buku",
					'target'=>"",
					),
			),
	),

	'Penelitian'=>array(		
		'icon'=>'fa fa-hourglass-half',
		'slug'=>'user',
		'child'=>array(
				'Data Penelitian'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/load_penelitian",
					'target'=>"",
					),			
			),
	),

	'Laporan Khusus'=>array(		
		'icon'=>'fa fa-pie-chart',
		'slug'=>'user',
		'child'=>array(	
				'Data laporan Khusus'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/load_khusus",
					'target'=>"",
					),		
			),
	),

	'Setting'=>array(		
		'icon'=>'fa fa-gears',
		'slug'=>'user',
		'child'=>array(	
				'Add Jenis Regulasi'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/view_jenisregulasi",
					'target'=>"",
					),	
				'Add Jenis Buku'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/view_jenisbuku",
					'target'=>"",
					),	
				'Add Jenis Laporan'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/elibrary/view_jenislap",
					'target'=>"",
					),
				'Konfigurasi User'=>array(
					'icon'=>'fa fa-circle-o',
					'url'=>base_url(akses())."/users",
					'target'=>"",
					),		
			),
	),
	
	
);
?>