<?php
echo validation_errors();
echo form_open(base_url(akses().'/jenispengadaan/add'),array('class'=>'form-horizontal'));
?>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Kode</label>
	<div class="col-md-6">
		<input type="text" name="kd_tender" id="" class="form-control " autocomplete="" placeholder="Kode Jenis" required="" value="<?php echo set_value('kd_tender'); ?>"/>
	</div>
</div>
<div class="form-group required">
	<label class="col-sm-2 control-label" for="">Jenis Pengadaan</label>
	<div class="col-md-6">
		<input type="text" name="nama" id="" class="form-control " required="" autocomplete="" placeholder="Jenis Pengadaan" value="<?php echo set_value('nama'); ?>"/>		
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