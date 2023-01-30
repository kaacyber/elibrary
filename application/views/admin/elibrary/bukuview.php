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
	<a href="<?=base_url(akses().'/elibrary/addbuku');?>" class="btn btn-primary btn-flat">Tambah Data</a>
</div>

<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>Cover Buku</th>
		<th>Nomor Buku</th>
		<th>Jenis Buku</th>
		<th>Judul Buku</th>		
		<th>Pengarang</th>
		<th>Jumlah Buku</th>
		<th>Keterangan</th>
		<th>Action</th>
		

	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
			?>
			<tr>
				<td><img src="http://localhost:8080/rsj/rsu-elibrary/files_upload/buku/<?=$row->cover;?>" width="50px"></td>
				<td><?=$row->nobuku;?></td>
				<td><?=$row->jenis_buku;?></td>
				<td><?=$row->jbuku;?></td>
				<td><?=$row->pengarang;?></td>
				<td ><?=$row->jml;?></td>
				<td ><?=$row->ket;?></td>
				<td>
					<a onclick="return confirm('Yakin ingin menghapus user ini?');" href="<?=base_url(akses().'/elibrary/deletebuku');?>?idbuku=<?=$row->idbuku;?>&cover=<?=$row->cover;?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>