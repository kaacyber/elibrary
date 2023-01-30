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
	<a href="<?=base_url(akses().'/elibrary/addkhusus');?>" class="btn btn-primary btn-flat">Tambah Data</a>
</div>

<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>Jenis Laporan</th>
		<th>Judul Laporan</th>
		<th>File</th>		
		<th>Keterangan</th>
		<th>Tanggal Upload</th>
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
				<td><?=$row->file;?></td>
				<td ><?=$row->ket;?></td>
				<td ><?=$row->tgl;?></td>
				<td>
					<form action='files_pdf_lap' method="GET" target="_blank">
                        <input type='hidden' name='file' id='file' value="<?=$row->file;?>">
                        <button type='submit' class='btn btn-xs btn-success '>Unduh</button>
                    </form>
                </td>
                <td>
					<a onclick="return confirm('Yakin ingin menghapus user ini?');" href="<?=base_url(akses().'/elibrary/deletekhusus');?>?id=<?=$row->id;?>&file=<?=$row->file;?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>