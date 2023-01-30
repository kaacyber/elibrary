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
	<a href="<?=base_url(akses().'/pengadaan/add');?>" class="btn btn-primary btn-flat">Tambah Peserta Pengadaan</a>
</div>
<p>&nbsp;</p>
<table class="table table-border table-hover" id="datatable">
	<thead>
		<th>Kode</th>
		<th>Nama Peserta</th>
		<th>Alamat</th>	
		<th>Telpon</th>	
		<th>N-Kontrak</th>	
		<th>Pemenang Berulang</th>	
		<th>Keberhasilan PP</th>	
		<th>Pengalaman Kerja</th>	
		<th>Point</th>			
		<th></th>
	</thead>
	<tbody>
		<?php
		if(!empty($data))
		{
			foreach($data as $row)
			{
			?>
			<tr>
				<td><?=$row->kd_tender;?></td>
				<td><?=$row->nama;?></td>
				<td><?=$row->alamat;?></td>
				<td><?=$row->telp;?></td>
				<td><?=$row->n_kontrak;?></td>
				<td><?=$row->pem_ulang;?></td>
				<td><?=$row->keberhasilan_pp;?></td>
				<td><?=$row->pengalaman_krj;?></td>
				<td><?=$row->point;?></td>
				<td>
					<a onclick="return confirm('Yakin ingin menghapus Data ini?');" href="<?=base_url(akses().'/pengadaan/delete');?>?id=<?=$row->kd_tender;?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>