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
	<a href="<?=base_url(akses().'/pelamar/add');?>" class="btn btn-primary btn-md">Tambah Peserta</a>
</div>
<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>KTP</th>
		<th>Nama</th>
		<th>pendidikan</th>
		<th></th>
	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
				$id=$row->pelamar_id;
			?>
			<tr>
				<td><?=$row->nisn;?></td>				
				<td><?=$row->nama;?></td>				
				<td><?=$row->pendidikan;?></td>
				<td>
					<a href="<?=base_url(akses().'/pelamar/edit');?>?id=<?=$id;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
					<a onclick="return confirm('Yakin ingin menghapus pelamar ini?');" href="<?=base_url(akses().'/pelamar/delete');?>?id=<?=$id;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>