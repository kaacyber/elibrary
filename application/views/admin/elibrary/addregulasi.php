<?php
echo validation_errors();
echo form_open_multipart(base_url(akses().'/elibrary/addregulasi'),array('class'=>'form-horizontal'));
?>
<?php echo $error;?>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Jenis Regulasi</label>
	<div class="col-md-6">
		<select name="jenis" class="form-control" required="">
			<option value="">--Pilih Jenis Regulasi--</option>
			<?php
			if(!empty($jenis))
			{
				foreach($jenis as $rb)
				{
					echo '<option value="'.$rb->id.'">'.$rb->jenis_regulasi.'</option>';
				}
			}
			?>
		</select>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Nama Regulasi</label>
	<div class="col-md-6">
		<input type="text" name="judul" id="" class="form-control " required="" autocomplete="" placeholder="Judul Dokumen" value="<?php echo set_value('judul'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Dokumen</label>
	<div class="col-md-6">
		<input type="file" name="namadok"  />		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Keterangan</label>
	<div class="col-md-6">
		<input type="text" name="ket" id="" class="form-control " required="" autocomplete="" placeholder="Keteragan Lainnya" value="<?php echo set_value('ket'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Visibility</label>
	<div class="col-md-6">
		<select name="visible" class="form-control" required="">
			<option>Pilih Visibility</option>
			<option value="1">Visible</option>
			<option value="0">Non Visible</option>
			<!--<option value="tu">Tata Usaha</option>
			<option value="wakasis">Waka Siswa</option>-->
		</select>
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