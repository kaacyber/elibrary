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
	<a href="<?=base_url(akses().'/elibrary/addregulasi');?>" class="btn btn-primary btn-flat">Tambah Data</a>
</div>

<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>Jenis Regulasi</th>
		<th>Judul Regulasi</th>		
		<th>Nama Dokumen</th>
		<th>Keterangan</th>
		<th width="100">View</th>
		<th width="100">Action</th>
	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
			?>
			<tr>
				<td><?=$row->jenis;?></td>
				<td><?=$row->judul;?></td>
				<td><?=$row->namadok;?></td>
				<td ><?=$row->ket;?></td>
				<td>
					<form action='files_pdf' method="GET" target="_blank">
                        <input type='hidden' name='namadok' id='namadok' value="<?=$row->namadok;?>">
                        <button type='submit' class='btn btn-xs btn-success '>View in PDF</button>
                    </form>
				</td>
				<td>
					<a onclick="return confirm('Yakin ingin menghapus user ini?');" href="<?=base_url(akses().'/elibrary/deleteregulasi');?>?id=<?=$row->id;?>&namadok=<?=$row->namadok;?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>