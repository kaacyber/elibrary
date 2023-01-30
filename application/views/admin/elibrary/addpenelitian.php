<?php
echo validation_errors();
echo form_open_multipart(base_url(akses().'/elibrary/addpenelitian'),array('class'=>'form-horizontal'));
?>
<?php echo $error;?>


<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Nama Penulis</label>
	<div class="col-md-6">
		<input type="text" name="nama" id="" class="form-control " required="" autocomplete="" placeholder="Nama Penulis" value="<?php echo set_value('nama'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Instansi</label>
	<div class="col-md-6">
		<input type="text" name="instansi" id="" class="form-control " required="" autocomplete="" placeholder="Instansi" value="<?php echo set_value('instansi'); ?>"/>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Judul Penelitian</label>
	<div class="col-md-6">
		<input type="text" name="jskripsi" id="" class="form-control " required="" autocomplete="" placeholder="Judul Skripsi" value="<?php echo set_value('jskripsi'); ?>"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Tahun</label>
	<div class="col-sm-2">
		<input type="number" name="tahun" id="" class="form-control" required="" autocomplete="" value="2019"/>		
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Cover</label>
	<div class="col-md-6">
		<input type="file" name="file"  />		
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">&nbsp;</label>
	<div class="col-md-6">
		<button type="submit" class="btn btn-primary btn-flat">Tambah</button>
		<a href="javascript:history.back(-1);" class="btn btn-danger btn-flat">Batal</a>
	</div>
</div>
<?php
echo form_close();
?>