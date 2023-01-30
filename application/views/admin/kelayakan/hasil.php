

<div id="respon"></div>

<div id="entri" class="col-md-12">
<?php
echo validation_errors();
echo form_open('#',array('class'=>'form-horizontal','id'=>'formentri'));
$kd_tender='T2';
?>
<a href="<?=base_url('laporan/kelayakan');?>?id=<?=$kd_tender;?>" target="_blank" class="btn btn-default btn-md hidden-print"><i class="fa fa-print"></i> Cetak</a>
<div class="table-responsive">
<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>Nama</th>
		<th>Point</th>
		<th>Status</th>
		<th>N-Kontrak</th>
		
		
	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
			?>
			<tr>
				<td><?=$row->nama;?></td>
				<td><?=$row->point;?></td>
				<td><?=$row->status;?></td>
				<td><?=$row->n_kontrak;?></td>
				
				
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>
</div>
</div>

