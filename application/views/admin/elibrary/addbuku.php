<?php
echo validation_errors();
echo form_open_multipart(base_url(akses().'/elibrary/addbuku'),array('class'=>'form-horizontal'));
?>
<?php echo $error;?>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Jenis Buku</label>
	<div class="col-md-6">
		<select name="jenis_buku" class="form-control" required="">
			<option value="">--Pilih Jenis Buku--</option>
			<?php
			if(!empty($jenis))
			{
				foreach($jenis as $rb)
				{
					echo '<option value="'.$rb->id.'">'.$rb->jenis_buku.'</option>';
				}
			}
			?>
		</select>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Nomor Buku</label>
	<div class="col-md-3">
		<input type="text" name="nobuku" id="" class="form-control " required="" autocomplete="" placeholder="Masukkan Nomor Buku" value="<?php echo set_value('nobuku'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Judul Buku</label>
	<div class="col-md-6">
		<input type="text" name="jbuku" id="" class="form-control " required="" autocomplete="" placeholder="Judul Buku" value="<?php echo set_value('jbuku'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Jumlah</label>
	<div class="col-md-1">
		<input type="number" name="jml" id="" class="form-control " required="" autocomplete="" placeholder="Jumlah" value="<?php echo set_value('jml'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Pengarang</label>
	<div class="col-md-3">
		<input type="text" name="pengarang" id="" class="form-control " required="" autocomplete="" placeholder="Pengarang" value="<?php echo set_value('pengarang'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Keterangan</label>
	<div class="col-md-6">
		<input type="text" name="ket" id="" class="form-control " required="" autocomplete="" placeholder="Keteragan Lainnya" value="<?php echo set_value('ket'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Cover</label>
	<div class="col-md-6">
		<input type="file" name="cover"  />		
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-md-6">
		<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
	</div>
</div>
<?php
echo form_close();
?>