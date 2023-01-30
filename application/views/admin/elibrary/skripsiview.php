<link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/plugins/datatables/dataTables.bootstrap.css"/>
<script src="<?=base_url();?>konten/tema/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>konten/tema/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
});
</script>
<div>
	<a href="<?=base_url(akses().'/jenispengadaan/add');?>" class="btn btn-primary btn-flat">Tambah Data</a>
</div>

<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>Kode</th>
		<th>Nama Penulis</th>		
		<th>Instansi</th>
		<th>Judul Penelitian</th>
		<th>Tahun</th>
		<th width="100"></th>
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
				<td><?=$row->nama;?></td>
				<td><?=$row->instansi;?></td>
				<td><?=$row->jskripsi;?></td>
				<td ><?=$row->tahun;?></td>
				<td>
					<a href="<?=base_url(akses().'/users/delete');?>?id=<?=$row->id;?>" class="btn btn-xs btn-success">Lihat</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>