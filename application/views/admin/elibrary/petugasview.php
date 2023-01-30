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
	<a href="<?=base_url(akses().'/elibrary/addjenisbuku');?>" class="btn btn-primary btn-flat">Tambah Data</a>
</div>

<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>ID</th>
		<th>Foto</th>
		<th>Nama</th>
		<th>NIP</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>		

	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
			?>
			<tr>
				
				<td ><?=$row->id;?></td>
				<td ><?=$row->foto;?></td>
				<td ><?=$row->nama;?></td>
				<td ><?=$row->nis;?></td>
				<td ><?=$row->jenis_kelamin;?></td>
				<td ><?=$row->tanggal_lahir;?></td>
				<td>
					<a onclick="return confirm('Yakin ingin menghapus user ini?');" href="<?=base_url(akses().'/elibrary/deletejenisbuku');?>?id=<?=$row->id;?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>