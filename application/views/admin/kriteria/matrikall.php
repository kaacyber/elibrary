

<div id="respon"></div>

<div id="entri" class="col-md-12">
<?php
echo validation_errors();
echo form_open('#',array('class'=>'form-horizontal','id'=>'formentri'));
?>

<div class="table-responsive">
<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>ID</th>
		<th>Kode</th>
		<th>Jumlah Item</th>
		<th>X Min</th>
		<th>X Max</th>
		<th>Jarak Sebaran</th>
		<th>Mean Teoritis</th>
		<th>Standar Deviasi</th>
		<th>Z min</th>
		<th>P Min</th>
		<th>Z Max</th>
		<th>P Max</th>
		<th>Range Tidak Layak</th>
		<th>Rang Layak</th>
		<th>Jumlah Sangat Layak</th>
		
	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
			?>
			<tr>
				<td><?=$row->id;?></td>
				<td><?=$row->kode;?></td>
				<td><?=$row->jml_item;?></td>
				<td><?=$row->x_min;?></td>
				<td><?=$row->x_max;?></td>
				<td><?=$row->jarak_sebaran;?></td>
				<td><?=$row->mean_teoritis;?></td>
				<td><?=$row->std_deviasi;?></td>
				<td><?=$row->z_min;?></td>
				<td><?=$row->p_min;?></td>
				<td><?=$row->z_max;?></td>
				<td><?=$row->p_max;?></td>
				<td><?=$row->rtl1;?>-<?=$row->rtl2;?></td>
				<td><?=$row->rl1;?>-<?=$row->rl2;?></td>
				<td><?=$row->rsl1;?>-<?=$row->rsl2;?></td>
				
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>
</div>
</div>

